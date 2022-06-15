<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TesController extends CI_Controller
{

    public function index()
    {
        $json = file_get_contents("./assets/MOCK_DATA.json");
        $obj  = json_decode($json);
        $data = array(
            'list_data' => $obj
        );
        $this->load->view('tes', $data);
    }
}
