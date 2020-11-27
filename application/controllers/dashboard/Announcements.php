<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_announcements');
	}

	public function index()
	{
		redirect('dashboard/announcements/manage');
	}

	public function manage()
	{
		$data['title'] = 'Kelola Pengumuman';	
		$this->load->view('pages/dashboard/announcements_manage', $data);		
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/dashboard/Profile.php */