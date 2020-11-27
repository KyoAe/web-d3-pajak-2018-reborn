<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Login Page for Auth controller.
	 *
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */	

	public function __construct() 
	{
		parent::__construct();
	}

	public function login()
	{
		// Redirect if user is already loggedin
		if ($this->aauth->is_loggedin())
		{
			redirect('dashboard/profile');
		}

		// Set Validation rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]');

		// Set form error delimiters
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
				
		if ($this->form_validation->run())
		{
			if ($this->aauth->login($this->input->post('email'), $this->input->post('pass')))
			{
				redirect('dashboard/profile');
			}
		}

		$data['title'] = 'Login';
		$this->load->view('pages/auth/login', $data);
		
	}

	public function logout()
	{
		$this->aauth->logout();
		redirect('/');
	}	
}
