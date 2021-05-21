<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('grocery_CRUD');
        $this->load->model('Hotel');
    }

    public function index(){
        $this->crudItem();
    }

    public function crudItem(){
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('hotel')
             ->columns('Id_hotel','Nama_hotel','Kota','Lokasi','Bintang','Harga', 'Jumlah_kamar', 'Gambar')
             ->fields('Id_hotel','Nama_hotel','Kota','Lokasi','Bintang','Harga', 'Jumlah_kamar', 'Gambar')
             ->callback_edit_field('Lokasi', array($this, 'edit_lokasi'))
             ->callback_add_field('Lokasi', array($this, 'edit_lokasi'))
             ->callback_edit_field('Bintang', array($this, 'edit_bintang'))
             ->callback_edit_field('Id_hotel', array($this, 'edit_id'))
             ->callback_column('Gambar', array($this, 'img_size'));

        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        $data['groceryCRUD'] = $this->load->view('include/grocerycrud', $data, TRUE);

        $data['style'] = $this->load->view('include/ui',NULL,TRUE);
        $this->load->view('admin/hotel', $data);
    }

    function edit_lokasi($value, $primary_key){
        return "<textarea name='Deskripsi'> $value </textarea>";
    }

    function add_lokasi($value, $primary_key){
        return "<textarea name='Deskripsi'> $value </textarea>";
    }

    function edit_bintang($value, $primary_key){
        return '<select name="Bintang">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>';
    }

    function edit_id($value) {
        return "<input value='$value' disabled/>";
    }

    function img_size($value, $row){
        $base = base_url('/assets/uploads/hotel');
        $nama = $row->Nama_hotel;
        $kota = $row->Kota;
        return "<img src='$base/$kota/$nama/$value' width='100px'> </img>";
        // return "$base/$kota/$nama/$value";
    }
}
?>