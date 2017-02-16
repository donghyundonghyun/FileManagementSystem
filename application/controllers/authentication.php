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

    public function mypage(){
        $user_info = $this->auth_model->getUserinfo($this->session->userdata('user_id'));

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('mypage', array('info'=>$user_info));
        $this->load->view('footer');
    }

    public function editmyinfo(){
        $pass = $this->input->post("pass");
        $newpass = $this->input->post("newpass");
        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $phone = $this->input->post("phone");
        $birth = $this->input->post("birth");
        //id pass newpass repass name email phone birth



        $uid = $this->session->userdata('user_id');
        $user_info = $this->auth_model->getUserinfo($uid);

        if(password_verify($pass, $user_info->password)){
            $data = array(
                'password'=>password_hash($newpass,PASSWORD_BCRYPT),
                'name'=>$name,
                'email'=>$email,
                'phone_number'=>$phone,
                'birthday'=>$birth
            );
            $this->auth_model->editmyinfo($data, $uid);
            $this->session->set_flashdata('message','변경완료 !!');
            redirect('/main');
        }else{
            $this->session->set_flashdata('message','비밀번호가 일치하지 않습니다 !!');
            redirect('/authentication/mypage');
        }


    }
}
