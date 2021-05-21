<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
		parent::__construct();
        
	}

	public function index()
	{
        $data['style'] = $this->load->view('include/ui',NULL,TRUE);
		$this->load->view('pages/login', $data);
	}
}
