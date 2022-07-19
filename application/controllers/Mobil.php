<?php
class Mobil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_mobil');
    }
    public function index()
    {
        $data['new_id'] = $this->get_idmobil();
        $this->load->view('view_inputmobil', $data);
    }
    public function input_mobil()
    {
        $data = array(
            'id_mobil' => $this->input->post('id_mobil'),
            'no_plat'  => $this->input->post('no_plat'),
            'nama'      => $this->input->post('nama')
        );
        $this->m_mobil->input_mobil($data, 'tb_mobil');
        redirect('mobil');
    }
    public function get_idmobil()
    {
        $new_id =  $this->m_mobil->get_idmax()->result();
        if ($new_id > 0) {
            foreach ($new_id as $key) {
                $auto_id = $key->id_mobil;
            }
        }
        return $id_mobil = $this->m_mobil->get_newid($auto_id, 'M');
    }
}
