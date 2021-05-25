<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Transaction_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insertBooking($idhotel,$email,$nama,$notelp,$jmlkamar,$jmlhari,$tglcheckin,$tglcheckout,$total)
    {
        $data = array(
            'Id_hotel' => $idhotel,
            'Email' => $email,
            'Nama_tamu' => $nama,
            'Nomor_telepon' => $notelp,
            'Jumlah_kamar' => $jmlkamar,
            'Jumlah_hari' => $jmlhari,
            'Tgl_checkin' => $tglcheckin,
            'Tgl_checkout' => $tglcheckout,
            'Total_harga' => $total,
        );
        
        $this->db->insert('booking', $data);
    }
}