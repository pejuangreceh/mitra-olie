<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemasukkanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// if (!($this->session->userdata('username')) || !($this->session->userdata('role') == '1')) {
		// 	redirect(base_url());
		// }
		$this->load->model('pemasukkan');
		$this->load->model('stok_barang');
		if ($this->session->userdata('role') == '1') {
			return true;
		} else if ($this->session->userdata('role') == '2') {
			return true;
		} else if ($this->session->userdata('role') == '3') {
			redirect(base_url());
		} else {
			return true;
		}
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			$jumlah_data = $this->pemasukkan->jumlah_data();
			$from = $this->uri->segment(3);
			$this->config->load('pagination', TRUE);
			$settings = $this->config->item('pagination');
			$settings['base_url'] = base_url() . 'PemasukkanController/index';
			$settings['total_rows'] = $jumlah_data;
			$this->pagination->initialize($settings);
			$data['pemasukkans'] = $this->pemasukkan->read($settings['per_page'], $from);
			$data['links'] = $this->pagination->create_links();
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pemasukkan/index', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function tambahdata()
	{
		if ($this->session->userdata('username')) {
			$data['stoks'] = $this->pemasukkan->show();
			$data['new_id'] = $this->get_id_pemasukkan();
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pemasukkan/tambahdata', $data);
			$this->load->view('template/footer');
		}
	}
	public function get_id_pemasukkan()
	{
		$new_id =  $this->pemasukkan->get_idmax()->result();
		if ($new_id > 0) {
			foreach ($new_id as $key) {
				$auto_id = $key->kode_transaksi;
			}
		}
		return $id_transaksi = $this->pemasukkan->get_newid($auto_id, 'M');
	}
	public function simpan()
	{
		$this->form_validation->set_rules('kode_transaksi', 'Kode Transaksi', 'required');
		$this->form_validation->set_rules('id_stok', 'Pilih Barang', 'required');
		$this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pemasukkan/tambahdata');
			$this->load->view('template/footer');
		} else {
			$data = array(
				'kode_transaksi'    => $this->input->post('kode_transaksi'),
				'id_stok'   => $this->input->post('id_stok'),
				'jumlah_masuk'   => $this->input->post('jumlah_masuk'),
				'sisa_stok'   => $this->input->post('jumlah_masuk'),
				'deskripsi'   => $this->input->post('deskripsi'),
				'created_at'   => $this->input->post('created_at'),
				'updated_at'   => $this->input->post('updated_at'),
			);
			$this->pemasukkan->create($data);
			$this->session->set_flashdata('message', 'Data pemasukkan Barang <b>BERHASIL</b> Ditambahkan');
			redirect(base_url('PemasukkanController'));
		}
	}
	public function detail($id)
	{
		$result = $this->pemasukkan->get("WHERE id = '$id'");
		$id_stok = $result[0]['id_stok'];
		$stok = $this->pemasukkan->get_oli("WHERE id = '$id_stok'");
		$data = array(
			'kode_transaksi'       => $result[0]['kode_transaksi'],
			'jumlah_masuk'     => $result[0]['jumlah_masuk'],
			'sisa_stok'     => $result[0]['sisa_stok'],
			'id_stok'     => $result[0]['id_stok'],
			'deskripsi'    => $result[0]['deskripsi'],
			'jenis_stok'    => $stok[0]['nama_barang'],
			'created_at'    => $result[0]['created_at'],
			'updated_at'    => $result[0]['updated_at'],
		);
		// var_dump($data);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pemasukkan/detail', $data);
		$this->load->view('template/footer');
	}
	public function edit($id)
	{
		$result = $this->pemasukkan->get("WHERE id = '$id'");
		$id_stok = $result[0]['id_stok'];
		$stok = $this->pemasukkan->get_oli("WHERE id = '$id_stok'");
		$data = array(
			'id' => $id,
			'kode_transaksi'       => $result[0]['kode_transaksi'],
			'jumlah_masuk'     => $result[0]['jumlah_masuk'],
			'id_stok'     => $result[0]['id_stok'],
			'deskripsi'    => $result[0]['deskripsi'],
			'jenis_stok'    => $stok[0]['nama_barang'],
			'updated_at'    => $result[0]['updated_at'],

		);
		// var_dump($data);

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pemasukkan/edit', $data);
		$this->load->view('template/footer');
	}
	public function update($id)
	{
		$data = array(
			'jumlah_masuk'   => $this->input->post('jumlah_masuk'),
			'sisa_stok'   => $this->input->post('jumlah_masuk'),
			'deskripsi'   => $this->input->post('deskripsi'),
			'updated_at' => $this->input->post('updated_at'),
		);
		$query = $this->pemasukkan->update($data, $id);
		if ($query) {
			$this->session->set_flashdata('message', 'Data pemasukkan Barang <b>BERHASIL</b> DiUpdate');
			redirect(base_url('PemasukkanController'));
		} else {
			echo $id;
		}
	}

	public function delete($id)
	{
		$query = $this->pemasukkan->delete($id);
		if ($query) {
			$this->session->set_flashdata('message', 'Data pemasukkan Barang <b>BERHASIL</b> Dihapus');
			redirect(base_url('PemasukkanController'));
		}
	}
}
