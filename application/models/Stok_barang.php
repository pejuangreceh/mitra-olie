<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok_barang extends CI_Model
{
    function create($data)
    {
        $this->db->insert('stok_barang', $data);
    }
    function read($number, $offset)
    {
        // $this->db->select('*');
        // $this->db->from('stok_barang');
        // $this->db->join('pemasukkan', 'stok_barang.id=pemasukkan.id_stok');
        // $this->db->limit($number, $offset);
        // return $query = $this->db->get()->result();
        // $this->db->order_by("id", "asc");
        return $query = $this->db->get('stok_barang')->result();
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
    function show()
    {
        return $query = $this->db->get('stok_barang')->result();
    }
    function show_transaksi()
    {
        $this->db->select('stok_barang.id');
        $this->db->from('pemasukkan');
        $this->db->join('stok_barang', 'pemasukkan.id_stok=stok_barang.id');
        return $query = $this->db->get()->result_array();
    }
}
