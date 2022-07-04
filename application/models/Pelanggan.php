<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pelanggan extends CI_Model
{
    function create($data)
    {
        $this->db->insert('pelanggan', $data);
    }
    function read($number, $offset)
    {
        $this->db->order_by('tanggal_daftar', 'asc');
        return $query = $this->db->get('pelanggan')->result();
    }
    function get($where = '')
    {
        $query = $this->db->query('select * from pelanggan ' . $where . ' ORDER BY id DESC');
        return $query->result_array();
    }
    function update($data, $where)
    {
        $this->db->where('id', $where);
        return $this->db->update('pelanggan', $data);
    }
    function delete($where)
    {
        $this->db->where('username', $where);
        return $this->db->delete('pelanggan');
    }
    function jumlah_data()
    {
        return $this->db->get('pelanggan')->num_rows();
    }
    function login_pelanggan($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('pelanggan');
        return $query->result_array();
    }
}
