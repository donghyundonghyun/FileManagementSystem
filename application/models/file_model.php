<?php
class File_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getFilesByUser($user_id){
        $query = $this->db->get_where('files', array('created_user'=> $user_id));
        if($query->num_rows() == 0)
            return null;
        else
            return $query->result();
    }


    public function getRealFiles($files_id){
        $query = $this->db->get_where('files_info', array('files_id'=>$files_id));
        if($query->num_rows() == 0)
            return null;
        else
            return $query->result();
    }

    public function getFilesName($files_id){
        return $this->db->get_where('files', array('ID'=>$files_id))->row()->filename;
    }


    public function addfile($files_id, $file_name, $file_size, $user_filename) {
        $this->db->set('files_id',$files_id);
        $this->db->set('user_filename', $user_filename);
        $this->db->set('real_filename', $file_name);
        $this->db->set('file_size',$file_size);
        $this->db->set('created_date','NOW()',false);
        $this->db->insert('files_info');
    }

    public function getfilesID($fileid){
        return $this->db->get_where('files_info', array('ID'=>$fileid))->row()->files_id;
    }

    public function getfilename($fileid){
        return $this->db->get_where('files_info', array('ID'=>$fileid))->row()->real_filename;
    }


    public function deletefile($fileid){
        $this->db->delete('files_info', array('ID'=>$fileid));
    }

}