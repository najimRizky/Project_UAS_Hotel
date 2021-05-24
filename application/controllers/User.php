<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        // $this->load->library('grocery_CRUD');
        // $this->load->model('Hotel');
        $this->load->model('User_Model');
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

    public function form(){
		$data['style'] = $this->load->view('include/ui',NULL, TRUE);
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
		$this->load->view('pages/form', $data);
	}

    public function submitForm(){
        // $idhotel =
        $email = $this->input->post('Email');
        $nama = $this->input->post('Nama_tamu');
        $notelp = $this->input->post('Nomor_telepon');
        $jmlkamar = $this->input->post('Jumlah_kamar');
        $jmlhari = $this->input->post('Hari');
        $tglcheckin = $this->input->post('Tanggal_checkin');
        $tglcheckout = $this->input->post('Tanggal_checkout');
        $total = $this->input->post('Total');

        // echo "$email <br>";
        // echo "$nama <br>";
        // echo "$notelp <br>";
        // echo "$jmlkamar <br>";
        // echo "$jmlhari <br>";
        // echo "$tglcheckin <br>";
        // echo "$tglcheckout <br>";
        // echo "$total <br>";

        // $data = array(                       -----------------------------
        //     'id_booking' => 13,              GET ID HOTEL, ITUNG ID BOOKING
        //     'Id_hotel' => 22,
        //     'Email' => $email,
        //     'Nama_tamu' => $nama,
        //     'Nomor_telepon' => $notelp,
        //     'Jumlah_kamar' => $jmlkamar,
        //     'Jumlah_hari' => $jmlhari,
        //     'Tgl_checkin' => $tglcheckin,
        //     'Tgl_checkout' => $tglcheckout,
        //     'Total_harga' => $total,
        // );
        
        // $this->db->insert('booking', $data);
            
        
    }
}
?>