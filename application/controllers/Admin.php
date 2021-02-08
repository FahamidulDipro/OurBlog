<?php
    class Admin extends My_controller{
        public function index(){
            $this->form_validation->set_rules('username','User Name','required|alpha');
            $this->form_validation->set_rules('password','Password','required|max_length[12]');
            if(  $this->form_validation->run()){
                // echo "Validation Successful";
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                echo $username;
            }
            else{
          
                $this->load->view('Admin/login');
            }
          
        }
    }
?>