<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Link_redirects extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_link_redirects');
	}

	public function index()
	{
		redirect('dashboard/link_redirects/manage');
	}

	#########################
	# Link_redirects functions
	#########################
	public function manage()
	{
		$data['title'] = 'Kelola Pengalihan Tautan';
		$data['link_redirects'] = $this->db->get('link_redirects')->result();
		$data['redirect_base_url'] = getenv('REDIRECT_BASE_URL');
		$this->load->view('pages/dashboard/link_redirects_manage', $data);
	}

	public function create()
	{		
		$this->form_validation->set_rules('name', 'Nama', 'required|max_length[256]|trim');
		$this->form_validation->set_rules('url', 'URL', 'required|max_length[256]|trim|alpha_dash|is_unique[link_redirects.url]');
		$this->form_validation->set_rules('link', 'Link', 'required|max_length[256]|trim|valid_url');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			$link_redirect = array(
				'name' => $this->input->post('name'),
				'url' => $this->input->post('url'),
				'link' => $this->input->post('link'),
			);
			$this->db->insert('link_redirects', $link_redirect);
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Link added']);
			redirect('dashboard/link_redirects/manage');
		}
		$data['title'] = "Tambahkan Pengalihan Tautan";
		$data['form_destination'] = "dashboard/link_redirects/create";
		$data['redirect_base_url'] = getenv('REDIRECT_BASE_URL');
		$this->load->view('pages/dashboard/link_redirects_template', $data);
	}

	public function update($link_redirect_id)
	{
		$link_redirect = $this->db->get_where('link_redirects', array('id' => $link_redirect_id))->row();
		// If link does not exist
		if ( ! $link_redirect)
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Link does not exist']);
			redirect('dashboard/link_redirects/manage');
		}

		$this->form_validation->set_rules('name', 'Nama', 'required|max_length[256]|trim');
		$this->form_validation->set_rules('url', 'URL', 'required|max_length[256]|trim|alpha_dash');
		if ($this->input->post('url') !== $link_redirect->url)
		{
			$this->form_validation->set_rules('url', 'URL', 'required|max_length[256]|trim|alpha_dash|is_unique[link_redirects.url]');
		}
		
		$this->form_validation->set_rules('link', 'Link', 'required|max_length[256]|trim|valid_url');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			$link_redirect = array(
				'name' => $this->input->post('name'),
				'url' => $this->input->post('url'),
				'link' => $this->input->post('link'),
			);
			$this->db->where('link_redirects.id', $link_redirect_id)->update('link_redirects', $link_redirect);
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Link updated']);
			redirect('dashboard/link_redirects/manage');
		}
		$data['title'] = "Update Pengalihan Tautan";
		$data['form_destination'] = "dashboard/link_redirects/update/{$link_redirect_id}";
		$data['link_redirect'] = $link_redirect;
		$data['redirect_base_url'] = getenv('REDIRECT_BASE_URL');
		$this->load->view('pages/dashboard/link_redirects_template', $data);
	}

	public function delete($link_redirect_id)
	{		
		$this->db->delete('link_redirects', array('id' => $link_redirect_id));
		$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Link removed']);
		redirect("dashboard/link_redirects/manage");
	}
}

/* End of file Link_redirects.php */
/* Location: ./application/controllers/dashboard/Link_redirects.php */