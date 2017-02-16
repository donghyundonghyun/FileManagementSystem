<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("mainpage");
        $this->load->view("footer");
    }

}