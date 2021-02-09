<?php
    class Admin extends My_controller{
        public function __construct()
        {
            parent::__construct();
            // if(!$this->session->userdata('id')){
            //     return redirect('Admin/login');
            // }
        }
        public function login(){
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
                   return redirect('Admin/login');
                }
                
            }
            else{
          
                $this->load->view('Admin/login');
            }
          
        }

        public function welcome(){
            if(!$this->session->userdata('id')){
                return redirect('Admin/login');
            }else{
                $this->load->model('loginModel');
                $articles=$this->loginModel->articleList();
                $this->load->view('Admin/dashboard',['articles'=>$articles]);
            }
          
        }

        public function register(){
            $this->load->view('Admin/register');
        }
        public function sendmail(){
            $this->form_validation->set_rules('username','User Name','required|alpha');
            $this->form_validation->set_rules('firstname','First Name','required|alpha');
            $this->form_validation->set_rules('lastname','Last Name','required|alpha');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password','Password','required|max_length[12]');
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div');
            if($this->form_validation->run()){
              $this->load->library('email');
              $this->email->from(set_value('email'),set_value('firstname'));
              $this->email->to("mdfahamidulislam047@gmail.com");
              $this->email->subject('Registration Greetings...');

              $this->email->message('Thanks for registration');
              $this->email->set_newline("\r\n");
              $this->email->send();
              if(!$this->email->send()){
                  show_error($this->email->print_debugger());
              }else{
                  echo "Your email has been sent";
              }
            }else{
                $this->load->view('Admin/register');
            }
        }

        public function addUser(){
            
        }
        public function editUser(){

        }
        public function deleteUser(){

        }

        public function logout(){
            $this->session->unset_userdata('id');
            return redirect('Admin/login');
        }
    }
?>