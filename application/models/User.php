<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Model
{
	function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	function create($data)
	{
		$this->db->insert('user', $data);
	}
	function read($number, $offset)
	{
		return $query = $this->db->get('user', $number, $offset)->result();
	}
	function get($where = '')
	{
		$query = $this->db->query('select * from user ' . $where . ' ORDER BY id DESC');
		return $query->result_array();
	}
	function update($data, $where)
	{
		$this->db->where('username', $where);
		return $this->db->update('user', $data);
	}
	function delete($where)
	{
		$this->db->where('username', $where);
		return $this->db->delete('user');
	}
	function jumlah_data()
	{
		return $this->db->get('user')->num_rows();
	}
	function login_user($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		return $query->result_array();
	}
}
