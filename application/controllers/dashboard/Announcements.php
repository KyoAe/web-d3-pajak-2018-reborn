<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_announcements');
		$this->load->model('Announcements_model', 'announcements');
	}

	public function index()
	{
		redirect('dashboard/announcements/manage');
	}

	/**
	 * Create a new announcements
	 */
	public function create()
	{
		// Set form validation rules
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('excerpt', 'Deskripsi Singkat', 'max_length[100]|required');

		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		if ($this->form_validation->run())
		{
			// Prepare announcement to be inserted
			$announcement =
			[
				'author_id' => $this->aauth->get_user_id(),
				'title' => $this->input->post('title'),
				'excerpt' => $this->input->post('excerpt'),
				'image' => $this->input->post('image') !== '' ? $this->input->post('image') : null,
				'body' => $this->input->post('body'),
				'slug' => url_title($this->input->post('title'), '-', true),
				'created_at' => date('Y-m-d H:i:s')			
			];
			$this->db->insert('announcements', $announcement);

			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Announcement added']);
			redirect('dashboard/announcements/manage');
		}
		$data['form_destination'] = 'dashboard/announcements/create';
		$data['title'] = 'Buat Pengumuman';
		$this->load->view('pages/dashboard/announcements_create', $data);
	}

	public function manage()
	{
		$data['title'] = 'Kelola Pengumuman';
		$data['announcements'] = $this->announcements->get_all();
		// print_r($data['announcements']);
		$this->load->view('pages/dashboard/announcements_manage', $data);		
	}

	public function delete($announcement_id)
	{
		if (! $this->announcements->soft_delete_by_id($announcement_id))
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Announcement does not exist']);
		}
		else
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Announcement deleted']);
		}
		redirect('dashboard/announcements/manage');
	}

	public function update($announcement_id)
	{			
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('excerpt', 'Deskripsi Singkat', 'max_length[100]|required');

		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		if ($this->form_validation->run())
		{
			$announcement =
			[
				'title' => $this->input->post('title'),
				'excerpt' => $this->input->post('excerpt'),
				'image' => $this->input->post('image') !== '' ? $this->input->post('image') : null,
				'body' => $this->input->post('body'),
				'slug' => url_title($this->input->post('title'), '-', true),
				'updated_at' => date('Y-m-d H:i:s')	
			];
			$this->db->where('id', $announcement_id)
						->update('announcements', $announcement);

			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Announcement updated']);
			redirect('dashboard/announcements/manage');
		}
		$data['announcement'] = $this->announcements->get_by_id($announcement_id);	

		// Jika data yang ingin diupdate tidak ditemukan kembalikan ke manage dan kasih pemberitahuan
		if (! $data['announcement'])
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Announcement does not exist']);
			redirect('dashboard/announcements/manage');
		}
		$data['form_destination'] = 'dashboard/announcements/update/' . $announcement_id;
		$data['title'] = 'Update Pengumuman';
		$this->load->view('pages/dashboard/announcements_create', $data);
	}
}

/* End of file Profile.php */
/* Location: ./application/controllers/dashboard/Profile.php */