<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('grocery_CRUD');
        $this->load->model('Hotel');
        if(!$this->session->userdata('role')){
            redirect(base_url('index.php/Login'));
        } else {
            if($this->session->userdata('role') == 'user')
            redirect(base_url());
        }
    }

    public function index(){
        $this->crudItem();
    }

    public function crudItem(){
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('hotel')
             ->columns('Id_hotel','Nama_hotel','Kota','Lokasi','Bintang', 'Fasilitas', 'Harga', 'Jumlah_kamar', 'Gambar', 'Gambar2', 'Gambar3', 'Gambar4')
             ->fields('Id_hotel','Nama_hotel','Kota','Lokasi','Bintang', 'Fasilitas', 'Harga', 'Jumlah_kamar', 'Gambar', 'Gambar2', 'Gambar3', 'Gambar4')
             ->unset_clone()

             ->callback_edit_field('Lokasi', array($this, 'edit_lokasi'))
             ->callback_edit_field('Nama_hotel', array($this, 'edit_nama'))
             ->callback_edit_field('Kota', array($this, 'edit_kota'))
             ->callback_edit_field('Bintang', array($this, 'edit_bintang'))
             ->callback_edit_field('Id_hotel', array($this, 'edit_id'))
             ->callback_edit_field('Fasilitas', array($this, 'edit_fasilitas'))

             ->callback_add_field('Lokasi', array($this, 'add_lokasi'))
             ->callback_add_field('Id_hotel', array($this, 'add_id'))
             ->callback_add_field('Bintang', array($this, 'add_bintang'))
             ->callback_add_field('Fasilitas', array($this, 'add_fasilitas'))

             ->callback_edit_field('Gambar', array($this, 'edit_gambar'))
             ->callback_edit_field('Gambar2', array($this, 'edit_gambar'))
             ->callback_edit_field('Gambar3', array($this, 'edit_gambar'))
             ->callback_edit_field('Gambar4', array($this, 'edit_gambar'))
             
             ->set_field_upload('Gambar', 'assets/uploads/hotel')
             ->set_field_upload('Gambar2', 'assets/uploads/hotel')
             ->set_field_upload('Gambar3', 'assets/uploads/hotel')
             ->set_field_upload('Gambar4', 'assets/uploads/hotel')

             ->callback_column('Gambar', array($this, 'img_size'))
             ->callback_column('Gambar2', array($this, 'img_size'))
             ->callback_column('Gambar3', array($this, 'img_size'))
             ->callback_column('Gambar4', array($this, 'img_size'))
            //  ->callback_column('Fasilitas',array($this,'view_fasilitas'))
             
             ->callback_read_field('Fasilitas',array($this,'view_fasilitas'));

        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        $data['groceryCRUD'] = $this->load->view('include/grocerycrud', $data, TRUE);

        $data['style'] = $this->load->view('include/ui',NULL,TRUE);
        $this->load->view('admin/hotel', $data);
    }

    function edit_lokasi($value, $primary_key){
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

    function edit_nama($value) {
        return "<input value='$value' disabled/>";
    }

    function edit_kota($value) {
        return "<input value='$value' disabled/>";
    }

    function edit_gambar($value) {
        return "<input value='$value' disabled/>";
    }

    function add_lokasi($value, $primary_key){
        return "<textarea name='Deskripsi'></textarea>";
    }

    function add_id($value, $primary_key){
        return "<input placeholder='auto-generated' disabled/>";
    }
    function add_bintang($value, $primary_key){
        return '<select name="Bintang">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>';
        
    }

    function add_fasilitas($value){
        $scriptFasilitas =
        '<table id="tblFruits">
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="1" /><label for="">Sarapan Gratis</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="2" /><label>Restoran</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="3" /><label>Wi-fi Internet Gratis</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="4" /><label>Parkir</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="5" /><label>Layanan Front-office 24 Jam</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="6" /><label>Bebas Rokok</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="7" /><label>Kolam renang</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="8" /><label>Bar</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="9" /><label>AC</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="10" /><labe">Kopi/Teh di Lobby Hotel</label></td>
            </tr>
            <input style="display:none;" type="text" id="result" name="Fasilitas" value="">
        </table>'.
        '<script type="text/javascript">
            function gatherFasilitas(){
                var selected = new Array();
        
                $("#tblFruits input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    document.getElementById("result").value = selected.join(",");
                }else{
                    document.getElementById("result").value = "";
                }
            }
        </script>';
        return $scriptFasilitas;
    }

    function edit_fasilitas($value){
        $scriptFasilitas =
        '<table id="tblFruits">
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="1" /><label for="">Sarapan Gratis</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="2" /><label>Restoran</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="3" /><label>Wi-fi Internet Gratis</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="4" /><label>Parkir</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="5" /><label>Layanan Front-office 24 Jam</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="6" /><label>Bebas Rokok</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="7" /><label>Kolam renang</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="8" /><label>Bar</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="9" /><label>AC</label></td>
            </tr>
            <tr>
                <td><input onchange="gatherFasilitas()" type="checkbox" value="10" /><labe">Kopi/Teh di Lobby Hotel</label></td>
            </tr>
            <input style="display:none;" type="text" id="result" name="Fasilitas" value="'.$value.'">
        </table>'.
        '<script type="text/javascript">
        $( document ).ready(function() {
            var kategori = "'.$value.'".split(",");
            $("#tblFruits input[type=checkbox]").each(function() {
                if(kategori.includes(this.value)) {
                    $(this).attr("checked", "checked");
                    // console.log("sini");
                }
            });
        });
            function gatherFasilitas(){
                var selected = new Array();
        
                $("#tblFruits input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    document.getElementById("result").value = selected.join(",");
                }else{
                    document.getElementById("result").value = "";
                }
            }
        </script>';
        return $scriptFasilitas;
    }

    function view_fasilitas($value){
        $kategori = array();
        $kategori = explode(",",$value);
        $viewFasilitas = "";
        foreach($kategori as $item){
            switch ($item){
                case 1:
                    $viewFasilitas .= "<li>Sarapan gratis</li>";
                    break;
                case 2:
                    $viewFasilitas .= "<li>Restoran</li>";
                    break;
                case 3:
                    $viewFasilitas .= "<li>Wi-Fi Internet Gratis</li>";
                    break;
                case 4:
                    $viewFasilitas .= "<li>Parkir</li>";
                    break;
                case 5:
                    $viewFasilitas .= "<li>Layanan Front Office 24-jam</li>";
                    break;
                case 6:
                    $viewFasilitas .= "<li>Bebas Rokok</li>";
                    break;
                case 7:
                    $viewFasilitas .= "<li>Kolam Renang</li>";
                    break;
                case 8:
                    $viewFasilitas .= "<li>Bar</li>";
                    break;
                case 9:
                    $viewFasilitas .= "<li>AC</li>";
                    break;
                case 10:
                    $viewFasilitas .= "<li>Kopi/teh di Lobby Hotel</li>";
                    break;
            }
        }
        return $viewFasilitas;
    }

    function img_size($value, $row){
        $base = base_url('/assets/uploads/hotel');
        $nama = $row->Nama_hotel;
        $kota = $row->Kota;
        return "<img src='$base/$kota/$nama/$value' width='100px'> </img>";
        // return "$base/$kota/$nama/$value";
    }

    public function crudItemBooking(){
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('booking')
             ->columns('Id_booking','Id_hotel','Email','Nama_tamu','Nomor_telepon','Jumlah_kamar', 'Jumlah_hari', 'Tgl_checkin', 'Tgl_checkout', 'Total_harga', 'Waktu_booking')
             ->fields('Id_booking','Id_hotel','Email','Nama_tamu','Nomor_telepon','Jumlah_kamar', 'Jumlah_hari', 'Tgl_checkin', 'Tgl_checkout', 'Total_harga', 'Waktu_booking')
             ->unset_clone()
             ->callback_column('Tgl_checkin', array($this, 'Tgl_checkin'))
             ->callback_column('Tgl_checkout', array($this, 'Tgl_checkin'));

        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        $data['groceryCRUD'] = $this->load->view('include/grocerycrud', $data, TRUE);

        $data['style'] = $this->load->view('include/ui',NULL,TRUE);
        $this->load->view('admin/booking', $data);
    }

    public function Tgl_checkin($val, $row)
    {
        return date('Y/m/d', strtotime($val));
    }
}
?>