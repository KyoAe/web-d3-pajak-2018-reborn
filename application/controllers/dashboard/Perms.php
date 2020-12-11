<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perms extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_perms');
	}

	public function index()
	{
		redirect('dashboard/perms/manage');
	}

	/**
	 * Create a new perm
	 */
	public function create()
	{
		// Set form validation rules
		$this->form_validation->set_rules('name', 'Nama Wewenang', 'required|max_length[100]');
		$this->form_validation->set_rules('definition', 'Definisi Wewenang', 'required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			// Prepare perm to be inserted
			$perm =
			[
				'name' => $this->input->post('name'),
				'definition' => $this->input->post('definition')
			];
			if ($this->aauth->create_perm($perm['name'], $perm['definition']))
			{
				$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'perm added']);
			}
			else
			{
				$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'perm already exist']);
			}
			redirect('dashboard/perms/manage');
		}
		$data['form_destination'] = 'dashboard/perms/create';
		$data['title'] = 'Buat Wewenang';
		$this->load->view('pages/dashboard/perms_template', $data);
	}

	/**
	 * Function to display existing perms
	 */
	public function manage()
	{
		$data['title'] = 'Kelola Wewenang';
		$data['perms'] = $this->db->get('perms')->result();
		// print_r($data['announcements']);
		$this->load->view('pages/dashboard/perms_manage', $data);		
	}

	/**
	 * Function to delete perm by id
	 * @param $perm_id perm id to be deleted
	 */
	public function delete($perm_id)
	{		
		$this->aauth->delete_perm($perm_id);
		$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'perm deleted']);
		redirect('dashboard/perms/manage');
	}

	/**
	 * Function to update perm by id
	 * @param $perm_id perm id to be updated
	 */
	public function update($perm_id)
	{			
		// Set form validation rules
		$this->form_validation->set_rules('name', 'Nama Wewenang', 'required|max_length[100]');
		$this->form_validation->set_rules('definition', 'Definisi Wewenang', 'required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		
		if ($this->form_validation->run())
		{
			$perm =
			[
				'name' => $this->input->post('name'),
				'definition' => $this->input->post('definition')
			];
			$this->aauth->update_perm($perm_id, $perm['name'], $perm['definition']);

			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'perm updated']);
			redirect('dashboard/perms/manage');
		}
		$data['perm'] = $this->aauth->get_perm($perm_id);

		// Jika data yang ingin diupdate tidak ditemukan kembalikan ke manage dan kasih pemberitahuan
		if (! $data['perm'])
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'perm does not exist']);
			redirect('dashboard/perms/manage');
		}
		$data['form_destination'] = 'dashboard/perms/update/' . $perm_id;
		$data['title'] = 'Update Wewenang';
		$this->load->view('pages/dashboard/perms_template', $data);
	}
}

/* End of file perms.php */
/* Location: ./application/controllers/dashboard/perms.php */