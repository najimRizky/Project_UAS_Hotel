<?php
defined('BASEPATH') OR exit('No direct script access allowed !');

class Hotel extends CI_Model{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function getSpesificHotel($id) {
		// $query = $this->db->query("SELECT * FROM `hotel` WHERE `Id_hotel` = '$id'");
		$query = $this->db->get_where('hotel', array('Id_hotel' => $id));
		return $query->result_array();
	}

	public function getRandomHotel(){
		$query = $this->db->query("SELECT * FROM hotel ORDER BY RAND() LIMIT 5;");
		return $query->result_array();
	}

	public function getAllHotel(){
		$query = $this->db->query("SELECT * FROM hotel");
		return $query->result_array();
	}

	public function getFacilities($id){
		$query = $this->db->query("SELECT hf.Id_fasilitas, hf.Id_hotel, f.deskripsi FROM `fasilitas` AS f, hotel_fasilitas AS hf WHERE hf.Id_fasilitas = f.Id_fasilitas AND hf.Id_hotel = '$id'");
		return $query->result_array();
	}

	public function searchHotel($keyword){
		$query = $this->db->query("SELECT * FROM hotel WHERE Nama_hotel LIKE '%$keyword%'");
		return $query->result_array();
	}

	public function searchHotelPrice($keyword){
		$query = $this->db->query("SELECT * FROM hotel WHERE Nama_hotel LIKE '%$keyword%'");
		return $query->result_array();
	}
}
?>