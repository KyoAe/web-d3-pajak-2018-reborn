<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Grades extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_grades');
		$this->load->model('Grades_model', 'Grades');
	}

	public function index()
	{
		redirect('dashboard/grades/manage');
	}

	/**
	 * Upload grade from excel
	 */
	public function upload()
	{
		// Set Upload Config
		$config['upload_path']          = './storage/excel';
		$config['allowed_types']        = 'xlsx';
		$config['encrypt_name']			= true;
		$config['max_size']				= 512;

		// Load upload library
		$this->load->library('upload', $config);

		// Do upload
		if ( ! $this->upload->do_upload('userfile'))
		{
			$data['upload_error'] = $this->upload->display_errors();
		}
		else
		{
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			if( $this->Grades->insert_from_file($file_name) )
			{
				$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'grade added']);
				$this->session->set_flashdata('upload_warnings', $this->Grades->warnings);
				redirect('dashboard/grades/upload');
			}
			else
			{
				$data['upload_error'] = $this->Grades->errors;
			}
		}

		$data['form_destination'] = 'dashboard/grades/upload';
		$data['title'] = 'Upload Nilai';
		$this->load->view('pages/dashboard/grades_upload', $data);
	}

	/**
	 * Function to display existing grades
	 */
	public function manage()
	{
		$data['title'] = 'Kelola Nilai';
		$this->load->view('pages/dashboard/grades_manage', $data);
	}

	public function semester($semester)
	{
		$data['grades'] = $this->Grades->get_all_gpa_by_semester($semester);
		$data['subjects'] = $this->db->get_where('subjects', ['semester' => $semester])->result();
		$data['title'] = "Data Nilai Semester {$semester}";
		$this->load->view('pages/dashboard/grades_semester_template', $data);
	}
}

/* End of file Grades.php */
/* Location: ./application/controllers/dashboard/Grades.php */