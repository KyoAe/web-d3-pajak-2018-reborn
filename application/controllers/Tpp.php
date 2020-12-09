<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tpp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Announcements_model', 'announcements');
	}
	/**
	 * Index Page for Announcements controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/announcements
	 *	- or -
	 * 		http://example.com/index.php/announcements/index
	 * 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */	
	public function ktta()
	{
		$data['title'] = 'TPP KTTA';
		$data['announcements'] = $this->announcements->get_all();
		$data['pengurus_tpp_ktta'] = $this->pengurus_tpp_ktta();
		$data['cp_tpp_ktta'] = $this->cp_tpp_ktta();
		$this->load->view('pages/tpp/ktta', $data);
	}

	/**
	 * A function that returns the contact and
	 * structure of coordinators of ktta
	 * @return array informasi pengurus tpp ktta
	 */
	private function pengurus_tpp_ktta()
	{
		$bidang[] = (object) array('name' => 'Koordinator', 'row_start' => 0);
		$bidang[] = (object) array('name' => 'PIC Mata Kuliah', 'row_start' => 1);
		$bidang[] = (object) array('name' => 'Bidang Konten', 'row_start' => 9);
		$bidang[] = (object) array('name' => 'Bidang Humas', 'row_start' => 11);
		$bidang[] = (object) array('name' => 'DUMMY', 'row_start' => 15);
		
		$keterangan = array(
			'Koordinator',
			'Koor PIC PPN & PPnBM',
			'Koor PIC PPh',
			'Koor PIC PDRD',
			'Koor PIC Pajak Internasional',
			'Koor PIC PPh PotPut',
			'Koor PIC KUP & PHP',
			'Koor PIC PPSP & UHP',
			'Koor PIC OTK',
			'Koor Bidang Konten',
			'PJ Pranala dan Persuratan',
			'Koor Bidang Humas',
			'PJ Grup AP',
			'PJ Grup Angkatan Reguler'
		);

		$kontak = array (
			(object) array('nama' => 'Shafura Aulia Donnina Putri', 'nomor' => '081233231744'),
			(object) array('nama' => 'Tia Laela Fajaryani', 'nomor' => ''),
			(object) array('nama' => 'Muhammad Isnaini Rahmadani', 'nomor' => ''),
			(object) array('nama' => 'M. Zaqi Humam Rosyidi', 'nomor' => ''),
			(object) array('nama' => 'Siti Mutiah Rahmadanti', 'nomor' => ''),
			(object) array('nama' => 'Muhammad Zaky Azhar Arviansyah', 'nomor' => ''),
			(object) array('nama' => 'Widya Sri Lestari', 'nomor' => ''),
			(object) array('nama' => 'Salsa Grandis Sains', 'nomor' => ''),
			(object) array('nama' => 'Zahra Azizah Putri Purnomo', 'nomor' => ''),
			(object) array('nama' => 'Pundit Valianto', 'nomor' => '083840415281'),
			(object) array('nama' => 'Muhammad Ivan Alfitra Darussalam', 'nomor' => ''),
			(object) array('nama' => 'Sukma Ayu Permatasari', 'nomor' => '087781069403'),
			(object) array('nama' => 'Permata Namyra Maulia', 'nomor' => ''),
			(object) array('nama' => 'Jalu Satria Pratama', 'nomor' => ''),
			(object) array('nama' => 'Febrianty Safira', 'nomor' => '')
		);
		return array('bidang' => $bidang, 'keterangan' => $keterangan, 'kontak' => $kontak);
	}

	/**
	 * A function that return contact
	 * person of tpp ktta. Why am I doing this?
	 * It's such a hassle to use database for this.
	 * @return array cp tpp ktta
	 */
	private function cp_tpp_ktta() {
		return 
		[
			'Untuk Ubah Judul KTTA' => [
				(object) array('nama' => 'Dendi', 'nomor' => '6282287396960')
			],
			'Untuk Surat Survei dan E-riset' => [
				(object) array('nama' => 'Sukma', 'nomor' => '6287781069403'),
				(object) array('nama' => 'Dias', 'nomor' => '6281908287944')
			],
			'CP Utama' => [
				(object) array('nama' => 'Permata', 'nomor' => '62895610701397'),
				(object) array('nama' => 'Jalu', 'nomor' => '6285727726278')
			]
		];
	}
}
