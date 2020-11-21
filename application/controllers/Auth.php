<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Login Page for Auth controller.
	 *
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */	
	public function login()
	{
		$data['title'] = 'Login';
		$this->load->view('pages/auth/login', $data);
	}
}
