<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	/**
	 * Index Page for About controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/about
	 *	- or -
	 * 		http://example.com/index.php/about/index
	 * 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */	
	public function tentang_angkatan()
	{
		$data['title'] = 'Tentang Angkatan';
		$this->load->view('pages/about/tentang_angkatan', $data);
	}
}
