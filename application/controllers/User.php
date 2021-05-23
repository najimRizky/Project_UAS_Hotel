<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        // $this->load->library('grocery_CRUD');
        // $this->load->model('Hotel');
    }

    public function index(){
        $data['style'] = $this->load->view('include/ui',NULL, TRUE);
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
        $this->load->view('pages/profile', $data);
    }

    public function editProfile(){
        $nama = $this->input->post('Nama');
        $notelp = $this->input->post('NoTelp');
        $tgllahir = $this->input->post('TanggalLahir');

        echo "$nama<br>";
        echo "$notelp<br>";
        echo $tgllahir;

    }
}
?>