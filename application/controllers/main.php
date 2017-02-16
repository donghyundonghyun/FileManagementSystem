<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('file_model');
    }

    function index(){
        $this->load->view("header");
        $this->load->view("navbar");

        $myfiles = $this->file_model->getFilesByUser($this->session->userdata('user_id'));

        $this->load->view("view_files",array("myfiles"=>$myfiles));
        $this->load->view("footer");
    }

}