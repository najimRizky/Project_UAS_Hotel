<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
        // session_start();
        $this->load->model('user');
        //$this->load->model('transaction');
        //if(isset($_SESSION['role'])) redirect(base_url());
	}
    
    public function index(){
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
        $data['style'] = $this->load->view('include/ui',NULL,TRUE);
        $data['footer'] = $this->load->view('components/footer',NULL, TRUE);
        $this->load->view('pages/register',$data);
    }

    public function auth(){
        $nama = $this->input->post('Nama');
        $email = $this->input->post('Email');
        $password = $this->input->post('Password');
        $tgllahir = $this->input->post('TanggalLahir');
        $notelp = $this->input->post('NoTelp');
        $foto = $this->do_upload();

        $this->user->register($nama, $email, md5($password), $tgllahir, $notelp, $foto);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert" text-center">Account Registered Successfully !</div>');
        redirect(base_url('index.php/Login'));
    }

    public function do_upload() {
        $config['upload_path'] = './assets/customer/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $config['max_size'] = '2048';

        $this->upload->initialize($config);

        if($this->upload->do_upload('Foto')){ //kalo upload foto berhasil
            $foto = $this->upload->data('file_name');
        } else {                              //kalo ga upload
            $foto = 'default.jpg';
        }
        
        return $foto;
    }
}
