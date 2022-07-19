<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		$this->load->model('pelanggan');
	}
	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect(base_url('DashboardController'));
		} else {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('login/index');
			$this->load->view('template/footer');
		}
	}
	public function cek_login()
	{
		// keterangan user level
		// 0 = pelanggan
		// 1 = admin
		// 2 = owner
		// 3 = mekanik
		$username 	= $this->input->post('username');
		$password 	= md5($this->input->post('password'));
		$result 	= $this->user->login($username, $password);
		if ($result) {
			$sess = array(
				'id_user'  => $result[0]['id'],
				'username'  => $result[0]['username'],
				'name'  	=> $result[0]['name'],
				'role'		=> $result[0]['user_level'],
				'plat'		=> $result[0]['plat_nomor'],
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sess);
			redirect(base_url('DashboardController'));
		} else {
			$this->session->set_flashdata('message', 'Username atau password salah');
			redirect(base_url());
		}
	}
	public function daftar()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('login/daftar');
		$this->load->view('template/footer');
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
			$this->session->set_flashdata('message', 'Data Pelanggan <b>GAGAL</b> Ditambahkan');
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('login/daftar');
			$this->load->view('template/footer');
		} else {
			$data = array(
				'name'    => $this->input->post('name'),
				'username'   => $this->input->post('username'),
				'password'   => md5($this->input->post('password')),
				'alamat'   => $this->input->post('alamat'),
				'no_telepon'   => $this->input->post('no_telepon'),
				'plat_nomor'   => $this->input->post('plat_nomor'),
				'user_level'   => 0,
				'tanggal_daftar'   => $this->input->post('tanggal_daftar'),
				'tanggal_servis'   => $this->input->post('tanggal_servis'),
			);
			$this->pelanggan->create($data);
			$this->user->create($data);
			$this->session->set_flashdata('message', 'Data Pelanggan <b>BERHASIL</b> Ditambahkan');
			$this->session->set_flashdata('daftar_sukses', 'yes');
			redirect(base_url('login'));
		}
	}
	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}
}
