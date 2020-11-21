<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends CI_Controller {

	/**
	 * Index Page for Announcements controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/announcements
	 *	- or -
	 * 		http://example.com/index.php/announcements/index
	 * 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */	
	public function index()
	{
		$data['title'] = 'Pengumuman';
		$this->load->view('pages/announcements/index', $data);
	}
}
