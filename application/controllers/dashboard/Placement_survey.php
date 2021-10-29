<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Placement_survey extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
        $this->aauth->control('browse_placement_survey');
        $this->load->model('Grades_model', 'Grades');

        // Check if user has locked score or not
        $user_skd = $this->db->get_where('skd', ['user_npm' =>$this->aauth->get_user()->npm])->row();
        if (!isset($user_skd->is_locked) || !$user_skd->is_locked)
        {
            $this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Kunci Terlebih dahulu nilai Anda di halaman Hasil Studi']);
            redirect('dashboard/profile');
        }
	}

    public function index()
    {
        redirect('dashboard/placement_survey/browse');
    }

    /**
     * Method to show list of all surveys
     */
    public function browse()
    {
        $user_npm = $this->aauth->get_user()->npm;
        $query = <<<QUERY
            SELECT * FROM surveys s
            LEFT JOIN (
                SELECT * FROM survey_answers
                WHERE user_npm = {$user_npm}
            ) sa
            ON s.id = sa.survey_id
        QUERY;
        $data['surveys'] = $this->db->query($query)->result();
        $data['title'] = 'Survei Pilihan Penempatan';
        $this->load->view('pages/dashboard/placement_survey_browse', $data);
        // Put something here
    }

    public function view($survey_id = false)
    {
        $survey_id = intval($survey_id);

        $test_survey_id = $this->test_survey_id($survey_id);
        if (!$test_survey_id->success)
        {
            $this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => $test_survey_id->msg]);
			redirect('dashboard/placement_survey/browse');
        }

        // Check if survey already ends and user didn't fill it
        // Get user npm     
        $user_npm = $this->aauth->get_user()->npm;
        $survey = $this->db->get_where('surveys', ['id' => $survey_id])->row();
        $now = strtotime(date('Y-m-d H:i:s'));
        $user_survey_answer = $this->db->get_where('survey_answers', ['user_npm' => $user_npm, 'survey_id' => $survey_id])->row();
        if ($survey->end_date && (($now - strtotime($survey->end_date)) > 0) && !$user_survey_answer)
        {
            $this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Survei Telah Selesai dan Anda Terlambat Mengisinya']);
			redirect('dashboard/placement_survey/browse');
        }

        // Check If user haven't fill form yet
        if (!$user_survey_answer)
        {
            $this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Tolong Isi Survei Terlebih dahulu']);
			redirect('dashboard/placement_survey/browse');
        }
        $data = $this->get_rank_datas($survey_id);
        $data['title'] = 'Statistik Survei Penempatan - ' . $survey->name;
        $data['placement_statistics'] = $this->prepare_placement_statistics($survey_id);
        $this->load->view('pages/dashboard/placement_survey_view', $data);
    }

	public function form($survey_id = false)
	{
        $survey_id = intval($survey_id);

        $test_survey_id = $this->test_survey_id($survey_id);
        if (!$test_survey_id->success)
        {
            $this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => $test_survey_id->msg]);
			redirect('dashboard/placement_survey/browse');
        }

        // Check if survey already ends
        $survey = $this->db->get_where('surveys', ['id' => $survey_id])->row();
        $now = strtotime(date('Y-m-d H:i:s'));
        if ($survey->end_date && (($now - strtotime($survey->end_date)) > 0))
        {
            $this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Survei Telah Selesai']);
			redirect('dashboard/placement_survey/browse');
        }

        // Get user npm     
        $user_npm = $this->aauth->get_user()->npm;

        // Get skd data
        $user_skd = $this->db->get_where('skd', array('user_npm' => $user_npm))->row();

        // Get placements data
        $placements = $this->db->order_by('location', 'asc')->get_where('placements', ['survey_id' => $survey_id])->result();

        // Get placements list for form validation check exist
        $placement_keys = $this->db->select('id')->get_where('placements', ['survey_id' => $survey_id])->result_array();
        $placement_keys = array_column($placement_keys, 'id');

        // Set form validation rules. Iterate and set rules for all placement ids
        for ($i=1; $i<=3; $i++)
        {
            $this->form_validation->set_rules("placement_id_{$i}", "Pilihan ke-{$i}", "required|numeric|less_than_equal_to[100]|greater_than[0]|in_list[".implode(',', $placement_keys)."]");
        }        

        // Set error delimiters
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

        // Check if user has filled placement survey      
        $user_placement_filled = $this->db->get_where('survey_answers', ['user_npm' => $user_npm, 'survey_id' => $survey_id])->row();

        // If form validation run
		if ($this->form_validation->run() && !$user_placement_filled)
		{   
            // Check if choices the same.
            for($i=1; $i<=3; $i++)
                if ($this->input->post("placement_id_".$i) == $this->input->post("placement_id_".(($i<3) ? $i+1 : 1)))
                {
                    $this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Pilihan harus beda-beda']);
                    redirect('dashboard/placement_survey/form/' . $survey_id);
                }

            // To update skd using data penempatan
            $to_replace = array(
                'user_npm' => $user_npm,                
                'survey_id' => $survey_id,
                'placement_id_1' => $this->input->post('placement_id_1'),
                'placement_id_2' => $this->input->post('placement_id_2'),
                'placement_id_3' => $this->input->post('placement_id_3')
            );
            $this->db->replace('survey_answers', $to_replace);
			
            $this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Survei Penempatan Berhasil Diisi']);
			redirect("dashboard/placement_survey/form/{$survey_id}");
			// die();
        }

        $data['user_placement_filled'] = $user_placement_filled;
        $data['placements'] = $placements;
        $data['user_skd'] = $user_skd;
        $data['title'] = 'Survei Pilihan Penempatan - '.html_escape($survey->name);
        $data['survey_id'] = $survey_id;
        $this->load->view('pages/dashboard/placement_survey_form', $data);
    }

    private function test_survey_id($survey_id)
    {
        $temp = new stdClass();
        $temp->success = 1;

        // Check if $survey_id is an integer
        if (!is_int($survey_id))
        {
            $temp->msg = 'Survei Tidak Ditemukan';
			$temp->success = 0;
            return $temp;
        }

        // Check if survey exists
        $survey = $this->db->get_where('surveys', ['id' => $survey_id])->row();
        if (!$survey)
        {
            $temp->msg = 'Survei Tidak Ditemukan';
			$temp->success = 0;
            return $temp;
        }

        $now = strtotime(date('Y-m-d H:i:s'));
        // Check if survey already starts        
        if (!$survey->start_date || (($now - strtotime($survey->start_date)) < 0))
        {
            $temp->msg = 'Survei Belum Dimulai';
			$temp->success = 0;
            return $temp;
        }

        return $temp;
    }

    private function get_rank_datas($survey_id)
    {
        // Get user npm
        $user_npm = $this->aauth->get_user()->npm;

        // Get rank score and count list
        $ranks = $this->Grades->get_all_rank($survey_id);

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
        $user_locs = array(0, 0, 0);
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
                $user_locs = array($rank->loc1, $rank->loc2, $rank->loc3);                
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
            'total_users' => $total_users,
            'user_skd' => $user_skd,
            'user_ipk' => $user_ipk,
            'user_total' => $user_total,
            'user_is_visible' => $user_is_visible,
            'user_is_locked' => $user_is_locked,
            'user_npm' => $user_npm,
            'user_fullname' => $user_fullname,
            'user_has_permission' => $user_has_permission,
            'user_locs' => $user_locs
        );
        $data['user_rank'] = $user_rank; // Untuk rank user
        $data['ranks'] = $ranks; // Untuk rank semua user
        $data['statistics'] = $statistics;
        
        return $data;
    }

    private function prepare_placement_statistics($survey_id)
    {
        $placement_statistics = $this->Grades->get_placement_statistics($survey_id);
        
        $temp = new stdClass();
        $temp->labels = [];
        $temp->count_choice_1 = [];
        $temp->count_choice_2 = [];
        $temp->count_choice_3 = [];
        $temp->count_answered = $this->db->select('count(*) as cnt')->get_where('survey_answers', array('survey_id' => $survey_id))->row()->cnt;
        foreach($placement_statistics as $placement_statistic)
        {
            array_push($temp->labels, $placement_statistic->location);
            array_push($temp->count_choice_1, ($placement_statistic->count_choice_1 == NULL)? 0: (int)$placement_statistic->count_choice_1);
            array_push($temp->count_choice_2, ($placement_statistic->count_choice_2 == NULL)? 0: (int)$placement_statistic->count_choice_2);
            array_push($temp->count_choice_3, ($placement_statistic->count_choice_3 == NULL)? 0: (int)$placement_statistic->count_choice_3);
        }

        $temp->labels = json_encode($temp->labels);
        $temp->count_choice_1 = json_encode($temp->count_choice_1);
        $temp->count_choice_2 = json_encode($temp->count_choice_2);
        $temp->count_choice_3 = json_encode($temp->count_choice_3);
        return $temp;
    }
}

/* End of file Confirm_score.php */
/* Location: ./application/controllers/dashboard/Confirm_score.php */