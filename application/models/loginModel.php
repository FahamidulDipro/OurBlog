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
            $q=$this->db->select('article_title')
                     ->from('articles')
                     ->where(['user_id'=>$id])
                     ->get();
                    return $q->result();
        }
        public function addArticles($array){
            return $this->db->insert('articles',$array);
        }
    }
?>