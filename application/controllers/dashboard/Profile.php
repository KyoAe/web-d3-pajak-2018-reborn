<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_profile');
	}

	public function index()
	{
		$this->form_validation->set_rules('confirm', 'Konfirmasi', 'required');
		if ($this->input->post('newpass'))
		{
			$this->form_validation->set_rules('newpass', 'Password Baru', 'required|min_length[8]|max_length[13]');
			$this->form_validation->set_rules('newpassconf', 'Konfirmasi Password Baru', 'required|min_length[8]|max_length[13]|matches[newpass]');
		}
		$this->form_validation->set_rules('oldpass', 'Password Lama', 'required|min_length[8]|max_length[13]');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			$user = $this->aauth->get_user();
			if (! $this->aauth->verify_password($this->input->post('oldpass'), $user->pass))
			{
				$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Password lama salah']);
				redirect('dashboard/profile');
			}
			
			$this->aauth->update_user($user->id, $user->email, $this->input->post('newpass'));
			// foreach ($posts as $key => $post)
			// {
			// 	echo "$key: ";
			// 	print_r($post);
			// 	echo "<br/>";
			// }
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Data berhasil diupdate']);
			redirect('dashboard/profile');
			// die();
		}		
		$data['title'] = 'Profil';	
		$data['user'] = $this->aauth->get_user();
		$data['user_groups'] = $this->aauth->get_user_groups();
		// print_r($data['user_groups']);
		$this->load->view('pages/dashboard/profile', $data);
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/dashboard/Profile.php */