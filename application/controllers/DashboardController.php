<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!($this->session->userdata('username'))) {
			redirect(base_url());
		}
		$this->load->model('pemasukkan');
		$this->load->model('stok_barang');
	}
	public function getData()
	{
		$data = $this->pemasukkan->get_bulan();
		echo json_encode($data);
	}
	public function index($where = 138)
	{
		// kalo mau cek siapa yang login, hapus komennya aja
		// var_dump($this->session->userdata());

		if ($this->session->userdata('username')) {
			if ($this->session->userdata('role') != 0) {
				$data['ramals'] = $this->pemasukkan->get_1_tahun($where);
				$data['masuks'] = $this->pemasukkan->get_oli_perbulan($where);
				$data['bulans'] = $this->pemasukkan->get_bulan();
				$data['stoks'] = $this->pemasukkan->get_stok();
				$data['my_uri'] = $this->uri->segment(3);
				$this->load->view('template/header');
				$this->load->view('template/navbar');
				$this->load->view('dashboard/index', $data);
				$this->load->view('template/footer');
			} else {
				redirect(base_url('PengeluaranController'));
			}
		} else {
			redirect(base_url());
		}
	}
	public function test($where = NULL)
	{
		if ($this->session->userdata('username')) {
			$data = $this->pemasukkan->get_1_tahun($where);
			$total = 0;
			$hasil = 0;
			foreach ($data as $object) {
				// var_dump($object);
				$total = $total + $object->jumlah_masuk;
				echo $object->id_stok . "</br>";
				echo $object->created_at . "</br>";
				echo $object->jumlah_masuk . "</br></br>";
			}

			$hasil = $total / 3;
			echo $total . " : 3 = " . ceil($hasil);
		} else {
			redirect(base_url());
		}
	}
}
