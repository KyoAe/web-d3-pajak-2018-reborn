<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Placement_survey extends CI_Controller {
    
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

        // Get skd data
        $user_skd = $this->db->get_where('skd', array('user_npm' => $user_npm))->row();

        // Get placements data
        $placements = $this->db->order_by('location', 'asc')->get('penempatan')->result();

        // Get placements list
        $placement_keys = $this->db->select('id')->get('penempatan')->result_array();
        $placement_keys = array_column($placement_keys, 'id');
        // print_r($placement_keys);
        // die();

        // Set form validation rules. Iterate and set rules for all placement ids
        for ($i=1; $i<=3; $i++)
        {
            $this->form_validation->set_rules("placement_id_{$i}", "Pilihan ke-{$i}", "required|numeric|less_than_equal_to[100]|greater_than[0]|in_list[".implode(',', $placement_keys)."]");
        }        

        // Set error delimiters
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

        // Check if user has filled placement survey
        $user_placement_filled = 0;
        if (isset($user_skd->user_npm))
        {
            if ($user_skd->penempatan_id_1)$user_placement_filled = 1;
            if ($user_skd->penempatan_id_2)$user_placement_filled = 1;
            if ($user_skd->penempatan_id_3)$user_placement_filled = 1;
        }

        // If form validation run
		if ($this->form_validation->run() && !$user_placement_filled)
		{   
            // Check if choices the same.
            for($i=1; $i<=3; $i++)
                if ($this->input->post("placement_id_".$i) == $this->input->post("placement_id_".(($i<3) ? $i+1 : 1)))
                {
                    $this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Pilihan harus beda-beda']);
                    redirect('dashboard/placement_survey');
                }

            // To update skd using data penempatan
            $to_replace = array(
                'user_npm' => $user_npm,
                'score' => (isset($user_skd->score) ? $user_skd->score : NULL),
                'is_visible' => (isset($user_skd->is_visible) ? $user_skd->is_visible : NULL),
                'is_locked' => ($this->input->post('submit') == 'lock' ? 1 : (isset($user_skd->is_locked) ? $user_skd->is_locked : NULL)),
                'penempatan_id_1' => $this->input->post('placement_id_1'),
                'penempatan_id_2' => $this->input->post('placement_id_2'),
                'penempatan_id_3' => $this->input->post('placement_id_3')
            );
            $this->db->replace('skd', $to_replace);
			
            $this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Survei Penempatan Berhasil Diisi']);
			redirect('dashboard/placement_survey');
			// die();
        }

        $data['user_placement_filled'] = $user_placement_filled;
        $data['placements'] = $placements;
        $data['user_skd'] = $user_skd;
        $data['title'] = 'Survey Pilihan Penempatan';
        $this->load->view('pages/dashboard/placement_survey', $data);
    }    
}

/* End of file Confirm_score.php */
/* Location: ./application/controllers/dashboard/Confirm_score.php */