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
    
    /**
     * get statistics
     * from semester 1 to latest added data
     */
    public function get_statistics()
    {
        $query = <<<QUERY
        SELECT
            MIN(gpa) as min, MAX(gpa) as max, AVG(gpa) as avg 
        FROM (
            SELECT
                grades.user_npm as npm,
                grades.fullname as fullname,
                TRUNCATE(SUM(subjects.credits * grades.fp_scale)/SUM(subjects.credits), 6) as gpa
            FROM subjects JOIN 
            (
                SELECT * FROM grades
                JOIN users 
                ON grades.user_npm = users.npm
            ) AS grades
            ON grades.subject_id = subjects.id
            GROUP BY grades.user_npm, grades.fullname
            ORDER BY gpa DESC, fullname ASC
        ) a
        QUERY;

        return $this->db->query($query)->row();
    }

    /**
     * TODO: Add description
     */
    public function get_gpa_by_user_semester($semester, $user_npm = null)
    {
        if ($user_npm === null) $user_npm = $this->aauth->get_user()->npm;

        $result = $this->db->select('TRUNCATE(SUM(subjects.credits * grades.fp_scale)/SUM(subjects.credits), 6) as gpa')
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

        $query = <<< QUERY
        SELECT *
        FROM (
            SELECT *
            FROM grades
            WHERE grades.user_npm = {$this->db->escape($user_npm)}
        ) grades
        RIGHT JOIN
            subjects
        ON grades.subject_id = subjects.id
        WHERE subjects.semester = {$this->db->escape($semester)}
        ORDER BY subjects.name ASC      
        QUERY;
            $result = $this->db->query($query)->result();
        return $result;
    }

    public function get_gpa($semester = null, $user_npm = null)
    {
        if ($user_npm === null) $user_npm = $this->aauth->get_user()->npm;

        $result = $this->db->select('SUM(grades.fp_scale*subjects.credits) as sum_index, SUM(subjects.credits) as sum_credits')
                            ->from('grades')
                            ->join('subjects', 'grades.subject_id = subjects.id')
                            ->where(['grades.user_npm' => $user_npm]);
                            if ($semester != null)
                            {
                                $result = $result->where(['subjects.semester' => $semester]);
                            }
        $result = $result->get()->row();
        return $result;
    }
    /**
     * Get all gpa rank
     * This will return list of all rank 
     * calculated from semester 1 to semester 5
     * @return array of sum_index and count
     */
    public function get_all_gpa_rank()
    {
        $query = <<<QUERY
        SELECT
            sum_index, count(sum_index) as count
        FROM (
            SELECT
                grades.user_npm as npm,
                grades.fullname as fullname,
                SUM(subjects.credits * grades.fp_scale) as sum_index,
                SUM(subjects.credits) as sum_credits
            FROM subjects JOIN 
            (
                SELECT * FROM grades
                JOIN users 
                ON grades.user_npm = users.npm
            ) AS grades
            ON grades.subject_id = subjects.id
            GROUP BY grades.user_npm, grades.fullname
        ORDER BY sum_index DESC, fullname ASC          
        ) a
        GROUP BY sum_index 
        ORDER BY sum_index DESC
        QUERY;

        return $this->db->query($query)->result();
    }

    /** 
     * Get sum of credits
     * 
     */
    public function get_sum_credits()
    {
        return $this->db->select('sum(subjects.credits) as sum_credits')->from('subjects')->get()->row()->sum_credits;
    }

    /**
     * Get all average from skd, ipk, and skd+ipk
     */
    public function get_avg_statistics()
    {
        $query = <<<QUERY
        SELECT 
            AVG(ipk) as ipk_avg, AVG(s.score) as skd_avg, AVG((ipk / 4 * 60)+(s.score / 500 * 40)) as total_avg
        FROM ( 
            SELECT
                npm, fullname, sum_index/sum_credits as ipk, sum_credits -- , count(sum_index) as count
            FROM (
                SELECT
                    grades.user_npm as npm,
                    grades.fullname as fullname,
                    SUM(subjects.credits * grades.fp_scale) as sum_index,
                    SUM(subjects.credits) as sum_credits
                FROM subjects JOIN 
                (
                    SELECT * FROM grades
                    JOIN users 
                    ON grades.user_npm = users.npm
                ) AS grades
                ON grades.subject_id = subjects.id
                GROUP BY grades.user_npm, grades.fullname
            ) a
            WHERE a.sum_credits = {$this->db->escape($this->get_sum_credits())}
        ) a
        JOIN
            skd s
        ON a.npm = s.user_npm
        WHERE s.score IS NOT NULL
        -- GROUP BY sum_index        
        QUERY;

        return $this->db->query($query)->row();        
    }

    /**
     * Get all rank calculated using gpa and skd score
     * This will return list of all rank 
     * calculated from semester 1 to semester 5
     * @return array of sum_index and count
     */
    public function get_all_rank()
    {
        $query = <<<QUERY
        SELECT 
            a.npm, fullname, s.is_locked, s.is_visible, ipk, s.score as skd_score, (ipk / 4 * 60)+(s.score / 500 * 40) as total, p1.location as loc1, p2.location as loc2, p3.location as loc3
        FROM ( 
            SELECT
                npm, fullname, sum_index/sum_credits as ipk -- , count(sum_index) as count
            FROM (
                SELECT
                    grades.user_npm as npm,
                    grades.fullname as fullname,
                    SUM(subjects.credits * grades.fp_scale) as sum_index,
                    SUM(subjects.credits) as sum_credits
                FROM subjects JOIN 
                (
                    SELECT * FROM grades
                    JOIN users 
                    ON grades.user_npm = users.npm
                ) AS grades
                ON grades.subject_id = subjects.id
                -- WHERE semester = 2
                GROUP BY grades.user_npm, grades.fullname	          
            ) a
            WHERE a.sum_credits = {$this->db->escape($this->get_sum_credits())}
        ) a
        JOIN
            skd s 
        ON a.npm = s.user_npm
        LEFT JOIN
            penempatan p1 
        ON p1.id = s.penempatan_id_1
        LEFT JOIN
            penempatan p2
        ON p2.id = s.penempatan_id_2
        LEFT JOIN
            penempatan p3
        ON p3.id = s.penempatan_id_3
        WHERE s.score IS NOT NULL
        ORDER BY total DESC
        -- GROUP BY sum_index
        QUERY;

        return $this->db->query($query)->result();
    }

    // This will not be used. Instead refer to get_all_gpa_ranking
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
                TRUNCATE(SUM(subjects.credits * grades.fp_scale)/SUM(subjects.credits), 6) as gpa
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
            unset($grade['user_name']);

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