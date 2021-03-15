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

        // Prepare grades data each semester
        for ($i=1; $i<=6; $i++)
        {
            $grades[$i] = $this->Grades->get_by_user_semester($i);                                 

            // Calculate gpa each semester
            // To avoid division by zero for unfilled data
            $gpas[$i] = $this->Grades->get_gpa($i);
            if ($gpas[$i]->sum_credits == 0)
                $gpas[$i] = "N/A";
            else
                $gpas[$i] = $gpas[$i]->sum_index / $gpas[$i]->sum_credits;            
        }

        // Recap gpa. Seriously, I'm out of variable name :v
        $recap_gpa = $this->Grades->get_gpa();
        
        // Find rank
        $rank_datas = $this->Grades->get_all_gpa_rank();
        $student_count = 0;
        foreach ($rank_datas as $rank_data)
        {
            if ($rank_data->sum_index == $recap_gpa->sum_index)
            {
                $rank = $student_count + 1;
                // break;
            }
            $student_count += $rank_data->count;
        }

        // Calculate statistics. This would be bias if there's missing gpa data on a student in a semester
        $statistics = new stdClass();
        $max_sum_index = 0;
        $min_sum_index = 999999999;
        $avg = 0;
        $total_credits = $this->db->select('sum(credits) as total_credits')->from('subjects')->get()->row()->total_credits;        
        foreach ($rank_datas as $rank_data)
        {
            $max_sum_index = max($max_sum_index, $rank_data->sum_index);
            $min_sum_index = min($min_sum_index, $rank_data->sum_index);
            $avg += $rank_data->sum_index * $rank_data->count;
        }

        $statistics->max = $max_sum_index / $total_credits;
        $statistics->min = $min_sum_index / $total_credits;
        $statistics->avg = $avg / $total_credits / $student_count;

        $data['grades'] = $grades; // Nilai. Sudah termasuk SKS, dan nilai dalam bentuk lainnya
        $data['gpas'] = $gpas; // IPK
        if (isset($rank))
        {
            $data['rank'] = $rank; // Untuk peringkat berapa
            $data['recap_gpa'] = $recap_gpa->sum_index / $recap_gpa->sum_credits; // Untuk rekap IPK dari semester 1 - sekian
        }
        $data['student_count'] = $student_count; // Untuk berapa banyak mahasiswa        
        $data['title'] = 'Hasil Studi';
        $data['statistics'] = $statistics;
        // print_r($data['statistics']);
        // die();

        $this->load->view('pages/dashboard/study_report', $data);
    }
    
}

/* End of file study_report.php */
/* Location: ./application/controllers/dashboard/study_report.php */