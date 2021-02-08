<?php
    class Admin extends My_controller{
        public function index(){
            // echo "This is the Admin user ";
            $this->form_validation->set_rules('username','User Name','required|alpha');
            $this->form_validation->set_rules('password','Password','required|max_length[12]');
            if(  $this->form_validation->run()){
                echo "Validation Successful";
            }
            else{
          
                $this->load->view('Users/articleList');
            }
          
        }
    }
?>