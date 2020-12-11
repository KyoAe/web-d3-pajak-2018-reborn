<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_permissions');
	}

	public function index()
	{
		redirect('dashboard/permissions/manage');
	}

	/**
	 * Create a new permission
	 */
	public function create()
	{
		// Set form validation rules
		$this->form_validation->set_rules('name', 'Nama Wewenang', 'required|max_length[100]');
		$this->form_validation->set_rules('definition', 'Definisi Wewenang', 'required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			// Prepare permission to be inserted
			$permission =
			[
				'name' => $this->input->post('name'),
				'definition' => $this->input->post('definition')
			];
			if ($this->aauth->create_perm($permission['name'], $permission['definition']))
			{
				$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Permission added']);
			}
			else
			{
				$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Permission already exist']);
			}
			redirect('dashboard/permissions/manage');
		}
		$data['form_destination'] = 'dashboard/permissions/create';
		$data['title'] = 'Buat Wewenang';
		$this->load->view('pages/dashboard/permissions_template', $data);
	}

	/**
	 * Function to display existing permissions
	 */
	public function manage()
	{
		$data['title'] = 'Kelola Wewenang';
		$data['permissions'] = $this->db->get('perms')->result();
		// print_r($data['announcements']);
		$this->load->view('pages/dashboard/permissions_manage', $data);		
	}

	/**
	 * Function to delete permission by id
	 * @param $permission_id permission id to be deleted
	 */
	public function delete($permission_id)
	{		
		$this->aauth->delete_perm($permission_id);
		$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Permission deleted']);
		redirect('dashboard/permissions/manage');
	}

	/**
	 * Function to update permission by id
	 * @param $permission_id permission id to be updated
	 */
	public function update($permission_id)
	{			
		// Set form validation rules
		$this->form_validation->set_rules('name', 'Nama Wewenang', 'required|max_length[100]');
		$this->form_validation->set_rules('definition', 'Definisi Wewenang', 'required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		
		if ($this->form_validation->run())
		{
			$permission =
			[
				'name' => $this->input->post('name'),
				'definition' => $this->input->post('definition')
			];
			$this->aauth->update_perm($permission_id, $permission['name'], $permission['definition']);

			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Permission updated']);
			redirect('dashboard/permissions/manage');
		}
		$data['permission'] = $this->aauth->get_perm($permission_id);

		// Jika data yang ingin diupdate tidak ditemukan kembalikan ke manage dan kasih pemberitahuan
		if (! $data['permission'])
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'permission does not exist']);
			redirect('dashboard/permissions/manage');
		}
		$data['form_destination'] = 'dashboard/permissions/update/' . $permission_id;
		$data['title'] = 'Update Wewenang';
		$this->load->view('pages/dashboard/permissions_template', $data);
	}
}

/* End of file Permissions.php */
/* Location: ./application/controllers/dashboard/Permissions.php */