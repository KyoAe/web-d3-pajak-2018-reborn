<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet;

class Users_model extends CI_Model {
    
    public $errors = [];

    public $schema_get = [
    
    ];
    
    public function insert_from_file($file_name)
    {
        // return "SUCCESS";
        $spreadsheet = PhpSpreadsheet\IOFactory::load("storage/excel/{$file_name}");
        $sheet = $spreadsheet->getActiveSheet();

        $data_array = $sheet->rangeToArray('B2:F948', NULL, TRUE, TRUE, FALSE);
        foreach ($data_array as $row)
        {
            // Get user npm
            $user['npm'] = $row[2];
            
            // Stop if npm is empty
            if ($user['npm'] == null) break;

            // Skip if the user already exist
            $user_exist = $this->db->get_where('users', ['npm' => $user['npm']])->row();
            if ( !empty($user_exist) ) continue;

            // Prepare user data
            $user['gender'] = ($row[0]=='*') ? 'F' : 'M';
            $user['fullname'] = $row[1];            
            $user['email'] = $row[3];
            $user['pass'] = $this->aauth->hash_password($row[4], 0);

            // Insert user data
            $this->db->insert('users', $user);
            $user_id = $this->db->get_where('users', ['npm' => $user['npm']])->row()->id;
            $this->aauth->add_member($user_id, 'Anggota Angkatan');

            // Unset User
            unset($user);
        }
        return true;
    }

    /**
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
     * A function convert grade in percentage format to
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