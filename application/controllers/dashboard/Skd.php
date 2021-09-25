<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Skd extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
        $this->aauth->control('browse_skd');
        $this->load->model('Grades_model', 'Grades');
	}

	public function index()
	{
        // Get user npm
        $user_npm = $this->aauth->get_user()->npm;

        // Get skd score and count list
        $skds = $this->db->select("score, count(*) as cnt")->group_by("score")->order_by("score DESC")->get("skd")->result();

        // Get user skd
        $user_skd = $this->db->get_where('skd', array('npm' => $user_npm))->row();
        if (isset($user_skd->score))
        {
            $user_skd = $user_skd->score;
        }
        else
        {
            $user_skd = 9999;
        }

        // Get skd statistics
        $skd_statistics = $this->db->select("max(score) max, min(score) min, avg(score) avg, count(score) as cnt")->get("skd")->row();

        // Get user_rank
        $user_rank = 1;
        
        foreach ($skds as $skd)
        {            
            if ($skd->score == $user_skd)break;            
            $user_rank = $user_rank + $skd->cnt;
        }
        // print ($user_rank);
        // die();

        $data['user_skd'] = $user_skd; // Untuk skd user
        $data['user_rank'] = $user_rank; // Untuk skd user
        $data['skds'] = $skds; // Untuk skd user
        $data['title'] = 'Peringkat SKD';
        $data['statistics'] = $skd_statistics;
        // print_r($data['statistics']);
        // die();

        $this->load->view('pages/dashboard/skd', $data);
    }
    
}

/* End of file skd.php */
/* Location: ./application/controllers/dashboard/skd.php */