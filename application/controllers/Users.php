<?php
    class Users extends My_controller{
        public function index(){
            $this->load->model('loginModel');
            $this->load->library('pagination');
            $config = [
                'base_url' => base_url('Users/index'),
                'per_page' => 2,
                'total_rows' => $this->loginModel->num_rows(),
                'full_tag_open' => '<ul class="pagination">',
                'full_tag_close' => '</ul>',
                'next_tag_open' => '<li class="page-link">',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li class="page-link">',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li class="page-link">',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="page-item active"><a class="page-link">',
                'cur_tag_close' => '</a></li>'
    
            ];
            $this->pagination->initialize($config);
            $articles = $this->loginModel->articleList($config['per_page'], $this->uri->segment(3));
            $this->load->view('Users/articleList',compact('articles'));

        }
    }
?>