<?php
    class login extends My_controller{
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('id')){
                return redirect('Admin/welcome');
            }
        }
        public function index(){
            $this->form_validation->set_rules('username','User Name','required|alpha');
            $this->form_validation->set_rules('password','Password','required|max_length[12]');
            if(  $this->form_validation->run()){
                // echo "Validation Successful";
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $this->load->model('loginModel');
                $id = $this->loginModel->isValidate($username,$password);
                if($id){
                    echo "Details Match";
                    $this->load->library('session');
                    $this->session->set_userdata('id',$id);
                    echo $_SESSION['id'];
             
                    return redirect('Admin/welcome');
                
                }
                else{
                   $this->session->set_flashdata('login_failed','Invalid username or password');
                   return redirect('login/index');
                }
                
            }
            else{
          
                $this->load->view('Admin/login');
            }
          
        }
    }
?>