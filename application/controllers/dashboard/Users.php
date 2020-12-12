<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_users');
	}

	public function index()
	{
		redirect('dashboard/users/manage');
	}

	/**
	 * Create a new user
	 */
	public function create()
	{
		// Set form validation rules
		$this->form_validation->set_rules('fullname', 'Nama Lengkap User', 'required|max_length[64]');
		$this->form_validation->set_rules('email', 'Email User', 'required|valid_email|max_length[100]');
		$this->form_validation->set_rules('npm', 'NPM User', 'required|numeric|exact_length[10]');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin User', 'required|alpha|exact_length[1]');
		$this->form_validation->set_rules('pass', 'Password User', 'required|min_length[8]|max_length[13]');
		
		// Set form error delimiters
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			// Prepare user to be inserted
			$user =
			[
				'fullname' => strtoupper($this->input->post('fullname')),
				'npm' => $this->input->post('npm'),
				'gender' => $this->input->post('gender')
			];
			$user_id = $this->aauth->create_user($this->input->post('email'), $this->input->post('pass'));
			if ($user_id)
			{
				$this->db->where('users.id', $user_id)->update('users', $user);
				$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'user added']);
			}
			else
			{
				$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'user already exist']);
			}
			redirect('dashboard/users/manage');
		}
		$data['form_destination'] = 'dashboard/users/create';
		$data['title'] = 'Buat User';
		$this->load->view('pages/dashboard/users_template', $data);
	}

	/**
	 * Function to display existing users
	 */
	public function manage()
	{
		$data['title'] = 'Kelola User';
		$data['users'] = $this->db->get('users')->result();
		// print_r($data['announcements']);
		$this->load->view('pages/dashboard/users_manage', $data);		
	}

	/**
	 * Function to delete user by id
	 * @param $user_id user id to be deleted
	 */
	public function delete($user_id)
	{
		// Cannot delete the user if the user is an admin
		if ($this->aauth->is_member('Admin', $user_id))
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'cannot delete an Admin']);
		}
		else
		{
			$this->aauth->delete_user($user_id);
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'user deleted']);
		}		
		redirect('dashboard/users/manage');
	}

	/**
	 * Function to update user by id
	 * @param $user_id user id to be updated
	 */
	public function update($user_id)
	{		
		// Cannot update the user if the user is an admin unless they are the admin
		if ($this->aauth->is_member('Admin', $user_id) && !$this->aauth->is_admin())
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Permission denied']);
			redirect('dashboard/users/manage');
		}	
		// Set form validation rules
		$this->form_validation->set_rules('fullname', 'Nama Lengkap User', 'required|max_length[64]');
		$this->form_validation->set_rules('email', 'Email User', 'required|valid_email|max_length[100]');
		$this->form_validation->set_rules('npm', 'NPM User', 'required|numeric|exact_length[10]');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin User', 'required|alpha|exact_length[1]');
		$this->form_validation->set_rules('pass', 'Password User', 'required|min_length[8]|max_length[13]');

		// Set form error delimiters
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		
		if ($this->form_validation->run())
		{
			$user =
			[
				'fullname' => strtoupper($this->input->post('fullname')),
				'npm' => $this->input->post('npm'),
				'gender' => $this->input->post('gender')
			];
			if ($this->aauth->update_user($user_id, $this->input->post('email'), $this->input->post('pass')))
			{
				$this->db->where('users.id', $user_id)->update('users', $user);
				$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'user updated']);
			}
			else
			{
				$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'email has been taken']);
			}
			
			redirect('dashboard/users/manage');
		}
		$data['user'] = $this->aauth->get_user($user_id);

		// Jika data yang ingin diupdate tidak ditemukan kembalikan ke manage dan kasih pemberitahuan
		if (! $data['user'])
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'user does not exist']);
			redirect('dashboard/users/manage');
		}
		$data['form_destination'] = 'dashboard/users/update/' . $user_id;
		$data['title'] = 'Update User';
		$this->load->view('pages/dashboard/users_template', $data);
	}
}

/* End of file users.php */
/* Location: ./application/controllers/dashboard/users.php */