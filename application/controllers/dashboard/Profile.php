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
			redirect('dashboard/profile');
			// die();
		}		
		$data['title'] = 'Profil';	
		$data['user'] = $this->aauth->get_user();
		$data['user_groups'] = $this->aauth->get_user_groups();
		$data['regencies'] = $this->db->get('regencies')->result();
		$data['religions'] = $this->db->get('religions')->result();
		// print_r($data['user_groups']);
		$this->load->view('pages/dashboard/profile', $data);
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/dashboard/Profile.php */