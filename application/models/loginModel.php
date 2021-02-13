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
        public function articleList($limit,$offset){
            $id=$this->session->userdata('id');
            $q=$this->db->select('*')
                     ->from('articles')
                     ->where(['user_id'=>$id])
                     ->limit($limit,$offset)
                     ->get();
                    return $q->result();

        }
        public function addArticles($array){
            return $this->db->insert('articles',$array);
        }
        public function addUser($array){
           return $this->db->insert('users',$array);

        }
        public function findArticle($article_id){
            $q=$this->db->select('*')
            ->from('articles')
                    ->where('id',$article_id)
                    ->get();
                return $q->row();
        }
        // public function edit($id){
        //     return $this->db->
        // }
        public function delete($id){
           return $this->db->delete('articles',['id'=>$id]);
        }
        public function num_rows(){
            $id=$this->session->userdata('id');
            $q=$this->db->select('*')
                     ->from('articles')
                     ->where(['user_id'=>$id])
                     ->get();
                    return $q->num_rows();
        }
      
    }
?>