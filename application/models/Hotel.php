<?php
defined('BASEPATH') OR exit('No direct script access allowed !');

class Hotel extends CI_Model{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function getSpesificHotel($id) {
		$query = $this->db->query("SELECT * FROM `hotel` WHERE `Id_hotel` = '$id'");
		return $query->result_array();
	}
}
?>