<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('Hotel');
        $this->load->model('User_Model');
        $this->load->model('Transaction_Model');
        if(!$this->session->userdata('role')){
            redirect(base_url('index.php/Login'));
        } else {
            if($this->session->userdata('role') == 'admin'){
                redirect(base_url('index.php/admin'));
            }
        }
    }

    public function index(){
        redirect(base_url('index.php/user/profile'));
    }

    public function profile(){
        $email = $this->session->userdata('email');
        $data['user'] = $this->User_Model->getUser($email);
        
        if($this->session->flashdata('error_upload')){
            $data['error'] = $this->session->flashdata('error_upload');
        } else if($this->session->flashdata('msg')) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your profile updated successfully !</div>');
            $data['error'] = '';
        } else if($this->session->flashdata('pass')){
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Change password success</div>');
            $data['error'] = '';
        } else {
            $data['error'] = '';
        }

        $data['style'] = $this->load->view('include/ui',NULL, TRUE);
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
        $this->load->view('pages/profile', $data);
    }

    public function editProfile(){
        if($this->input->method() == 'post'){
            $config['upload_path'] = './assets/customer/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['overwrite'] = TRUE;
            $config['max_size'] = '1024';

            $this->upload->initialize($config);

            $email = $this->input->post('Email');
            $nama = $this->input->post('Nama');
            $notelp = $this->input->post('NoTelp');
            $tgllahir = $this->input->post('TanggalLahir');
            $data = $this->User_Model->getUser($email);
            
            if($this->upload->do_upload('PosterLink')){	//kalo upload foto berhasil
                
                $posterLink = "".$this->upload->data('file_name');

                if($posterLink == ""){
                    foreach($data as $row){
                        $posterLink = $row['Foto'];
                    }
                }
                $data['error'] = '';
                $this->User_Model->updateUser($email,$nama,$notelp,$tgllahir,$posterLink);
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your profile updated successfully !</div>');
            } else if($_FILES['PosterLink']['error'] == 4){ //kalo ga upload foto

                $posterLink = "";

                if($posterLink == ""){
                    foreach($data as $row){
                        $posterLink = $row['Foto'];
                    }
                }
                $data['error'] = '';
                $this->User_Model->updateUser($email,$nama,$notelp,$tgllahir,$posterLink);
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your profile updated successfully !</div>');
            } else {    //kalo gagal upload foto
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error_upload',$error);
            }
        } 
        
        redirect(base_url('index.php/User/profile'));
    }

    public function form(){
        $data['hotel'] = $this->Hotel->getSpesificHotel($this->input->get('idHotel'));
		$data['style'] = $this->load->view('include/ui',NULL, TRUE);
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
		$this->load->view('pages/form', $data);
	}

    public function submitForm(){
        $idhotel = $this->input->post('Id_hotel');
        $email = $this->input->post('Email');
        $nama = $this->input->post('Nama_tamu');
        $notelp = $this->input->post('Nomor_telepon');
        $jmlkamar = $this->input->post('Jumlah_kamar');
        $jmlhari = $this->input->post('Hari');
        $tglcheckin = $this->input->post('Tanggal_checkin');
        $tglcheckout = $this->input->post('Tanggal_checkout');
        $total = $this->input->post('Total');

        $this->Transaction_Model->insertBooking($idhotel,$email,$nama,$notelp,$jmlkamar,$jmlhari,$tglcheckin,$tglcheckout,$total);
        $lastBook = $this->Transaction_Model->getLastBooking($this->session->userdata('email'));
        // $this->session->set_flashdata('msg',"<div class='alert alert-success text-center'>Booking Successful</div>");
        redirect(base_url("index.php/User/invoice/").$lastBook[0]['Id_booking']);
    }

    public function changePassword(){
        if($this->input->method() == 'post'){
            $oldPass = $this->input->post('oldPass');
            $newPass = $this->input->post('newPass');
            $email = $this->session->userdata('email');
            if($this->User_Model->cekUser($email,md5($oldPass))){
                $this->User_Model->changePassword($email,md5($newPass));
                $this->session->set_flashdata('pass', '<div class="alert alert-success text-center">Change password success</div>');
                redirect(base_url('index.php/user/profile'));
            }else{
                $this->session->set_flashdata('wrong', '<div class="alert alert-danger text-center">Old password incorrect</div>');
                redirect(base_url('index.php/user/changePassword'));
            }
        }else{
            $data['style'] = $this->load->view('include/ui',NULL, TRUE);
            $this->load->view('pages/changePass', $data);
        }
    }

    public function invoice($idBooking){
        if($this->Transaction_Model->cekValidEmailBooking($idBooking,$this->session->userdata('email'))){
            $data['style'] = $this->load->view('include/ui',NULL, TRUE);
            $data['booking'] = $this->Transaction_Model->getBooking($idBooking);
            // var_dump($data['booking']);
            $this->load->view('pages/invoice',$data);
        }else{
            redirect(base_url());
        }
    }

    public function booking(){
        $data['style'] = $this->load->view('include/ui',NULL, TRUE);
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
        $data['bookings'] = $this->Transaction_Model->getAllBooking($this->session->userdata('email'));
        $this->load->view('pages/bookingHistory', $data);
    }
}
