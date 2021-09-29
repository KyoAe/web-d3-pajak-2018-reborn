<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Study_report extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
        $this->aauth->control('browse_study_report');
        $this->load->model('Grades_model', 'Grades');
	}

    /**
     * function to return rank datas
     * rank is calculated by combining u
     */
    private function get_rank_datas()
    {
        // Get user npm
        $user_npm = $this->aauth->get_user()->npm;

        // Get rank score and count list
        $ranks = $this->Grades->get_all_rank();

        // Grant authority to users who have permission
        $user_has_permission = $this->aauth->is_allowed('view_rank_names');

        // Get user rank
        $total_users = 1;
        $user_rank = -1;
        $user_skd = 0;
        $user_ipk = 0;
        $user_total = 0;
        $user_is_visible = 0;
        $user_is_locked = 0;
        $user_fullname = '';
        $sum_total = 0;
        foreach ($ranks as $rank)
        {
            if ($rank->npm == $user_npm)
            {
                $user_rank = $total_users;
                $user_is_visible = $rank->is_visible;
                $user_skd = $rank->skd_score;
                $user_ipk = $rank->ipk;
                $user_total = $rank->total;
                $user_fullname = $rank->fullname;
                $user_is_locked = $rank->is_locked;
            }
            $sum_total += $rank->total;
            $total_users = $total_users + 1;            
        }        
        
        $total_users = $total_users - 1;
        $avg_total = $sum_total / $total_users;
        
        // Prepare rank statistics        
        $statistics = $this->Grades->get_avg_statistics();
        // print_r($statistics);
        // die();
        $data = array(
            'user_skd' => $user_skd,
            'user_ipk' => $user_ipk,
            'user_total' => $user_total,
            'user_is_visible' => $user_is_visible,
            'user_is_locked' => $user_is_locked,
            'user_npm' => $user_npm,
            'user_fullname' => $user_fullname,
            'user_has_permission' => $user_has_permission
        );
        $data['user_rank'] = $user_rank; // Untuk rank user
        $data['ranks'] = $ranks; // Untuk rank semua user
        $data['statistics'] = $statistics;
        
        return $data;
    }

	public function index()
	{
        // echo($this->Grades->get_sum_credits());
        // die();
        $data = $this->get_rank_datas();
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
        $avg = 0;
        $total_credits = $this->db->select('sum(credits) as total_credits')->from('subjects')->get()->row()->total_credits;        
        foreach ($rank_datas as $rank_data)
        {
            $avg += $rank_data->sum_index * $rank_data->count;
        }

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
        // $data['statistics'] = $statistics;
        // print_r($data['statistics']);
        // die();

        $this->load->view('pages/dashboard/study_report', $data);
    }
    
    public function make_visible()
    {
        $user_npm = $this->aauth->get_user()->npm;

        // Get skd data
        $user_skd = $this->db->get_where('skd', array('user_npm' => $user_npm))->row();

        // IF data is not locked yet, return to study_report
        if (!(isset($user_skd->is_locked) && $user_skd->is_locked))
        {
            $this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Data Anda belum dikunci']);
            redirect('dashboard/study_report');
        }

        $this->db->update('skd', array('is_visible' => 1), array('user_npm' => $user_npm));
        $this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Nama Anda sekarang bisa dilihat orang']);
        redirect('dashboard/study_report');
    }
}

/* End of file study_report.php */
/* Location: ./application/controllers/dashboard/study_report.php */