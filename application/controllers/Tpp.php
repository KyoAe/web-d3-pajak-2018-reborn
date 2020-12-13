<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tpp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Announcements_model', 'announcements');
	}

	/**
	 * KTTA Page for TPP controller
	 */	
	public function ktta()
	{
		$data['title'] = 'TPP KTTA';
		$data['announcements'] = $this->announcements->get_by_category_slug('ktta');
		// $data['pengurus_tpp_ktta'] = $this->pengurus_tpp_ktta();
		$data['tpp_ktta_members'] = $this->get_tpp_members('ktta');
		$data['faqs'] = $this->get_faqs_by_name('KTTA');
		$data['cp_tpp_ktta'] = $this->cp_tpp_ktta();
		$this->load->view('pages/tpp/ktta', $data);
	}

	/**
	 * PKL Page for TPP controller
	 */	
	public function pkl()
	{
		$data['title'] = 'TPP PKL';
		$data['announcements'] = $this->announcements->get_by_category_slug('pkl');
		$data['faqs'] = $this->get_faqs_by_name('PKL');
		$data['tpp_pkl_members'] = $this->get_tpp_members('pkl');
		$data['cp_tpp_pkl'] = $this->cp_tpp_pkl();
		$this->load->view('pages/tpp/pkl', $data);
	}

	/**
	 * A function that returns the member of tpp
	 * @param $tpp_name name of tpp (e.g. 'pkl')
	 * @return array tpp_members
	 */
	private function get_tpp_members($tpp_name)
	{
		$schema = array(
			'tpp_fields.name as field_name',
			'tpp_members.fullname as fullname',
			'tpp_members.contact as contact',
			'tpp_members.avatar as avatar'
		);
		return $this->db->select($schema)
						->from('tpp')
						->join('tpp_members', 'tpp.id = tpp_members.tpp_id')
						->join('tpp_fields', 'tpp_members.tpp_field_id = tpp_fields.id')
						->where('tpp.name', $tpp_name)->get()->result();
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

	/**
	 * A function that return contact
	 * person of tpp pkl. Why am I doing this?
	 * It's such a hassle to use database for this.
	 * @return array cp tpp pkl
	 */
	private function cp_tpp_pkl() {
		return 
		[
			'Humas' => [
				(object) array('nama' => 'Feni', 'nomor' => '6289691431752'),
				(object) array('nama' => 'Elberth', 'nomor' => '6282242123522'),
				(object) array('nama' => 'Laili', 'nomor' => '6281999073879')
			]
		];
	}

	private function get_faqs_by_name($faq_name)
	{
		return $this->db->select('faq_items.*')
				 ->from('faqs')
				 ->join('faq_items', 'faqs.id = faq_items.faq_id')
				 ->where('faqs.name', $faq_name)
				 ->order_by('faq_items.question')
				 ->get()->result();
	}
}
