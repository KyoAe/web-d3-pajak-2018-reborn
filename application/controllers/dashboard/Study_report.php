<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Study_report extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
        $this->aauth->control('browse_study_report');
        $this->load->model('Grades_model', 'Grades');
	}

	public function index()
	{
        // Get user npm
        $user_npm = $this->aauth->get_user()->npm;

        // Prepare data each semester
        for ($i=1; $i<=6; $i++)
        {
            $grades[$i] = $this->Grades->get_by_user_semester($i);
            $statistics[$i] = $this->Grades->get_statistics_by_semester($i);
            $all_gpas = $this->Grades->get_all_gpa_by_semester($i);                        
            $student_counts[$i] = count($all_gpas);
            for ($j=0; $j<$student_counts[$i]; $j++)
            {
                if ($all_gpas[$j]->npm == $user_npm)
                {
                    $ranks[$i] = $j+1;
                    $gpas[$i] = $all_gpas[$j]->gpa;
                }
            }
        }

        $data['grades'] = $grades; // Nilai. Sudah termasuk SKS, dan nilai dalam bentuk lainnya
        $data['gpas'] = $gpas; // IPK
        $data['ranks'] = $ranks; // Untuk peringkat berapa
        $data['student_counts'] = $student_counts; // Untuk peringkat dari berapa mahasiswa
        $data['title'] = 'Hasil Studi';
        $data['statistics'] = $statistics;
        // print_r($data['statistics']);
        // die();

        $this->load->view('pages/dashboard/study_report', $data);
    }
    
}

/* End of file study_report.php */
/* Location: ./application/controllers/dashboard/study_report.php */