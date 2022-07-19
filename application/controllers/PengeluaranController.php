<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengeluaranController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengeluaran');
		$this->load->model('stok_barang');
		// if (!($this->session->userdata('username')) || !($this->session->userdata('role') == '1')) {
		// 	redirect(base_url());
		// }
		if ($this->session->userdata('role') == '1') {
			return true;
		} else if ($this->session->userdata('role') == '2') {
			return true;
		} else if ($this->session->userdata('role') == '3') {
			return true;
		} else {
			return true;
		}
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			$jumlah_data = $this->pengeluaran->jumlah_data();
			$from = $this->uri->segment(3);
			$this->config->load('pagination', TRUE);
			$settings = $this->config->item('pagination');
			$settings['base_url'] = base_url() . 'PengeluaranController/index';
			$settings['total_rows'] = $jumlah_data;
			$this->pagination->initialize($settings);
			$username = $this->session->userdata('username');
			$data['pengeluarans'] = $this->pengeluaran->read($settings['per_page'], $from, $username);
			$data['links'] = $this->pagination->create_links();
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pengeluaran/index', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function tambahdata()
	{
		// var_dump($this->session->userdata());
		$session_id = $this->session->userdata('id');
		echo $session_id;
		if ($this->session->userdata('username')) {
			$data['stoks'] = $this->pengeluaran->show();
			$data['pemasukkans'] = $this->pengeluaran->show_pemasukkan();
			$data['new_id'] = $this->get_id_pengeluaran();
			$data['plat'] = $this->session->userdata('plat_nomor');
			// $data['pelanggan'] = $this->pengeluaran->show_pelanggan();
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pengeluaran/tambahdata', $data);
			$this->load->view('template/footer');
		}
	}
	public function get_id_pengeluaran()
	{
		$new_id =  $this->pengeluaran->get_idmax()->result();
		if ($new_id > 0) {
			foreach ($new_id as $key) {
				$auto_id = $key->kode_transaksi;
			}
		}
		return $id_transaksi = $this->pengeluaran->get_newid($auto_id, 'K');
	}
	public function simpan()
	{
		$data['stoks'] = $this->pengeluaran->show();
		$data['pemasukkans'] = $this->pengeluaran->show_pemasukkan();
		$data['new_id'] = $this->get_id_pengeluaran();

		$this->form_validation->set_rules('kode_transaksi', 'Kode Transaksi', 'required');
		$this->form_validation->set_rules('id_stok', 'Pilih Barang', 'required');
		// $this->form_validation->set_rules('jumlah_keluar', 'Jumlah Keluar', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pengeluaran/tambahdata');
			$this->load->view('template/footer');
		} else {
			$data = array(
				'kode_transaksi'    => $this->input->post('kode_transaksi'),
				'id_stok'   => $this->input->post('id_stok'),
				'plat_nomor'   => $this->input->post('plat_nomor'),
				'jumlah_keluar'   => 0,
				'deskripsi'   => $this->input->post('deskripsi'),
				'created_at'   => $this->input->post('created_at'),
				'updated_at'   => $this->input->post('updated_at'),
				'status'   => 'baru',
				'username'   => $this->session->userdata('username'),
			);
			$this->pengeluaran->create($data);
			$this->session->set_flashdata('message', 'Data pengeluaran Barang <b>BERHASIL</b> Ditambahkan');
			redirect(base_url('PengeluaranController'));
		}
	}
	public function detail($id)
	{
		$result = $this->pengeluaran->get(" WHERE id = '$id'");
		$username = $result[0]['username'];
		$id_stok = $result[0]['id_stok'];
		$stok = $this->pengeluaran->get_oli("WHERE id = '$id_stok'");
		$username = $this->pengeluaran->get_user("WHERE username = '$username'");
		$data = array(
			'kode_transaksi'      	=> $result[0]['kode_transaksi'],
			'jumlah_keluar'     	=> $result[0]['jumlah_keluar'],
			'id_stok'     			=> $result[0]['id_stok'],
			'plat_nomor'    		=> $result[0]['plat_nomor'],
			'username'     			=> $username[0]['username'],
			'deskripsi'    			=> $result[0]['deskripsi'],
			'jenis_stok'   			=> $stok[0]['nama_barang'],
			'created_at'    		=> $result[0]['created_at'],
			'updated_at'    		=> $result[0]['updated_at'],
		);
		// var_dump($data);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pengeluaran/detail', $data);
		$this->load->view('template/footer');
	}
	public function edit($id)
	{
		$result = $this->pengeluaran->get(" WHERE id = '$id'");
		// $sisa_stok = $this->pengeluaran->get_sisa_stok("WHERE id = '$id'");
		$username = $result[0]['username'];
		$id_stok = $result[0]['id_stok'];
		$stok = $this->pengeluaran->get_oli("WHERE id = '$id_stok'");
		$username = $this->pengeluaran->get_user("WHERE username = '$username'");
		$data = array(
			'id' => $id,
			'kode_transaksi'      	=> $result[0]['kode_transaksi'],
			'jumlah_keluar'     	=> $result[0]['jumlah_keluar'],
			'id_stok'     			=> $result[0]['id_stok'],
			'username'     			=> $username[0]['username'],
			'deskripsi'    			=> $result[0]['deskripsi'],
			'jenis_stok'   			=> $stok[0]['nama_barang'],
			'jumlah_barang'   		=> $stok[0]['jumlah_barang'],
			'updated_at'    		=> $result[0]['updated_at'],

		);
		// var_dump($data);

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pengeluaran/edit', $data);
		$this->load->view('template/footer');
	}
	public function update($id)
	{
		$data = array(
			'jumlah_keluar'   => $this->input->post('jumlah_keluar'),
			'status' => 'proses',
			'deskripsi'   => $this->input->post('deskripsi'),
			'updated_at' => $this->input->post('updated_at'),
		);
		if ($data['jumlah_keluar'] != NULL) {
			$query = $this->pengeluaran->update($data, $id);
		}
		if ($query) {
			$this->session->set_flashdata('message', 'Data pengeluaran Barang <b>BERHASIL</b> DiUpdate');
			redirect(base_url('PengeluaranController'));
		} else {
			echo $id;
		}
	}

	public function accept($id)
	{
		$data = array(
			'status' => 'selesai',
			'updated_at' => $this->input->post('updated_at'),
		);
		$query = $this->pengeluaran->update($data, $id);
		if ($query) {
			$this->session->set_flashdata('message', 'Data pengeluaran Barang <b>BERHASIL</b> Di Verifikasi');
			redirect(base_url('PengeluaranController'));
		} else {
			echo $id;
		}
	}

	public function delete($id)
	{
		$query = $this->pengeluaran->delete($id);
		if ($query) {
			$this->session->set_flashdata('message', 'Data pengeluaran Barang <b>BERHASIL</b> Dihapus');
			redirect(base_url('PengeluaranController'));
		}
	}
}
