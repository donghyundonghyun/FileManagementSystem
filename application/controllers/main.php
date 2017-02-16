<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('file_model');

        $this->load->model('auth_model');
    }

    function index(){
        $user_info = $this->auth_model->getUserinfo($this->session->userdata('user_id'));

        $this->load->view("header");
        $this->load->view('navbar', array('name'=>$user_info->name, 'email'=>$user_info->email));
        $myfiles = $this->file_model->getFilesByUser($this->session->userdata('user_id'));

        for($i=0; $i<count($myfiles); $i++) {
            $myfiles[$i]->last = $this->file_model->getLastUpdate($myfiles[$i]->ID);
        }

        $this->load->view("view_files",array("myfiles"=>$myfiles));
        $this->load->view("footer");
    }

    function diff($files_id){

        $filenames = $this->file_model->getCurrentFiles($files_id);
        $cmd = 'diff -u static/uploads/'.$files_id.'/'.$filenames[1]->real_filename.' static/uploads/'.$files_id.'/'.$filenames[0]->real_filename;
        $diff =  `$cmd`;


        $studentarr = explode("\n", $diff);

        for($i=0;$i<count($studentarr);$i++){
            if(isset($studentarr[$i][0]) && $studentarr[$i][0] == '-')
                $status[$i] = 'delmarker';
            else if(isset($studentarr[$i][0]) && $studentarr[$i][0] == '+')
                $status[$i] = 'addmarker';
            else if(isset($studentarr[$i][0]) && $studentarr[$i][0] == "\\")
                $status[$i] = 'notimarker';
        }

        $user_info = $this->auth_model->getUserinfo($this->session->userdata('user_id'));

        $this->load->view("header");
        $this->load->view('navbar', array('name'=>$user_info->name, 'email'=>$user_info->email));
        $this->load->view("diff",array("diff"=>$diff, "status"=>$status, "first"=>$filenames[1]->real_filename, "second"=>$filenames[0]->real_filename));
        $this->load->view("footer");
    }

    function download($files_id, $filename, $downname){
        $this->load->helper('download');
        $f = file_get_contents('static/uploads/'.$files_id.'/'.$filename);
        force_download($downname, $f);
    }
}