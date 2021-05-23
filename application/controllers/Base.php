<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->model('hotel');
	}

	public function index(){
		$randomHotel['randomHotel'] = $this->hotel->getRandomHotel();
		$data['carrousel'] = $this->load->view('components/carrouselHotel',$randomHotel,TRUE);
		
		$hotel['hotels'] = $this->hotel->getAllHotel();
		$data['showHotel'] = $this->load->view('components/showHotel',$hotel,TRUE);

        
		$data['style'] = $this->load->view('include/ui',NULL, TRUE);
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
		$this->load->view('pages/home', $data);
	}

	public function detail($id){
		$data['hotels'] = $this->hotel->getSpesificHotel($id);
		$data['facilities'] = $this->hotel->getFacilities($id);

		$data['style'] = $this->load->view('include/ui',NULL, TRUE);
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
		$this->load->view('pages/detail', $data);
	}

	public function form(){
		$data['style'] = $this->load->view('include/ui',NULL, TRUE);
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
		$this->load->view('pages/form', $data);
	}
}
?>