<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));

        $this->load->model('file_model');
    }

    public function fileinfo($files_id)
    {
        $this->load->view("header");
        $this->load->view("navbar");

        $filesName = $this->file_model->getFilesName($files_id);
        $realfiles = $this->file_model->getRealFiles($files_id);

        $last = $this->file_model->getLastUpdate($files_id);

        $this->load->view("file_manage",
            array('rfiles'=>$realfiles, 'files_id'=>$files_id, 'filesName'=>$filesName, 'last'=>$last));

        $this->load->view("footer");
    }

    public function do_upload($files_id)
    {

        $path = './static/uploads/'.$files_id;

        if(!is_dir($path)){
            mkdir($path,0777,TRUE);
        }

        $config['upload_path']          = $path;
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload()) {
            $this->session->set_flashdata('message','파일 업로드에 실패하였습니다! 다시 시도해주세요.');
            //redirect('/upload/fileinfo/'.$files_id);
            echo $this->upload->display_errors();
        }
        else {
            $this->file_model->addfile($files_id, $this->upload->data('file_name'),
                                       $this->upload->data('file_size'),
                                        $this->upload->data('client_name'));



            redirect('/upload/fileinfo/'.$files_id);
            //$this->load->view('upload_success', $data);
        }
    }

    public function viewcontent($fileid) {
        $files_id = $this->file_model->getfilesID($fileid);
        $filename = $this->file_model->getfilename($fileid);


        $fp = fopen("static/uploads/".$files_id."/".$filename, "r");
        $fr = fread($fp, filesize("static/uploads/".$files_id."/".$filename));

        fclose($fp);

        echo json_encode($fr);
    }

    public function deleteFile($fileid){
        $files_id = $this->file_model->getfilesID($fileid);
        $filename = $this->file_model->getfilename($fileid);

        $path = "static/uploads/".$files_id."/".$filename;
        unlink($path);

        $this->file_model->deletefile($fileid);

        redirect("upload/fileinfo/".$files_id);
    }


    public function addProj(){
        $name = $this->input->post("projName");
        $this->file_model->addProj($this->session->userdata("user_id"),$name);

        redirect("main");
    }
}