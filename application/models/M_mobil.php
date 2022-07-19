<?php
class M_mobil extends CI_Model
{
    //function untuk menginputkan data mobil
    public function input_mobil($data, $table)
    {
        return $this->db->insert($table, $data);
    }
    //function mendapatkan id terakhir atau id_max mobil
    public function get_idmax()
    {
        $this->db->select_max('id_mobil');
        $this->db->from('tb_mobil');
        $query = $this->db->get();
        return $query;
    }
    //function membuat format id baru berbentuk M00001
    public function get_newid($auto_id, $prefix)
    {
        $newId = substr($auto_id, 1, 4);
        $tambah = (int)$newId + 1;
        if (strlen($tambah) == 1) {
            $id_mobil = $prefix . "000" . $tambah;
        } else if (strlen($tambah) == 2) {
            $id_mobil = $prefix . "00" . $tambah;
        } else if (strlen($tambah) == 3) {
            $id_mobil = $prefix . "0" . $tambah;
        } else if (strlen($tambah) == 4) {
            $id_mobil = $prefix . $tambah;
        }
        return $id_mobil;
    }
}
