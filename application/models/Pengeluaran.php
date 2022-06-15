<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengeluaran extends CI_Model
{
    function create($data)
    {
        $this->db->insert('pengeluaran', $data);
    }
    function read($number, $offset, $username)
    {
        if (($username != 'bes') && ($username != 'owner') && ($username != 'mekanik')) {
            $this->db->where('username', $username);
        }
        $this->db->select('pengeluaran.id,pengeluaran.kode_transaksi,pengeluaran.jumlah_keluar,nama_barang,pengeluaran.kode_pemasukkan,pengeluaran.username,pengeluaran.created_at,pengeluaran.plat_nomor');
        $this->db->from('pengeluaran');
        $this->db->join('stok_barang', 'pengeluaran.id_stok=stok_barang.id');
        // $this->db->join('user', 'pengeluaran.id_user=user.id');
        // $this->db->limit($number, $offset);
        return $query = $this->db->get()->result();
    }
    // function read($number, $offset)
    // {
    //     return $query = $this->db->get('pengeluaran', $number, $offset)->result();
    // }
    function show()
    {
        return $query = $this->db->get('stok_barang')->result();
    }
    function show_pelanggan()
    {
        $this->db->select('username');
        $this->db->from('pelanggan');
        $this->db->join('stok_barang', 'pemasukkan.id_stok=stok_barang.id');
        return $query = $this->db->get()->result();
    }
    function show_pemasukkan()
    {
        $this->db->select('pemasukkan.kode_transaksi,pemasukkan.sisa_stok,stok_barang.nama_barang,stok_barang.id');
        $this->db->from('pemasukkan');
        $this->db->join('stok_barang', 'pemasukkan.id_stok=stok_barang.id');
        return $query = $this->db->get()->result();
    }
    // function get_sisa_stok()
    // {
    //     $this->db->select('pemasukkan.sisa_stok');
    //     $this->db->from('pemasukkan');
    //     $this->db->join('pengeluaran', 'pemasukkan.kode_transaksi=pengeluaran.kode_pemasukkan');
    //     return $query = $this->db->get()->result_array();
    // }
    function get_oli($where = '')
    {
        $query = $this->db->query('select * from stok_barang ' . $where . ' ORDER BY id DESC');
        return $query->result_array();
    }
    function get_user($where = '')
    {
        $query = $this->db->query('select * from user ' . $where . ' ORDER BY id DESC');
        return $query->result_array();
    }
    function get($where = '')
    {
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->join('pemasukkan', 'pengeluaran.kode_pemasukkan=pemasukkan.kode_transaksi ' . $where);
        return $query = $this->db->get()->result_array();
    }
    function update($data, $where)
    {
        $this->db->where('id', $where);
        return $this->db->update('pengeluaran', $data);
    }
    function delete($where)
    {
        $this->db->where('id', $where);
        return $this->db->delete('pengeluaran');
    }
    function jumlah_data()
    {
        return $this->db->get('pengeluaran')->num_rows();
    }
    public function get_idmax()
    {
        $this->db->select_max('kode_transaksi');
        $this->db->from('pengeluaran');
        $query = $this->db->get();
        return $query;
    }
    //function membuat format id baru berbentuk M00001
    function get_newid($auto_id, $prefix)
    {
        $newId = substr($auto_id, 1, 5);
        $tambah = (int)$newId + 1;
        if (strlen($tambah) == 1) {
            $kode_transaksi = $prefix . "0000" . $tambah;
        } else if (strlen($tambah) == 2) {
            $kode_transaksi = $prefix . "000" . $tambah;
        } else if (strlen($tambah) == 3) {
            $kode_transaksi = $prefix . "00" . $tambah;
        } else if (strlen($tambah) == 4) {
            $kode_transaksi = $prefix . "0" . $tambah;
        } else if (strlen($tambah) == 5) {
            $kode_transaksi = $prefix . $tambah;
        }
        return $kode_transaksi;
    }
    function get_max_stok($id_stok)
    {
        $query = $this->db->query('select jumlah_barang from stok_barang WHERE id = ' . $id_stok);
        return $query->result_array();
    }
}
