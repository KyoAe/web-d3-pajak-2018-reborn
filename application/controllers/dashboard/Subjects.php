<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_subjects');
	}

	public function index()
	{
		redirect('dashboard/subjects/manage');
	}

	/**
	 * Create a new subject
	 */
	public function create()
	{
		// Set form validation rules
		$this->form_validation->set_rules('semester', 'Semester', 'required|greater_than[0]|less_than[7]');
		$this->form_validation->set_rules('name', 'Nama Matkul', 'required|max_length[64]');
		$this->form_validation->set_rules('code', 'Kode Matkul', 'required|max_length[64]');
		$this->form_validation->set_rules('credits', 'SKS', 'required|greater_than[1]|less_than[4]');	
		
		// Set form error delimiters
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			// Prepare subject to be inserted
			$subject =
			[
				'semester' => $this->input->post('semester'),
				'name' => $this->input->post('name'),
				'code' => $this->input->post('code'),
				'credits' => $this->input->post('credits')
			];
			// print_r($subject);
			$this->db->insert('subjects', $subject);

			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'subject added']);			
			redirect('dashboard/subjects/manage');
		}
		$data['form_destination'] = 'dashboard/subjects/create';
		$data['title'] = 'Buat matkul';
		$this->load->view('pages/dashboard/subjects_template', $data);
	}

	/**
	 * Function to display existing subjects
	 */
	public function manage()
	{
		$data['title'] = 'Kelola Matkul';
		$data['subjects'] = $this->db->select('*')
							->from('subjects')
							->order_by('semester', 'ASC')
							->order_by('name', 'ASC')
							->get()->result();
		// print_r($data['subjects']);
		$this->load->view('pages/dashboard/subjects_manage', $data);		
	}

	/**
	 * Function to delete subject by id
	 * Currently not usable to prevent data loss
	 * @param $subject_id subject id to be deleted
	 */
	private function delete($subject_id)
	{
		// Cannot delete the subject if the subject is an admin
		if ($this->aauth->is_member('Admin', $subject_id))
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'cannot delete an Admin']);
		}
		else
		{
			$this->aauth->delete_subject($subject_id);
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'subject deleted']);
		}		
		redirect('dashboard/subjects/manage');
	}

	/**
	 * Function to update subject by id
	 * @param $subject_id subject id to be updated
	 */
	public function update($subject_id)
	{		
		$data['subject'] = $this->db->get_where('subjects', array('id' => $subject_id))->row();

		// Jika data yang ingin diupdate tidak ditemukan kembalikan ke manage dan kasih pemberitahuan
		if (! $data['subject'])
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'subject does not exist']);
			redirect('dashboard/subjects/manage');
		}

		// Set form validation rules
		$this->form_validation->set_rules('semester', 'Semester', 'required|greater_than[0]|less_than[7]');
		$this->form_validation->set_rules('name', 'Nama Matkul', 'required|max_length[64]');
		$this->form_validation->set_rules('code', 'Kode Matkul', 'required|max_length[64]');
		$this->form_validation->set_rules('credits', 'SKS', 'required|greater_than[1]|less_than[4]');	

		// Set form error delimiters
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		
		if ($this->form_validation->run())
		{
			$subject =
			[
				'semester' => $this->input->post('semester'),
				'name' => $this->input->post('name'),
				'code' => $this->input->post('code'),
				'credits' => $this->input->post('credits')
			];
			$this->db->where('subjects.id', $subject_id)->update('subjects', $subject);
			
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'subject updated']);				
			redirect('dashboard/subjects/manage');
		}		
		$data['form_destination'] = "dashboard/subjects/update/{$subject_id}";
		$data['title'] = 'Update Matkul';
		$this->load->view('pages/dashboard/subjects_template', $data);
	}
}

/* End of file Subjects.php */
/* Location: ./application/controllers/dashboard/Subjects.php */