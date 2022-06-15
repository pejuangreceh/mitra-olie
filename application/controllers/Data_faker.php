<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_faker extends CI_Controller
{
    public function index()
    {
        include APPPATH . '/third_party/faker/src/autoload.php'; //memanggil library Faker 

        $faker = Faker\Factory::create('id_ID'); // id_ID adalah kode untuk Indonesia, default US

        // me looping data sebanyak 30 kali dan simpan kedalam database
        for ($i = 0; $i < 30; $i++) {

            $data = [
                // 'id' => $i, //id auto increment
                'nama_barang' =>  $faker->name, // data fake nama 
                // 'tahun_lulus' => $faker->year($max = 'now') // data fake tahun
                'jumlah_barang' => $faker->numberBetween($min = 1, $max = 50),
                'harga' => $faker->numberBetween($min = 50000, $max = 100000),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),

            ];

            $this->db->insert('stok_barang', $data); // insert data kedalam tabel tb_siswa
            echo $this->db->insert_id() . "<br/>"; // menampilkan id data yang berhasil disimpan 
        }
    } 
    public function delete()
    {
        $this->db->empty_table('stok_barang'); //hapus semua data faker
    }
}
