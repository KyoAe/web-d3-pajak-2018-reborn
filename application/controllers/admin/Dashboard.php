<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		// is_login();
		// $this->load->model('Database_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->view('layouts/dashboard_header', $data);
		$this->load->view('layouts/dashboard_footer', $data);
	}
    // public function index()
	// {
	// 	$data['mahasiswa']=$this->Mahasiswa_model->get_Mahasiswa($this->session->userdata('npm'));
    //     if (!$data['mahasiswa']->email) 
    //     {
	// 		redirect('oto/step2');
	// 	}

	// 	$data['title']='Profil';
	// 	$data['description']='DIII Pajak 2018';
	// 	$data['agama']=$this->Database_model->getAll_Agama();

    //     if (isset ($_POST['ubah_akun'])) {
	// 	    $this->form_validation->set_rules('new_password1', 'Kata Sandi Baru', 'trim|required|matches[new_password2]');
	// 	    $this->form_validation->set_rules('new_password2', 'Ulangi Kata Sandi Baru', 'trim|required|matches[new_password1]');
	// 	    $this->form_validation->set_rules('old_password', 'Kata Sandi Lama', 'trim|required');
    //         if ($this->form_validation->run() == true)
    //         {
    //             $password=$this->input->post('old_password', true);
    //             if (password_verify($password, $data['mahasiswa']->password))
    //             {
    //                 $data=[
    //                     'password' => password_hash($this->input->post('new_password1', true),PASSWORD_DEFAULT)
    //                 ];
    //                 $this->Database_model->update_Mahasiswa($data, $this->session->userdata('npm'));
    //                 $this->session->set_flashdata('message1', '<div class="alert alert-success alert-dismisible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Pengaturan akun telah diubah.</div>');
    //                 redirect('mahasiswa');
    //             } else {
    //                 $this->session->set_flashdata('message1', '<div class="alert alert-danger alert-dismisible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Kata sandi lama yang dimasukkan salah.</div>');
    //                 redirect('mahasiswa');
    //             }
	// 	    }
	// 	} 
    //     elseif (isset ($_POST['ubah_profil'])) 
    //     {
	// 		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
	// 	    $this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'trim|required');
	// 	    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
	// 	    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
	// 	    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required|exact_length[1]');
	// 	    $this->form_validation->set_rules('agama', 'Agama', 'trim|required|exact_length[1]');
	// 	    $this->form_validation->set_rules('alamat_kos', 'Alamat Kos', 'trim|required');

    //         if ($this->form_validation->run() == true) 
    //         {
    //             $data = [
    //                 'nama_lengkap' => strtoupper(htmlspecialchars($this->input->post('nama_lengkap', true))),
    //                 'nama_panggilan' => strtoupper(htmlspecialchars($this->input->post('nama_panggilan', true))),
    //                 'tempat_lahir' => strtoupper(htmlspecialchars($this->input->post('tempat_lahir', true))),
    //                 'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
    //                 'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
    //                 'agama' => htmlspecialchars($this->input->post('agama', true)),
    //                 'daerah_kos' => strtoupper(htmlspecialchars($this->input->post('daerah_kos', true))),
    //                 'alamat_kos' => htmlspecialchars($this->input->post('alamat_kos', true))
    //             ];

    //             $this->Database_model->update_Mahasiswa($data, $this->session->userdata('npm'));
    //             $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismisible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Profil telah diubah.</div>');
    //             redirect('mahasiswa#profil');
	// 	    }
    //     }
    //     elseif (isset ($_POST['ubah_organisasi']))
    //     {
	// 		$this->form_validation->set_rules('asal_sma', 'Asal Sekolah', 'trim|required');
	// 	    $this->form_validation->set_rules('organda', 'Organda', 'trim|required');
	// 	    $this->form_validation->set_rules('organisasi', 'Organisasi', 'trim|required');
	// 	    $this->form_validation->set_rules('ukm', 'Elkam/UKM', 'trim|required');
    //         if ($this->form_validation->run() == true) 
    //         {
    //             $data=[
    //                 'asal_sma' => strtoupper(htmlspecialchars($this->input->post('asal_sma', true))),
    //                 'organda' => strtoupper(htmlspecialchars($this->input->post('organda', true))),
    //                 'organisasi' => strtoupper(htmlspecialchars($this->input->post('organisasi', true))),
    //                 'ukm' => strtoupper(htmlspecialchars($this->input->post('ukm', true)))
    //             ];
    //             $this->Database_model->update_Mahasiswa($data, $this->session->userdata('npm'));
    //             $this->session->set_flashdata('message3', '<div class="alert alert-success alert-dismisible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Riwayat Pendidikan & Organisasi telah diubah.</div>');
    //             redirect('mahasiswa#organisasi');

	// 	    }

	// 	}
    //     elseif (isset ($_POST['ubah_kontak']))
    //     {
	//     	$this->form_validation->set_rules('whatsapp', 'No. WhatsApp', 'trim|required');
	// 	    $this->form_validation->set_rules('instagram', 'Instagram', 'trim|required');
	// 	    $this->form_validation->set_rules('line', 'ID Line', 'trim|required');

	// 	    if ($this->form_validation->run() == true) {
    //             $data=[
    //                 'whatsapp' => htmlspecialchars($this->input->post('whatsapp', true)),
    //                 'instagram' => htmlspecialchars($this->input->post('instagram', true)),
    //                 'line' => htmlspecialchars($this->input->post('line', true))
    //             ];
   	// 			$this->Database_model->update_Mahasiswa($data, $this->session->userdata('npm'));
  	// 			$this->session->set_flashdata('message4', '<div class="alert alert-success alert-dismisible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Kontak telah diubah.</div>');
   	// 			redirect('mahasiswa#kontakhe');
	// 	    }
    //     }
	// 	$this->load->view('template/mahasiswa-header.php', $data);
	// 	$this->load->view('mahasiswa/main.php', $data);
	// 	$this->load->view('mahasiswa/main-2.php', $data);
	// 	$this->load->view('mahasiswa/main-3.php', $data);
	// 	$this->load->view('template/mahasiswa-footer.php', $data);
	// }



	/*------------------------------------------------------------------*/



	public function akademik($key=null,$anchor=null,$hola=null)
	{
		$data['mahasiswa']=$this->Mahasiswa_model->get_Mahasiswa($this->session->userdata('npm'));

        if ($key == null && $anchor == null && $hola == null)
        {
			$data['title']='Hasil Studi';
			$data['description']='DIII Pajak 2018';
			$data['ipmatkul'] = $this->Mahasiswa_model->getAll_IP_Matkul($data['mahasiswa']->npm);
			$data['matkul'] = $this->Database_model->getAll_MatkulbySemester(3);
			$data['semester']=$this->Database_model->getAll_Semester();

            $this->load->view('template/mahasiswa-header.php', $data);
			$this->load->view('mahasiswa/akademik.php', $data);
			$this->load->view('mahasiswa/akademik-2.php', $data);
			$this->load->view('mahasiswa/akademik-3.php', $data);
			$this->load->view('template/mahasiswa-footer.php', $data);	
		} 
        elseif ($key == 'kelas' && $anchor != null && $hola != null)
        {
			$data['mhs_kelas']=$this->Mahasiswa_model->getAll_Mahasiswa_byKelas($anchor,$hola,'nama_lengkap');
			$data['title']='Lihat Kelas';
			$data['description']='Akademik DIII Pajak 2018';
			$data['kelas']=['tingkat' => $anchor, 'nomor' => $hola];
			$data['ipmatkul'] = $this->Database_model->getAll_IP_MatkulbySemester($data['kelas']['tingkat']);
			$data['matkul'] = $this->Database_model->getAll_MatkulbySemester(3);
			$data['semester']=$this->Database_model->getAll_Semester();

			$this->load->view('template/mahasiswa-header.php', $data);
			$this->load->view('mahasiswa/kelas-2.php', $data);
			$this->load->view('mahasiswa/kelas.php', $data);
			$this->load->view('template/mahasiswa-footer.php', $data);
		}
        else
        {
			redirect('mahasiswa/akademik');
		}
	}

	public function token() {
		$data['title']='U-Token';
		$data['description']='DIII Pajak 2018';
		$data['mahasiswa']=$this->Mahasiswa_model->get_Mahasiswa($this->session->userdata('npm'));

        $this->load->view('template/mahasiswa-header.php', $data);
		$this->load->view('mahasiswa/token.php', $data);
		$this->load->view('template/mahasiswa-footer.php', $data);
	}


	public function skpm() {
		$data['title']='SKPM & KHPM';
		$data['description']='DIII Pajak 2018';
		$data['mahasiswa']=$this->Mahasiswa_model->get_Mahasiswa($this->session->userdata('npm'));

		$this->load->view('template/mahasiswa-header.php', $data);
		$this->load->view('mahasiswa/skpm.php', $data);
		$this->load->view('template/mahasiswa-footer.php', $data);
    }
    
}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */