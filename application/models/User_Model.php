<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class User_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function cekUser($email, $password)
    {
        $query = $this->db->get_where('user', array('Email' => $email, 'Password' => $password));
        return $query->result_array();
    }

    public function getUser($email)
    {
        $query = $this->db->get_where('user', array('Email' => $email));
        return $query->result_array();
    }

    public function getRole($email)
    {
        $role = $this->db->get_where('user', array('Email' => $email))->row()->Role;
        return $role;
    }

    public function register($nama, $email, $password, $tgllahir, $notelp, $foto)
    {
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

    public function updateUser($email, $nama, $notelp, $tgllahir, $posterLink){
        $data = array(
            'Nama' => $nama,
            'Email' => $email,
            'Nomor_telepon' => $notelp,
            'Tanggal_lahir' => $tgllahir,
            'Foto' => $posterLink,
        );
        $this->db->update('user', $data, array('Email' => $email));
    }

    public function changePassword($email, $newPass){
        $data = array(
            'Password' => $newPass,
        );
        $this->db->update('user', $data, array('Email' => $email));
    }
}