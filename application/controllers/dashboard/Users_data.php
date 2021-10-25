<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_data extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_users');
		$this->load->model('Users_model', 'Users');
	}

	public function index()
	{
		redirect('dashboard/users_data/manage');
	}

	/**
	 * Function to display existing users
	 */
	public function manage()
	{
		$data['title'] = 'Lihat dan Update Data User';
		$data['users'] = $this->db->get('users')->result();
		$this->load->view('pages/dashboard/users_data_manage', $data);		
	}	

	/**
	 * Function to update user by id
	 * @param $user_npm user npm to be seen and or updated
	 */
	public function update($user_npm = null)
	{
		// Get user data
		$data['user'] = $this->db->get_where('users', ['npm' => $user_npm])->row();

		// Jika data yang ingin diupdate tidak ditemukan kembalikan ke manage dan kasih pemberitahuan
		if (! $data['user'])
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'user does not exist']);
			redirect('dashboard/users_data/manage');
		}

		// Get user id
		$user_id = $data['user']->id;

		// Cannot update the user if the user is an admin unless they are the admin
		if ($this->aauth->is_member('Admin', $user_id) && !$this->aauth->is_admin())
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Permission denied']);
			redirect('dashboard/users_data/manage');
		}		

		// Set form validation rules
		$this->form_validation->set_rules('confirm', 'Konfirmasi', 'required');
		$this->form_validation->set_rules('nickname', 'Nama Panggilan', 'required|trim|alpha|max_length[10]');
		$this->form_validation->set_rules('birth_regency_id', 'Kota/Kabupaten Lahir', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('birth_date', 'Tanggal Lahir', 'required|exact_length[10]');
		$this->form_validation->set_rules('religion_id', 'Agama', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('wa_number', 'No. Whatsapp', 'required|trim|numeric|min_length[10]|max_length[13]');
		$this->form_validation->set_rules('instagram', 'Instagram', 'required|trim|alpha_dash|max_length[16]');
		$this->form_validation->set_rules('line_id', 'ID Line', 'required|trim|alpha_dash');
		if ($this->input->post('newpass'))
		{
			$this->form_validation->set_rules('newpass', 'Password Baru', 'required|min_length[8]|max_length[13]');
			$this->form_validation->set_rules('newpassconf', 'Konfirmasi Password Baru', 'required|min_length[8]|max_length[13]|matches[newpass]');
		}
		// $this->form_validation->set_rules('oldpass', 'Password Lama', 'required|min_length[8]|max_length[13]');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			$user = $this->aauth->get_user();
			// if (! $this->aauth->verify_password($this->input->post('oldpass'), $user->pass))
			// {
				// $this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Password lama salah']);
				// redirect('dashboard/profile');
			// }
			
			$this->aauth->update_user($user->id, $user->email, $this->input->post('newpass'));
			$user = array(
				'nickname' => $this->input->post('nickname'),
				'birth_regency_id' => $this->input->post('birth_regency_id'),
				'birth_date' => $this->input->post('birth_date'),
				'religion_id' => $this->input->post('religion_id'),
				'wa_number' => $this->input->post('wa_number'),
				'instagram' => $this->input->post('instagram'),
				'line_id' => $this->input->post('line_id')
			);
			$this->db->where('users.id', $this->aauth->get_user_id())->update('users', $user);
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Data berhasil diupdate']);
			redirect('dashboard/users_data/update/' . $user_npm);
			// die();
		}		
		$data['title'] = 'Profil ' . $data['user']->fullname;
		// $data['user'] = $this->aauth->get_user();
		$data['user_groups'] = $this->aauth->get_user_groups($user_id);
		$data['regencies'] = $this->db->get('regencies')->result();
		$data['religions'] = $this->db->get('religions')->result();
		// print_r($data['user_groups']);
		$this->load->view('pages/dashboard/profile', $data);
	}
}

/* End of file users.php */
/* Location: ./application/controllers/dashboard/users.php */