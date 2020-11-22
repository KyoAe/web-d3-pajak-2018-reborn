<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Profile';
		$mahasiswa = (object) 
			['foto' => 'hikigaya.jpg', 
			'nama_lengkap' => strtoupper('Hikigaya Hachiman'), 
			'npm' => 2301180000,
			'email' => 'hachiman@hikigaya.com',
			'jabatan' => 'Hikikomori'
			];		
		$data['mahasiswa'] = $mahasiswa;		
		$this->load->view('pages/dashboard/profile', $data);
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/dashboard/Profile.php */