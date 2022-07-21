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
            $id = $this->input->post('id_stok');
            $stok = $this->input->post('jumlah_masuk');
            $month = date("m");
            $next_month = $month+1;
            $year = date("Y");
            $forecast = $this->pemasukkan->get_prev_month($id);
            $last_forecast9 = $forecast[0]->ramal_9;
            $last_forecast8 = $forecast[0]->ramal_2;
            $last_forecast7 = $forecast[0]->ramal_3;
            $last_forecast6 = $forecast[0]->ramal_4;
            $last_forecast5 = $forecast[0]->ramal_5;
            $last_forecast4 = $forecast[0]->ramal_4;
            $last_forecast3 = $forecast[0]->ramal_3;
            $last_forecast2 = $forecast[0]->ramal_2;
            $last_forecast1 = $forecast[0]->ramal_1;
            $ramal9 = round(0.9*$stok+0.1*$last_forecast9);
            $ramal8 = round(0.8*$stok+0.2*$last_forecast8);
            $ramal7 = round(0.7*$stok+0.3*$last_forecast7);
            $ramal6 = round(0.6*$stok+0.4*$last_forecast6);
            $ramal5 = round(0.5*$stok+0.5*$last_forecast5);
            $ramal4 = round(0.4*$stok+0.6*$last_forecast4);
            $ramal3 = round(0.3*$stok+0.7*$last_forecast3);
            $ramal2 = round(0.2*$stok+0.8*$last_forecast2);
            $ramal1 = round(0.1*$stok+0.9*$last_forecast1);

			$data = array(
				'kode_transaksi'    => $this->input->post('kode_transaksi'),
				'id_stok'   => $this->input->post('id_stok'),
				'jumlah_masuk'   => $this->input->post('jumlah_masuk'),
				'sisa_stok'   => $this->input->post('jumlah_masuk'),
				'deskripsi'   => $this->input->post('deskripsi'),
				'created_at'   => $this->input->post('created_at'),
				'updated_at'   => $this->input->post('updated_at'),
			);
            $data_ramalan = array(
                'id_stok'   => $this->input->post('id_stok'),
                'periode' => date("F Y", mktime(0,0,0,$next_month,1,$year)),
                'ramal_9' => $ramal9,
                'ramal_8' => $ramal8,
                'ramal_7' => $ramal7,
                'ramal_6' => $ramal6,
                'ramal_5' => $ramal5,
                'ramal_4' => $ramal4,
                'ramal_3' => $ramal3,
                'ramal_2' => $ramal2,
                'ramal_1' => $ramal1,
                'created_at'   => $this->input->post('created_at'),
				'updated_at'   => $this->input->post('updated_at'),
            );
			$this->pemasukkan->create($data);
            $this->pemasukkan->ramal($data_ramalan);
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
