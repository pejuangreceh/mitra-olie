<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemasukkan extends CI_Model
{
    function create($data)
    {
        $this->db->insert('pemasukkan', $data);
    }
    function read($number, $offset)
    {
        $this->db->select('pemasukkan.id,kode_transaksi,jumlah_masuk,status_terpakai,nama_barang,sisa_stok,pemasukkan.created_at');
        $this->db->from('pemasukkan');
        $this->db->join('stok_barang', 'pemasukkan.id_stok=stok_barang.id');
        // $this->db->limit($number, $offset);
        // ini di komen aja biar pake filter bawaan datatables
        return $query = $this->db->get()->result();
    }
    // function read($number, $offset)
    // {
    //     return $query = $this->db->get('pemasukkan', $number, $offset)->result();
    // }
    function show()
    {
        return $query = $this->db->get('stok_barang')->result();
    }
    function get_oli($where = '')
    {
        $query = $this->db->query('select * from stok_barang ' . $where . ' ORDER BY id DESC');
        return $query->result_array();
    }
    function get($where = '')
    {
        $query = $this->db->query('select * from pemasukkan ' . $where . ' ORDER BY id DESC');
        return $query->result_array();
    }
    function update($data, $where)
    {
        $this->db->where('id', $where);
        return $this->db->update('pemasukkan', $data);
    }
    function delete($where)
    {
        $this->db->where('id', $where);
        return $this->db->delete('pemasukkan');
    }
    function jumlah_data()
    {
        return $this->db->get('pemasukkan')->num_rows();
    }
    public function get_idmax()
    {
        $this->db->select_max('kode_transaksi');
        $this->db->from('pemasukkan');
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
    function get_oli_perbulan($where = NULL)
    {
        $this->db->select('pemasukkan.created_at,pemasukkan.jumlah_masuk,stok_barang.nama_barang');
        $this->db->from('pemasukkan');
        $this->db->join('stok_barang', 'pemasukkan.id_stok = stok_barang.id');
        if ($where != NULL) {
            $this->db->where('id_stok', $where);
        }
        $this->db->order_by('stok_barang.nama_barang', 'ASC');
        $this->db->order_by('pemasukkan.created_at', 'ASC');
        // $this->db->where('stok_barang.nama_barang = "Oli Mesin"');
        return $query = $this->db->get()->result();
    }
    function get_bulan()
    {
        $query = $this->db->query('SELECT DISTINCT MONTH(created_at) AS "month" from pemasukkan ORDER BY created_at ASC');
        // $this->db->distinct();
        // $this->db->select('MONTH(created_at)');
        // $this->db->from('pemasukkan');
        return $query->result();
    }
    function get_stok()
    {
        $query = $this->db->query('SELECT nama_barang,id from stok_barang ORDER BY id ASC');

        return $query->result();
    }

    function get_1_tahun($where = NULL)
    {
        // $query = $this->db->query('SELECT * FROM pemasukkan WHERE created_at >= DATE_ADD(NOW(),INTERVAL -90 DAY) ');
        $this->db->select('*');
        $this->db->from('pemasukkan');
        if ($where != NULL) {
            $this->db->where('id_stok', $where);
        }
        $this->db->where('created_at >= DATE_ADD(NOW(),INTERVAL -365 DAY)');
        return $query = $this->db->get()->result();
    }
    function get_1_tahun_sum($where = NULL)
    {
        // $query = $this->db->query('SELECT * FROM pemasukkan WHERE created_at >= DATE_ADD(NOW(),INTERVAL -90 DAY) ');
        $this->db->select('SUM(jumlah_masuk)');
        // $this->db->select('jumlah_masuk,id_stok,created_at');
        $this->db->from('pemasukkan');
        if ($where != NULL) {
            $this->db->where('id_stok', $where);
        }
        $this->db->where('created_at >= DATE_ADD(NOW(),INTERVAL -365 DAY)');
        return $query = $this->db->get();
    }
}
