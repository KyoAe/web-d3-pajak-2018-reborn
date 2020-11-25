<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (!$this->input->post())
		{
			$data['title'] = 'Profile';	
			$this->load->view('pages/dashboard/profile', $data);
		}
		else
		{
			$posts = array_filter($this->input->post());
			foreach ($posts as $key => $post)
			{
				echo "$key: ";
				print_r($post);
				echo "<br/>";
			}
			redirect('dashboard/profile');
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/dashboard/Profile.php */