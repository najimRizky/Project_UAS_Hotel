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
		if(!$this->hotel->getSpesificHotel($id)){
			redirect(base_url());
		}
		$data['hotels'] = $this->hotel->getSpesificHotel($id);
		$data['facilities'] = $this->hotel->getFacilities($id);

		$data['style'] = $this->load->view('include/ui',NULL, TRUE);
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
		$this->load->view('pages/detail', $data);
	}

	public function aboutUs(){
		$data['style'] = $this->load->view('include/ui',NULL, TRUE);
		$data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
		$this->load->view('pages/aboutUs', $data);
	}

	public function search($keyword){
		$data['style'] = $this->load->view('include/ui',NULL, TRUE);
        $data['nav'] = $this->load->view('components/nav',NULL, TRUE);
		$data['footer'] = $this->load->view('components/footer',NULL, TRUE);
		$data['keyword'] = $keyword;
		$data['hotels'] = $this->hotel->searchHotel($keyword);
		$hotel['hotels'] = $this->hotel->getAllHotel();
		$data['kota'] = array();

		if(count($hotel['hotels']) != 0){
			foreach($hotel['hotels'] as $item){
				if(!in_array($item['Kota'],$data['kota'])){
					array_push($data['kota'],$item['Kota']);
				}
			}
			if(isset($_GET['minprice']) && isset($_GET['maxprice'])){
				$index = 0;
				foreach($data['hotels'] as $item){
					if($item['Harga'] >= $_GET['minprice'] && $item['Harga'] <= $_GET['maxprice']){
						// echo $item['Harga']." <= ".$_GET['maxprice']."<br>";
					}else{
						// echo $item['Harga']." > ".$_GET['maxprice']."<br>";
						unset($data['hotels'][$index]);
					}
					$index++;
				}
			}
			$data['hotels'] = array_values($data['hotels']);
		}

		// var_dump($data['hotels']);

		$this->load->view('pages/searchResult', $data);
	}
}
?>