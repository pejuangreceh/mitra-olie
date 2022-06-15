<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pelanggan extends CI_Model
{
    function create($data)
    {
        $this->db->insert('stok_barang', $data);
    }
    function read($number, $offset)
    {
        return $query = $this->db->get('stok_barang', $number, $offset)->result();
    }
    function get($where = '')
    {
        $query = $this->db->query('select * from stok_barang ' . $where . ' ORDER BY id DESC');
        return $query->result_array();
    }
    function update($data, $where)
    {
        $this->db->where('id', $where);
        return $this->db->update('stok_barang', $data);
    }
    function delete($where)
    {
        $this->db->where('id', $where);
        return $this->db->delete('stok_barang');
    }
    function jumlah_data()
    {
        return $this->db->get('stok_barang')->num_rows();
    }
}
