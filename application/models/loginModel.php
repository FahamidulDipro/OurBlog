<?php
    class loginModel extends CI_Model{
        public function isValidate($username,$password){
            $q=$this->db->where(['username' => "$username",'password' => "$password"])
                        ->get('users');
                       if($q->num_rows()){
                        return $q->row()->id;
                       } else{
                           return false;
                       }

        }
        public function articleList(){
            $id=$this->session->userdata('id');
            $q=$this->db->select('title')
                     ->from('articles')
                     ->where(['id'=>$id])
                     ->get();
                    return $q->result();
        }
    }
?>