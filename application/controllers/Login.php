<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('user');
        $this->load->helper('captcha');
	}

	public function index()
	{
        $data['style'] = $this->load->view('include/ui',NULL,TRUE);

        $config = array(
            'img_url' => base_url() . 'image_for_captcha/',
            'img_path' => 'image_for_captcha/',
            'img_height' => 45,
            'expiration' => 30,
            'word_length' => 5,
            'img_width' => '250',
            'font_size' => 24
        );
        $captcha = create_captcha($config);
        $this->session->unset_userdata('valuecaptchaCode');
        // unset($_SESSION['valuecaptchaCode']);
        $this->session->set_userdata('valuecaptchaCode', $captcha['word']);
        // $_SESSION['valuecaptchaCode'] = $captcha['word'];
        $data['captchaImg'] = $captcha['image'];

		$this->load->view('pages/login', $data);
	}

    public function auth(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if($this->user->cekUser($email, md5($password)) && $this->checkCaptcha()){
            if($this->user->getRole($email) == "admin"){
                // $_SESSION['role'] = 'admin';
                $this->session->set_userdata('role', 'admin');
            } else {
                // $_SESSION['role'] = 'user';
                $this->session->set_userdata('role', 'user');
            }
            // $_SESSION['email'] = $email;
            $this->session->set_userdata('email', $email);
            // redirect(base_url());
            echo "Berhasil Login";
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">SUMTING WONG WITH YOUR INPUT !</div>');
            redirect(base_url('index.php/Login'));
        }
    }

    public function logOut(){
        // session_destroy();  
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function refresh()
    {
        $config = array(
            'img_url' => base_url() . 'image_for_captcha/',
            'img_path' => 'image_for_captcha/',
            'img_height' => 45,
            'expiration' => 30,
            'word_length' => 5,
            'img_width' => '250',
            'font_size' => 24,
        );
        $captcha = create_captcha($config);
        $this->session->unset_userdata('valuecaptchaCode');
        // unset($_SESSION['valuecaptchaCode']);
        $this->session->set_userdata('valuecaptchaCode', $captcha['word']);
        // $_SESSION['valuecaptchaCode'] = $captcha['word'];
        echo $captcha['image'];
    }

    public function checkCaptcha() {
        $captcha_insert = $this->input->post('captcha');
        $contain_sess_captcha = $this->session->userdata('valuecaptchaCode');
        // $contain_sess_captcha = $_SESSION['valuecaptchaCode'];
        if ($captcha_insert === $contain_sess_captcha) {
            return true;
        } else {
            return false;
        }
        
    }
}
