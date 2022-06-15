<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PelangganController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// echo $this->session->userdata('username');
		// if (($this->session->userdata('role') != '1') && ($this->session->userdata('role') != '2')) {
		// 	redirect(base_url());
		// }
		$this->load->model('pelanggan');
		$this->load->model('user');
		if ($this->session->userdata('role') == '1') {
			return true;
		} else if ($this->session->userdata('role') == '2') {
			return true;
		} else if ($this->session->userdata('role') == '3') {
			return true;
		} else {
			redirect(base_url());
		}
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			$jumlah_data = $this->pelanggan->jumlah_data();
			$from = $this->uri->segment(3);
			$this->config->load('pagination', TRUE);
			$settings = $this->config->item('pagination');
			$settings['base_url'] = base_url() . 'PelangganController';
			$settings['total_rows'] = $jumlah_data;
			$this->pagination->initialize($settings);
			$data['pelanggans'] = $this->pelanggan->read($settings['per_page'], $from);
			$data['links'] = $this->pagination->create_links();
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pelanggan/index', $data);
			$this->load->view('template/footer');
		} elseif ($this->session->userdata('username') == NULL) {
			$this->session->set_flashdata('berhasil', 'Daftar Berhasil');
			redirect(base_url());
		} else {
			redirect(base_url());
		}
	}
	public function daftar()
	{
		if ($this->session->userdata('username') && $this->session->userdata('role') == '1') {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pelanggan/daftar');
			$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function simpan()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('alamat', 'no_telepon', 'required');
		$this->form_validation->set_rules('alamat', 'plat_nomor', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pelanggan/daftar');
			$this->load->view('template/footer');
		} else {
			$data = array(
				'name'    => $this->input->post('name'),
				'username'   => $this->input->post('username'),
				'password'   => md5($this->input->post('password')),
				'alamat'   => $this->input->post('alamat'),
				'no_telepon'   => $this->input->post('no_telepon'),
				'plat_nomor'   => $this->input->post('plat_nomor'),
				'user_level'   => $this->input->post('user_level'),
				'tanggal_daftar'   => $this->input->post('tanggal_daftar'),
				'tanggal_servis'   => $this->input->post('tanggal_servis'),
			);
			$this->pelanggan->create($data);
			$this->user->create($data);
			$this->session->set_flashdata('message', 'Data Pelanggan <b>BERHASIL</b> Ditambahkan');
			$this->session->set_flashdata('daftar_sukses', 'yes');
			redirect(base_url('PelangganController'));
		}
	}
	public function detail($id)
	{
		if (($this->session->userdata('role') == '1') || ($this->session->userdata('role') == '2') || ($this->session->userdata('role') == '3')) {
			$result = $this->pelanggan->get("WHERE id = '$id'");
			$data = array(
				'name'       => $result[0]['name'],
				'username'     => $result[0]['username'],
				'alamat'     => $result[0]['alamat'],
				'no_telepon'    => $result[0]['no_telepon'],
				'plat_nomor'    => $result[0]['plat_nomor'],
				'tanggal_daftar'    => $result[0]['tanggal_daftar'],
				'tanggal_servis'    => $result[0]['tanggal_servis'],
			);
			// var_dump($data);
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pelanggan/detail', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function edit($id)
	{
		if ($this->session->userdata('username') && $this->session->userdata('role') == '1') {
			$result = $this->pelanggan->get("WHERE id = '$id'");
			$data = array(
				'id' => $id,
				'name'       => $result[0]['name'],
				'username'     => $result[0]['username'],
				'alamat'     => $result[0]['alamat'],
				'no_telepon'    => $result[0]['no_telepon'],
				'plat_nomor'    => $result[0]['plat_nomor'],
				'tanggal_daftar'    => $result[0]['tanggal_daftar'],
				'tanggal_servis'    => $result[0]['tanggal_servis'],
			);
			// var_dump($data);

			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pelanggan/edit', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	public function update($id)
	{
		$data = array(
			'name'    => $this->input->post('name'),
			'username'   => $this->input->post('username'),
			'alamat'   => $this->input->post('alamat'),
			'no_telepon'   => $this->input->post('no_telepon'),
			'plat_nomor'   => $this->input->post('plat_nomor'),
		);
		$username = $this->input->post('username');
		$query = $this->pelanggan->update($data, $id);
		$this->user->update($data, $username);
		if ($query) {
			$this->session->set_flashdata('message', 'Data Pelanggan <b>BERHASIL</b> DiUpdate');
			redirect(base_url('PelangganController'));
		} else {
			echo $id;
		}
	}

	public function delete($username)
	{
		if ($this->session->userdata('username') && $this->session->userdata('role') == '1') {
			$query = $this->pelanggan->delete($username);
			$this->user->delete($username);
			if ($query) {
				$this->session->set_flashdata('message', 'Data Pelanggan <b>BERHASIL</b> Dihapus');
				redirect(base_url('PelangganController'));
			}
		} else {
			redirect(base_url());
		}
	}
}
