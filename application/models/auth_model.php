<?php
class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function add(){
        $this->db->set('id','admin123');
        $this->db->set('password', password_hash('12341234',PASSWORD_BCRYPT));
        $this->db->set('name','김동현');
        $this->db->set('phone_number','01091026734');
        $this->db->set('birthday','1992-10-31');
        $this->db->set('email','andy5153a@naver.com');
        $this->db->set('last_login','NOW()',false);
        $this->db->insert('user');
    }

    public function getPassword($user_id){
        $query = $this->db->get_where('user', array('id' => $user_id));

        if($query->num_rows() == 0)
            return null;
        else
            return $query->row()->password;
    }

    public function getUserInfo($user_id) {
        return $this->db->get_where('user', array('id'=>$user_id))->row();
    }

    public function editmyinfo($data, $user_id){
        $this->db->where('id',$user_id);
		$this->db->update('user',$data);
    }
}