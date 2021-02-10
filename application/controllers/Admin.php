<?php
    class Admin extends My_controller{
        // public function __construct()
        // {
        //     parent::__construct();
        //     // if(!$this->session->userdata('id')){
        //     //     return redirect('Admin/welcome');
        //     // }
        // }
      

        public function welcome(){
            if(!$this->session->userdata('id')){
                return redirect('Admin/login');
                
            }else{
                $this->load->model('loginModel');
                $articles=$this->loginModel->articleList();
                // print_r($articles);
                // echo "working";
                // echo $this->session->userdata('id');
                $this->load->view('Admin/dashboard',['articles'=>$articles]);
            }
          
        }
        public function userValidation(){
            if($this->form_validation->run('add_article_rules')){
                $post= $this->input->post();
                $this->load->model('loginModel');
                $this->loginModel->addArticles($post);
                echo'<div class="alert alert-success text-bold">Article added successfuly!</div>';
                // echo "Ok";
            }else{
                $this->session->set_flashdata('insert_failed','Invalid Article name or Description');
                $this->load->view('Admin/add_article');
            }
        }

        public function register(){
            $this->load->view('Admin/register');
        }
        public function sendmail(){
            $this->form_validation->set_error_delimiters('<div class="text-danger">','</div');
            if($this->form_validation->run('send_email_rules')){
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
            $this->load->view('Admin/add_article');

        }
        public function editUser(){

        }
        public function deleteUser(){

        }

        public function logout(){
            $this->session->unset_userdata('id');
            return redirect('login/index');
        }
    }
?>