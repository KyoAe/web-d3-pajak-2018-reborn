<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Login Page for Auth controller.
	 *
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */	

	public function __construct() 
	{
		parent::__construct();
	}

	public function login()
	{
		// Redirect if user is already loggedin
		if ($this->aauth->is_loggedin())
		{
			redirect('dashboard/profile');
		}

		// Set Validation rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]');

		// Set form error delimiters
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
				
		if ($this->form_validation->run())
		{
			if ($this->aauth->login($this->input->post('email'), $this->input->post('pass')))
			{
				redirect('dashboard/profile');
			}
		}

		$data['title'] = 'Login';
		$this->load->view('pages/auth/login', $data);
		
	}

	public function forgot_password()
	{
		// Set form validation
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');		

		// Set form error delimiters
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
				
		if ($this->form_validation->run())
		{
			// Check if email exists in database
			$user = $this->db->get_where('users', array('email' => $this->input->post('email')))->row();
			if ($user)
			{
				// Check if email has been sent to user in the last 24 hour
				if($this->db->order_by('timestamp', 'DESC')->get_where('reset_passwords', "timestamp >= date_sub(now(), INTERVAL 24 hour) AND user_id={$user->id}")->row())
				{
					$this->session->set_flashdata('alert', ['class' => 'error', 'msg' => 'You have already reset your password in the last 24 hour. Please try again later']);
					redirect('auth/forgot_password');
				}

				// print_r($this->db->select('count(*) as cnt')->get_where('reset_passwords', "timestamp >= date_sub(now(), INTERVAL 1 hour)")->row()->cnt);
				// die();
				// Check if there's still quota in the last 1 hour ()
				if($this->db->select('count(*) as cnt')->get_where('reset_passwords', "timestamp >= date_sub(now(), INTERVAL 1 hour)")->row()->cnt >= 119)
				{
					$this->session->set_flashdata('alert', ['class' => 'error', 'msg' => 'Sorry, 120 email has been sent in the last 1 hour. Please try again later']);
					redirect('auth/forgot_password');
				}

				// Prepare Verification Code
				$ver_code = sha1(strtotime("now"));

				// Reshuffle verification code until it's unique in database
				while($this->db->get_where('reset_passwords', array('verification_code' => $ver_code))->row())
				{
					$ver_code = sha1(strtotime("now"));
				}

				// Prepare email to send
				$config = Array(
				    'protocol' => 'smtp',
				    'smtp_host' => 'ssl://mail.d3pajak2018.org',
				    'smtp_port' => 465,
				    'smtp_user' => getenv('SMTP_USER'),
				    'smtp_pass' => getenv('SMTP_PASS'),
				    'mailtype'  => 'html', 
				    'charset'   => 'iso-8859-1'
				);

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				
				// Email dan nama pengirim
				$this->email->from('no-reply@d3pajak2018.org', 'D3 Pajak 2018');
				// Email penerima
				$this->email->to($user->email); // Ganti dengan email tujuan
				// Subject email
				$this->email->subject('Reset Password');
				// Isi email
				$message="
				<p>
					Halo " . html_escape(ucwords(strtolower($user->fullname))) . ". Kamu kelihatannya telah mengajukan reset password.
					Klik tombol di bawah ini untuk membuat password baru Anda.	
				</p>
				<a href=\"" . site_url() . "/auth/reset_password/{$ver_code}\">
					<button> Buat Password Baru </button>
				</a>
				<p>Tautan berlaku selama 24 jam.</p>
				<p>Jika anda tidak mengajukan perubahan password ini, abaikan saja.</p>
				<p>Copyright D3 Pajak 2018 <br>
				------------------ <br>
				Instagram: @d3pajak2018 <br>
				LINE: @HHJ6080P <br>
				Website: app.d3pajak2018.org <br>
				------------------ <br>
				#D3Pajak2018 <br>
				</p>";

				$this->email->message($message);

				if ($this->email->send()) {
					$reset_password =
					[
						'user_id' => $user->id,
						'verification_code' => $ver_code,
						'used' => 0,
						'timestamp' => date('Y-m-d H:i:s')			
					];
					$this->db->insert('reset_passwords', $reset_password);				
				    $this->session->set_flashdata('alert', ['class' => 'success', 'msg' => 'Email has been sent. Check your email']);
					redirect('auth/forgot_password');
				} else {
				    $this->session->set_flashdata('alert', ['class' => 'error', 'msg' => 'An error exist. Please contact Admin']);
					redirect('auth/forgot_password');
				}
			}
			else
			{
				$this->session->set_flashdata('alert', ['class' => 'error', 'msg' => 'Email does not exist']);
				redirect('auth/forgot_password');
			}
		}

		$data['title'] = 'Login';
		$this->load->view('pages/auth/forgot_password', $data);
	}

	public function reset_password($ver_code = false)
	{
		// Check if $ver_code exists or expired or used
		$reset_password = $this->db->get_where('reset_passwords', 'verification_code = ' .  $this->db->escape($ver_code) . ' AND used = 0 AND timestamp >= date_sub(now(), interval 24 hour)')->row();		
		if (!$reset_password)
		{
			$this->session->set_flashdata('alert', ['class' => 'error', 'msg' => 'Invalid verification code or verification code already expired or used']);
			redirect('auth/login');
		}

		// Set form validation rule
		$this->form_validation->set_rules('newpass', 'New Password', 'required|min_length[8]|max_length[13]');
		$this->form_validation->set_rules('newpassconf', 'Confirm New Password', 'required|min_length[8]|max_length[13]|matches[newpass]');

		// Set form error delimiters
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run())
		{
			// Get user data and update the password
			$user = $this->db->get_where('users', array('id' => $reset_password->user_id))->row();						
			$this->aauth->update_user($user->id, $user->email, $this->input->post('newpass'));			
			
			// Update reset_password to have been used
			$this->db->where('verification_code', $ver_code)
						->update('reset_passwords', array('used' => 1));
			$this->session->set_flashdata('alert', ['class' => 'success', 'msg' => 'Password has been updated. Please login']);
			redirect('auth/login');
			// die();
		}

		$data['title'] = 'Reset Password';
		$this->load->view('pages/auth/reset_password', $data);
	}

	public function logout()
	{
		$this->aauth->logout();
		redirect('/');
	}	
}
