<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function add(){
        $this->auth_model->add();
    }

    public function loginpage(){
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function login(){
        $id = $this->input->post("user");
        $pass = $this->input->post("pass");


        $realpass = $this->auth_model->getPassword($id);


        if(!is_null($realpass) && password_verify($pass, $realpass)) {

            $this->session->set_userdata('is_login',true);
            $this->session->set_userdata('user_id', $id);


            redirect('/main/index');
        }else{
            $this->session->set_flashdata('message','username 또는 password를 다시 확인해주세요');
            redirect('/authentication/loginpage/');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/authentication/loginpage');
    }
}
