<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StokController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// if (!($this->session->userdata('username')) || !($this->session->userdata('role') == '1')) {
		// 	redirect(base_url());
		// }
		$this->load->model('stok_barang');
		if ($this->session->userdata('role') == '1') {
			return true;
		} else if ($this->session->userdata('role') == '2') {
			return true;
		} else if ($this->session->userdata('role') == '3') {
			redirect(base_url());
		} else {
			redirect(base_url());
		}
	}

	public function index()
	{
		// if ($this->session->userdata('username') && $this->session->userdata('role') == '1') {
		$jumlah_data = $this->stok_barang->jumlah_data();
		$from = $this->uri->segment(3);
		$this->config->load('pagination', TRUE);
		$settings = $this->config->item('pagination');
		$settings['base_url'] = base_url() . 'StokController/index';
		$settings['total_rows'] = $jumlah_data;
		$settings['uri_segment'] = 3;
		$this->pagination->initialize($settings);
		$data['stoks'] = $this->stok_barang->read($settings['per_page'], $from);
		$data['links'] = $this->pagination->create_links();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('stok/index', $data);
		$this->load->view('template/footer');
	}

	public function tambahdata()
	{
		if ($this->session->userdata('username')) {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('stok/tambahdata');
			$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function simpan()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		// $this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('stok/tambahdata');
			$this->load->view('template/footer');
		} else {
			$data = array(
				'nama_barang'    => $this->input->post('nama_barang'),
				// 'jumlah_barang'   => $this->input->post('jumlah_barang'),
				'harga'   => $this->input->post('harga'),
				'deskripsi'   => $this->input->post('deskripsi'),
				'created_at'   => $this->input->post('created_at'),
				'updated_at'   => $this->input->post('updated_at'),
			);
			$this->stok_barang->create($data);
			$this->session->set_flashdata('message', 'Data Stok Barang <b>BERHASIL</b> Ditambahkan');
			redirect(base_url('StokController'));
		}
	}
	public function detail($id)
	{
		if ($this->session->userdata('username')) {
			$result = $this->stok_barang->get("WHERE id = '$id'");
			$data = array(
				'nama_barang'       => $result[0]['nama_barang'],
				'jumlah_barang'     => $result[0]['jumlah_barang'],
				'harga'     => $result[0]['harga'],
				'deskripsi'    => $result[0]['deskripsi'],
			);
			// var_dump($data);
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('stok/detail', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function edit($id)
	{
		if ($this->session->userdata('username')) {
			$result = $this->stok_barang->get("WHERE id = '$id'");
			$data = array(
				'id' => $id,
				'nama_barang'       => $result[0]['nama_barang'],
				'jumlah_barang'     => $result[0]['jumlah_barang'],
				'harga'     => $result[0]['harga'],
				'deskripsi'    => $result[0]['deskripsi'],

			);
			// var_dump($data);

			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('stok/edit', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function update($id)
	{
		$data = array(
			'nama_barang'    => $this->input->post('nama_barang'),
			// 'jumlah_barang'   => $this->input->post('jumlah_barang'),
			'harga'   => $this->input->post('harga'),
			'deskripsi'   => $this->input->post('deskripsi'),
			'updated_at'   => $this->input->post('updated_at'),
		);
		$query = $this->stok_barang->update($data, $id);
		if ($query) {
			$this->session->set_flashdata('message', 'Data Stok Barang <b>BERHASIL</b> DiUpdate');
			redirect(base_url('StokController'));
		} else {
			echo $id;
		}
	}

	public function delete($id)
	{
		$query = $this->stok_barang->delete($id);
		if ($query) {
			$this->session->set_flashdata('message', 'Data Stok Barang <b>BERHASIL</b> Dihapus');
			redirect(base_url('StokController'));
		}
	}
}
