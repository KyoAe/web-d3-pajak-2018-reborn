<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_faqs');
	}

	public function index()
	{
		redirect('dashboard/faqs/manage');
	}

	#########################
	# faq functions
	#########################

	/**
	 * Create a new faq
	 */
	public function create()
	{
		// If want to create, admin permission is necessary
		if (!$this->aauth->is_admin())
		{
			redirect('dashboard/faqs');
		}
		// Set form validation rules
		$this->form_validation->set_rules('name', 'Nama Faq', 'required|max_length[100]');
		$this->form_validation->set_rules('group_id', 'Grup yg bisa akses', 'required|numeric');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			// Prepare faq to be inserted
			$faq =
			[
				'name' => $this->input->post('name'),
				'group_id' => $this->input->post('group_id'),
				'created_at' => date('Y-m-d H:i:s')	
			];
			$this->db->insert('faqs', $faq);
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'faq added']);
			redirect('dashboard/faqs/manage');
		}
		$data['groups'] = $this->aauth->list_groups();
		$data['form_destination'] = 'dashboard/faqs/create';
		$data['title'] = 'Buat Faq';
		$this->load->view('pages/dashboard/faqs_template', $data);
	}

	/**
	 * Function to display existing faqs
	 */
	public function manage()
	{
		$data['title'] = 'Kelola FAQs';
		$data['faqs'] = $this->db->get('faqs')->result();
		// print_r($data['announcements']);
		$this->load->view('pages/dashboard/faqs_manage', $data);		
	}

	/**
	 * Function to delete faq by id
	 * @param $faq_id faq id to be deleted
	 */
	public function delete($faq_id)
	{		
		// If want to delete, admin permission is necessary
		if (!$this->aauth->is_admin())
		{
			redirect('dashboard/faqs');
		}
		$this->db->delete('faqs', array('id' => $faq_id));
		$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'faq deleted']);
		redirect('dashboard/faqs/manage');
	}

	/**
	 * Function to update faq by id
	 * @param $faq_id faq id to be updated
	 */
	public function update($faq_id)
	{
		// If want to edit, admin permission is needed
		if (!$this->aauth->is_admin())
		{
			redirect('dashboard/faqs');
		}
		// Set form validation rules
		$this->form_validation->set_rules('name', 'Nama Faq', 'required|max_length[100]');
		$this->form_validation->set_rules('group_id', 'Grup yg bisa akses', 'required|numeric');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		
		if ($this->form_validation->run())
		{
			$faq =
			[
				'name' => $this->input->post('name'),
				'group_id' => $this->input->post('group_id'),
				'updated_at' => date('Y-m-d H:i:s')	
			];
			$this->db->where('faqs.id', $faq_id)->update('faqs', $faq);			
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'faq updated']);
			redirect('dashboard/faqs/manage');
		}
		$data['faq'] = $this->db->get_where('faqs', array('id' => $faq_id))->row();

		// Jika data yang ingin diupdate tidak ditemukan, kembalikan ke manage dan kasih pemberitahuan
		if (! $data['faq'])
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'faq does not exist']);
			redirect('dashboard/faqs/manage');
		}
		$data['form_destination'] = 'dashboard/faqs/update/' . $faq_id;
		$data['title'] = 'Update Faq';		
		$data['groups'] = $this->aauth->list_groups();
		$this->load->view('pages/dashboard/faqs_template', $data);
	}

	#########################
	# Faq_items functions
	#########################
	public function manage_items($faq_id)
	{
		$faq = $this->db->get_where('faqs', array('faqs.id' => $faq_id))->row();
		// If want to edit, either an admin or the same group
		if (!$this->aauth->is_member($faq->group_id) && !$this->aauth->is_admin())
		{
			redirect('dashboard/faqs');
		}
		$data['title'] = 'Kelola Item Faq';
		$data['faq'] = $faq;
		$data['faq_items'] = $this->db->get_where('faq_items', array('faq_id' => $faq_id))->result();		
		$data['form_destination'] = 'dashboard/faqs/add_itemsr/' . $faq_id;
		// print_r($data['users']);
		$this->load->view('pages/dashboard/faqs_manage_items', $data);
	}

	public function add_item($faq_id)
	{
		$faq = $this->db->get_where('faqs', array('faqs.id' => $faq_id))->row();

		// If want to add item, either an admin or the same group
		if (!$this->aauth->is_member($faq->group_id) && !$this->aauth->is_admin())
		{
			redirect('dashboard/faqs');
		}

		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			$faq_item = array(
				'question' => $this->input->post('question'),
				'faq_id' => $faq->id,
				'answer' => $this->input->post('answer'),
				'created_at' => date('Y-m-d H:i:s')	
			);
			$this->db->insert('faq_items', $faq_item);
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Item added']);
			redirect('dashboard/faqs/manage_items/' . $faq_id);
		}
		$data['title'] = "Tambahkan item ke FAQ {$faq->name}";
		$data['form_destination'] = "dashboard/faqs/add_item/{$faq->id}";
		$data['faq'] = (object) array('id' => $faq->id);
		$this->load->view('pages/dashboard/faqs_item_template', $data);
	}

	public function update_item($faq_id, $faq_item_id)
	{
		$faq = $this->db->get_where('faqs', array('faqs.id' => $faq_id))->row();

		// If want to edit item, either an admin or the same group
		if (!$this->aauth->is_member($faq->group_id) && !$this->aauth->is_admin() )
		{
			redirect('dashboard/faqs');
		}
		
		$faq_item = $this->db->get_where('faq_items', array('id' => $faq_item_id, 'faq_id' => $faq_id))->row();
		// print_r($faq_item);
		// die();
		if ( ! $faq_item)
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'Item does not exist']);
			redirect('dashboard/faqs/manage_items/' . $faq_id);
		}
		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			$faq_item = array(
				'question' => $this->input->post('question'),
				'faq_id' => $faq->id,
				'answer' => $this->input->post('answer'),
				'updated_at' => date('Y-m-d H:i:s')	
			);
			$this->db->where('faq_items.id', $faq_item_id)->update('faq_items', $faq_item);
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Item added']);
			redirect('dashboard/faqs/manage_items/' . $faq_id);
		}
		$data['title'] = "Update item dari FAQ {$faq->name}";
		$data['form_destination'] = "dashboard/faqs/update_item/{$faq->id}/{$faq_item_id}";
		$data['faq'] = (object) array('id' => $faq->id);
		$data['faq_item'] = $faq_item;
		$this->load->view('pages/dashboard/faqs_item_template', $data);
	}

	public function remove_item($faq_id, $faq_item_id)
	{
		$faq = $this->db->get_where('faqs', array('faqs.id' => $faq_id))->row();

		// If want to remove item, either an admin or the same group
		if (!$this->aauth->is_member($faq->group_id) && !$this->aauth->is_admin())
		{
			redirect('dashboard/faqs');
		}

		$this->db->delete('faq_items', array('id' => $faq_item_id));
		$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Item removed']);		
		redirect("dashboard/faqs/manage_items/{$faq_id}");
	}
	#########################
	# Private functions
	#########################
	/**
	 * Function to get all permissions, also knowing which permission does 
	 * a faq have
	 * @param	$faq_id	the faq_id
	 * @return 	array 		list of permissions
	 */
	private function get_all_perms($faq_id = null)
	{
		return  $this->db->query(<<<QUERY
			select * from `perms` a
			left join (
				select * from `perm_to_faq`
				where `perm_to_faq`.faq_id = ?
			) b
			on `a`.id = `b`.perm_id;
		QUERY, $faq_id)->result();
	}

	/**
	 * Function to add permissions to faq
	 * @param	$perm_ids	array of permissions
	 * @param	$faq_id	faq_id associated with permission
	 */
	private function perms_to_faq($perm_ids, $faq_id)
	{
		// First, delete the faq permissions
		$this->db->delete('perm_to_faq', array('faq_id' => $faq_id));

		// Second, add permissions from $perm_ids to $faq_id
		foreach ($perm_ids as $perm_id)
		{
			$this->db->insert('perm_to_faq', array('perm_id' => $perm_id, 'faq_id' => $faq_id));
		}
	}
}

/* End of file faqs.php */
/* Location: ./application/controllers/dashboard/faqs.php */