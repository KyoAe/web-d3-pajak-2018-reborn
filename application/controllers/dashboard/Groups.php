<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->aauth->control('browse_groups');
	}

	public function index()
	{
		redirect('dashboard/groups/manage');
	}

	#########################
	# Group functions
	#########################

	/**
	 * Create a new group
	 */
	public function create()
	{
		// Set form validation rules
		$this->form_validation->set_rules('name', 'Nama Grup', 'required|max_length[100]');
		$this->form_validation->set_rules('definition', 'Definisi Grup', 'required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			// print_r($this->input->post());
			// die();
			// Prepare group to be inserted
			$group =
			[
				'name' => $this->input->post('name'),
				'definition' => $this->input->post('definition')
			];
			$group_id = $this->aauth->create_group($group['name'], $group['definition']);
			if ($group_id)
			{
				$this->perms_to_group($this->input->post('perm_ids'), $group_id);
				$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'group added']);
			}
			else
			{
				$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'group already exist']);
			}
			redirect('dashboard/groups/manage');
		}
		$data['perms'] = $this->get_all_perms();
		$data['form_destination'] = 'dashboard/groups/create';
		$data['title'] = 'Buat Grup';
		$this->load->view('pages/dashboard/groups_template', $data);
	}

	/**
	 * Function to display existing groups
	 */
	public function manage()
	{
		$data['title'] = 'Kelola Grup';
		$data['groups'] = $this->db->get('groups')->result();
		// print_r($data['announcements']);
		$this->load->view('pages/dashboard/groups_manage', $data);		
	}

	/**
	 * Function to delete group by id
	 * @param $group_id group id to be deleted
	 */
	public function delete($group_id)
	{		
		// If want to edit admin permission and not admin, redirect to groups
		if ($this->aauth->get_group_name($group_id) === 'Admin' && !$this->aauth->is_admin())
		{
			redirect('dashboard/groups');
		}
		$this->aauth->delete_group($group_id);
		$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'group deleted']);
		redirect('dashboard/groups/manage');
	}

	/**
	 * Function to update group by id
	 * @param $group_id group id to be updated
	 */
	public function update($group_id)
	{
		// If want to edit admin permission and not admin, redirect to groups
		if ($this->aauth->get_group_name($group_id) === 'Admin' && !$this->aauth->is_admin())
		{
			redirect('dashboard/groups');
		}
		// Set form validation rules
		$this->form_validation->set_rules('name', 'Nama Grup', 'required|max_length[100]');
		$this->form_validation->set_rules('definition', 'Definisi Grup', 'required');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		
		if ($this->form_validation->run())
		{
			$group =
			[
				'name' => $this->input->post('name'),
				'definition' => $this->input->post('definition')
			];
			$this->aauth->update_group($group_id, $group['name'], $group['definition']);
			$this->perms_to_group($this->input->post('perm_ids'), $group_id);

			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'group updated']);
			redirect('dashboard/groups/manage');
		}
		$data['group'] = $this->aauth->get_group($group_id);

		// Jika data yang ingin diupdate tidak ditemukan kembalikan ke manage dan kasih pemberitahuan
		if (! $data['group'])
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'group does not exist']);
			redirect('dashboard/groups/manage');
		}
		$data['form_destination'] = 'dashboard/groups/update/' . $group_id;
		$data['title'] = 'Update Grup';		
		$data['perms'] = $this->get_all_perms($group_id);
		// print_r($data['perms']);
		$this->load->view('pages/dashboard/groups_template', $data);
	}

	#########################
	# Member functions
	#########################
	public function manage_members($group_id)
	{
		// If want to edit admin permission and not admin, redirect to groups
		if ($this->aauth->get_group_name($group_id) === 'Admin' && !$this->aauth->is_admin())
		{
			redirect('dashboard/groups');
		}
		$data['title'] = 'Kelola Anggota Grup';
		$data['users_in_group'] = $this->db->select('users.*')
						->from('users')
						->join('user_to_group as b', 'users.id = b.user_id', 'left')
						->where('b.group_id', $group_id)
						->get()->result();
		$data['users'] = $this->db->get('users')->result();
		$data['group'] = (object) array('id' => $group_id, 'name' => $this->aauth->get_group_name($group_id));
		$data['form_destination'] = 'dashboard/groups/add_member/' . $group_id;
		// print_r($data['users']);
		$this->load->view('pages/dashboard/groups_manage_members', $data);
	}

	public function add_member($group_id)
	{
		// If want to edit admin permission and not admin, redirect to groups
		if ($this->aauth->get_group_name($group_id) === 'Admin' && !$this->aauth->is_admin())
		{
			redirect('dashboard/groups');
		}
		$this->form_validation->set_rules('user_ids[]', 'Users', 'required');
		if ($this->form_validation->run())
		{
			$user_ids = $this->input->post('user_ids');
			foreach ($user_ids as $user_id)
			{
				$this->aauth->add_member($user_id, $group_id);
			}
			$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Member added']);
			// redirect('dashboard/groups/manage_members/' . $group_id);
		}
		else
		{
			$this->session->set_flashdata('alert', ['class' => 'bg-danger', 'msg' => 'An error has occured']);			
		}
		redirect('dashboard/groups/manage_members/' . $group_id);
	}

	public function remove_member($group_id, $user_id)
	{
		// If want to edit admin permission and not admin, redirect to groups
		if ($this->aauth->get_group_name($group_id) === 'Admin' && !$this->aauth->is_admin())
		{
			redirect('dashboard/groups');
		}		
		$this->aauth->remove_member($user_id, $group_id);
		$this->session->set_flashdata('alert', ['class' => 'bg-success', 'msg' => 'Member added']);		
		redirect('dashboard/groups/manage_members/' . $group_id);
	}
	#########################
	# Private functions
	#########################
	/**
	 * Function to get all permissions, also knowing which permission does 
	 * a group have
	 * @param	$group_id	the group_id
	 * @return 	array 		list of permissions
	 */
	private function get_all_perms($group_id = null)
	{
		return  $this->db->query(<<<QUERY
			select * from `perms` a
			left join (
				select * from `perm_to_group`
				where `perm_to_group`.group_id = ?
			) b
			on `a`.id = `b`.perm_id;
		QUERY, $group_id)->result();
	}

	/**
	 * Function to add permissions to group
	 * @param	$perm_ids	array of permissions
	 * @param	$group_id	group_id associated with permission
	 */
	private function perms_to_group($perm_ids, $group_id)
	{
		// First, delete the group permissions
		$this->db->delete('perm_to_group', array('group_id' => $group_id));

		// Second, add permissions from $perm_ids to $group_id
		foreach ($perm_ids as $perm_id)
		{
			$this->db->insert('perm_to_group', array('perm_id' => $perm_id, 'group_id' => $group_id));
		}
	}
}

/* End of file groups.php */
/* Location: ./application/controllers/dashboard/groups.php */