<?php
defined('BASEPATH') OR exit('No direct script access allowed !');

class User extends CI_Model{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function cekUser($email, $password){
        $val1 = $this->db->escape($email);
        $val2 = $this->db->escape($password);
        $query = $this->db->get_where('user', array('Email' => $val1, 'Password' => $val2));
        return $query->result_array();
    }

    public function getRole($email){
        $role = $this->db->get_where('user', array('Email' => $email))->row()->Role;
        return $role;
    }

    public function register($nama, $email, $password, $tgllahir, $notelp, $foto){
        $data = array(
            'Nama' => "$nama",
            'Email' => "$email",
            'Password' => "$password",
            'Tanggal_lahir' => "$tgllahir",
            'Nomor_telepon' => "$notelp",
            'Foto' => "$foto",
            'Role' => "user"
        );
    
        $this->db->insert('user', $data);
    }
}
?>