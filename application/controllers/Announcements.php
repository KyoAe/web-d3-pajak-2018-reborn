<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Announcements_model', 'announcements');
	}
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
		$data['announcements'] = $this->announcements->get_all();
		$this->load->view('pages/announcements/index', $data);
	}

	public function show($announcement_slug)
	{		
		$data['announcement'] = $this->announcements->get_by_slug($announcement_slug);
		$data['announcements'] = $this->announcements->get_all(3);
		// print_r($data['announcement']);
		$data['title'] = html_escape($data['announcement']->title);
		$this->load->view('pages/announcements/show', $data);
	}
}
