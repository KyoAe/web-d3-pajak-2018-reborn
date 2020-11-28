<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	/**
	 * Index Page for Events controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/events
	 *	- or -
	 * 		http://example.com/index.php/events/index
	 * 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */	
	public function index()
	{
		$data['title'] = 'Kalender Angkatan';
		$this->load->view('pages/events/index', $data);
	}
}
