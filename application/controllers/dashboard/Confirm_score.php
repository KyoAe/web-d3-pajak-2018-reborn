<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm_score extends CI_Controller {
    
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

        // Get grades data
        for ($i=1; $i<=6; $i++)
        {
            $grades[$i] = $this->Grades->get_by_user_semester($i);                                             
        }

        // Get skd data
        $user_skd = $this->db->get_where('skd', array('user_npm' => $user_npm))->row();

        // Set form validation rules. Iterate and set rules for all subject ids
        for ($i=1; $i<=6; $i++)
        {
            foreach ($grades[$i] as $grade)
                $this->form_validation->set_rules("subject_id_{$grade->id}", $grade->name, 'required|numeric|less_than_equal_to[100]|greater_than[0]');
        }
        $this->form_validation->set_rules('skd_score', 'Nilai SKD', 'required|numeric|less_than_equal_to[500]|greater_than[0]');
        
        // Set error delimiters
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

        // If form validation run
		if ($this->form_validation->run() && !(isset($user_skd->is_locked) && $user_skd->is_locked))
		{   
            // echo($this->input->post("submit"));         
												
            // Update nilai tiap matkul
            for ($i=1; $i<=6; $i++)
            {
                foreach ($grades[$i] as $grade)
                {
                    $percentage = $this->input->post('subject_id_' . $grade->id);
                    $temp = $this->Grades->percentage_to_others($percentage);
                    $to_replace = array(
                        'subject_id' => $grade->id,
                        'user_npm' => $user_npm,
                        'percentage' => $percentage,
                        'letter' => $temp['letter'],
                        'fp_scale' => $temp['fp_scale']
                    );
                    $this->db->replace('grades', $to_replace);
                }      
            }
			
            // To update skd
            $to_replace = array(
                'user_npm' => $user_npm,
                'score' => $this->input->post('skd_score'),
                'is_visible' => (isset($user_skd->is_visible) ? $user_skd->is_visible : NULL),
                'is_locked' => ($this->input->post('submit') == 'lock' ? 1 : (isset($user_skd->is_locked) ? $user_skd->is_locked : NULL))                
            );
            $this->db->replace('skd', $to_replace);
			
            if ($this->input->post('submit') == 'lock')
            {
                $this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Nilai berhasil dikunci']);
            }
            else
            {
                $this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Nilai berhasil disimpan']);
            }			
			redirect('dashboard/confirm_score');
			// die();
        }

        // print_r($grades);
        // die();
        $data['grades'] = $grades;
        $data['user_skd'] = $user_skd;
        $data['title'] = 'Konfirmasi & Kunci Nilai';
        $this->load->view('pages/dashboard/confirm_score', $data);
    }    
}

/* End of file Confirm_score.php */
/* Location: ./application/controllers/dashboard/Confirm_score.php */