<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->model('hotel');
	}

	public function index(){
        $data['style'] = $this->load->view('include/ui',NULL, TRUE);
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
		$hotel['randomHotel'] = $this->hotel->getRandomHotel();
		$data['carrousel'] = $this->load->view('components/carrouselHotel',$hotel,TRUE);
		$this->load->view('pages/home', $data);
	}
}
?>

