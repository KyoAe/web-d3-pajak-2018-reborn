<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet;

class Grades_model extends CI_Model {
    
    /**
     * Array for storing errors
     * @access public
     * @var array
     */
    public $errors = [];

    /**
     * Array for storing warnings
     * @access public
     * @var array
     */
    public $warnings = [];

    /**
     * Array for storing get schema
     * @access public
     * @var array
     */
    public $schema_get = [
    
    ];
    
    public function get_gpa_by_user_semester($semester, $user_npm = null)
    {
        if ($user_npm === null) $user_npm = $this->aauth->get_user()->npm;

        $result = $this->db->select('TRUNCATE(SUM(subjects.credits * grades.fp_scale)/SUM(subjects.credits), 2) as gpa')
                            ->from('grades')
                            ->join('subjects', 'grades.subject_id = subjects.id')
                            ->where(['grades.user_npm' => $user_npm, 'subjects.semester' => $semester])
                            ->group_by('subjects.semester')
                            ->get()->row();
        return $result->gpa;
    }

    /**
     * Get by user semester
     * Get subject grades by user semester
     * @param integer $semester
     * @param string $user_npm
     * @return array of object
     */
    public function get_by_user_semester($semester, $user_npm = null)
    {
        if ($user_npm === null) $user_npm = $this->aauth->get_user()->npm;

        $result = $this->db->select('*')
                            ->from('grades')
                            ->join('subjects', 'grades.subject_id = subjects.id')
                            ->where(['grades.user_npm' => $user_npm, 'subjects.semester' => $semester])
                            ->order_by('subjects.name', 'ASC')
                            ->get()->result();
        return $result;
    }

    /**
     * Get all gpa by semester
     * Get everyone gpa by semester
     * @param integer $semester
     * @return array grades
     */
    public function get_all_gpa_by_semester($semester)
    {
        // Get subjects
        $subjects = $this->db->get_where('subjects', ['semester' => $semester])->result();

        $query = <<<QUERY
            SELECT
                grades.user_npm as npm,
                grades.fullname as fullname,
                TRUNCATE(SUM(subjects.credits * grades.fp_scale)/SUM(subjects.credits), 2) as gpa
        QUERY;

        foreach($subjects as $subject)
        {
            $query .= ", MIN(CASE subjects.code WHEN {$this->db->escape($subject->code)} THEN grades.fp_scale END) AS {$this->db->escape($subject->code)}";
        }

        $query .= <<<QUERY
            FROM subjects JOIN 
            (
                SELECT * FROM grades
                JOIN users 
                ON grades.user_npm = users.npm
            ) AS grades
            ON grades.subject_id = subjects.id
            WHERE semester = {$this->db->escape($semester)}
            GROUP BY grades.user_npm, grades.fullname
            ORDER BY gpa DESC, fullname ASC
        QUERY;

        return $this->db->query($query)->result();
    }

    /**
     * Insert from file
     * Insert grades from spreadsheet file
     * @param string file_name
     * @return boolean success status
     */
    public function insert_from_file($file_name)
    {
        $spreadsheet = PhpSpreadsheet\IOFactory::load("storage/excel/{$file_name}");
        $sheet = $spreadsheet->getActiveSheet();
        $semester = $sheet->getCellByColumnAndRow(3, 1)->getValue();

        $subject_codes = $sheet->rangeToArray('D3:K3', NULL, TRUE, TRUE, FALSE)[0];
        $subject_ids = $this->validate_subject_codes($subject_codes);
        // If subject_ids not found
        if ( ! $subject_ids)return false;

        $data_array = $sheet->rangeToArray('B6:K105', NULL, TRUE, TRUE, FALSE);
        foreach ($data_array as $row)
        {
            $grade['user_name'] = $row[0];
            $grade['user_npm'] = $row[1];
                        
            if ($grade['user_name'] == null) break;
            unset($grade['user_name']);

            $user = $this->db->get_where('users', ['npm' => $grade['user_npm']])->row();
            if ( empty($user) )
            {
                array_push($this->warnings, "NPM {$row[1]} tidak ada dalam database. Mohon diperbaiki");
                continue;
            }
            else if ($user->fullname != $grade['user_name'])
            {
                array_push($this->warnings, "NPM {$row[1]} bukan untuk user dengan nama :<pre>{$row[0]}</pre> melainkan untuk user dengan nama: <pre>$user->fullname</pre> Mohon diperbaiki");
                continue;
            }
            
            $subject_count = count($subject_ids);
            
            for ($i=0; $i<$subject_count; $i++)
            {
                $grade['subject_id'] = $subject_ids[$i];
                $grade['percentage'] = $row[$i+2];
                $temp = $this->percentage_to_others($grade['percentage']);
                $grade['letter'] = $temp['letter'];
                $grade['fp_scale'] = $temp['fp_scale'];
                $this->db->replace('grades', $grade);
            }
            unset($grade);
        }
        return true;
    }

    /**
     * Validate subject codes
     * Check if the subject code exist in subjects database
     * @param string $subject_code
     * @return true if success
     * @return false if at least one subject code doesn't exist
     */
    public function validate_subject_codes($subject_codes)
    {
        $subject_ids = [];
        $i = 0;
        $valid = 1;
        foreach ($subject_codes as $subject_code)
        {
            // If subject code is null, stop
            if ($subject_code == null) break;

            $subject = $this->db->get_where('subjects', ['code' => $subject_code])->row();
            if (empty($subject))
            {
                // Push errors
                array_push($this->errors, "Matkul dengan kode {$subject_code} tidak ditemukan");
                $valid = 0;
            }
            else
            {
                $subject_ids[$i++] = $subject->id;
            }
        }
        if ($valid)
            return $subject_ids;
        else
            return false;
    }

    /**
     * Percentage to others
     * Convert grade in percentage format to
     * other format
     * @param float $grade_percentage
     * @return array with "letter" and "fp_scale" index
     */
    public function percentage_to_others($grade_percentage)
    {
        $grade_rules = [
            [86, 'A', 4.00],
            [80, 'A-', 3.70],
            [75, 'B+', 3.30],
            [70, 'B', 3.00],
            [66, 'B-', 2.70],
            [61, 'C+', 2.30],
            [56, 'C', 2.00],
            [41, 'D', 1.00],
            [0, 'E', 0.00]
        ];

        foreach ($grade_rules as $grade_rule)
        {
            if ($grade_percentage >= $grade_rule[0])
            {
                $grade['letter'] = $grade_rule[1];
                $grade['fp_scale'] = $grade_rule[2];
                return $grade;
            }
        }
    }
}