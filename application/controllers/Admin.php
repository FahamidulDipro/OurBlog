<?php
class Admin extends My_controller
{
    public function welcome()
    {
        $this->load->model('loginModel');
        $config = [
            'base_url' => base_url('Admin/Welcome'),
            'per_page' => 2,
            'total_rows' => $this->loginModel->num_rows(),
            'full_tag_open'=>'<ul class="pagination">',
            'full_tag_close'=>'</ul>',
            'next_tag_open'=>'<li class="page-link">',
            'next_tag_close'=>'</li>',
            'prev_tag_open'=>'<li class="page-link">',
            'prev_tag_close'=>'</li>',
            'num_tag_open'=>'<li class="page-link">',
            'num_tag_close'=>'</li>',
            'cur_tag_open'=>'<li class="page-item active"><a class="page-link">',
            'cur_tag_close'=>'</a></li>'

        ];
        $this->pagination->initialize($config);


        if (!$this->session->userdata('id')) {
            return redirect('login');
        } else {
            $this->load->model('loginModel');
            $articles = $this->loginModel->articleList($config['per_page'],$this->uri->segment(3));
            $this->load->view('Admin/dashboard', ['articles' => $articles]);
        }
      
    }
    public function userValidation()
    {
        if ($this->form_validation->run('add_article_rules')) {
            $post = $this->input->post();
            $this->load->model('loginModel');
            $this->loginModel->addArticles($post);
            $this->session->set_flashdata('insert_success', 'Article added successfully!');
            $this->load->view('Admin/add_article');
        } else {
            $this->session->set_flashdata('insert_failed', 'Invalid Article name or Description');
            $this->load->view('Admin/add_article');
        }
    }


    public function sendmail()
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div');
        if ($this->form_validation->run('send_email_rules')) {
            $post = $this->input->post();
            $this->load->model('loginModel');
            if ($this->loginModel->addUser($post)) {
                // echo "User added Successfully!";
                $this->session->set_flashdata('user_added', 'New user added');
                return redirect('login/index');
            } else {
                // echo "User not added";
                $this->session->set_flashdata('user_not_added', 'User cannot be added');
            }

            //   $this->load->library('email');
            //   $this->email->from(set_value('email'),set_value('firstname'));
            //   $this->email->to("mdfahamidulislam047@gmail.com");
            //   $this->email->subject('Registration Greetings...');

            //   $this->email->message('Thanks for registration');
            //   $this->email->set_newline("\r\n");
            //   $this->email->send();
            //   if(!$this->email->send()){
            //       show_error($this->email->print_debugger());
            //   }else{
            //       echo "Your email has been sent";
            //   }
        } else {
            $this->load->view('Admin/register');
        }
    }

    public function addArticle()
    {
        $this->load->view('Admin/add_article');
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        return redirect('login/index');
    }
    
    public function editArticle()
    {
        $id = $this->input->post('id');
        // echo $id;
        $this->load->model('loginModel');
        // echo'<pre>';
        $article = $this->loginModel->findArticle($id);
        $this->load->view('Admin/edit_article',['article'=>$article]);
        // if($this->loginModel->edit($id)){
        //     $this->session->set_flashdata('edit_success','Article updated successfully');
        // }
    }
  
    public function delArticle()
    {
        $id = $this->input->post('id');
        $this->load->model('loginModel');
        if ($this->loginModel->delete($id)) {
            $this->session->set_flashdata('delete_success', 'Article deleted successfully!');
            $this->load->view('Admin/add_article');
        } else {
            $this->session->set_flashdata('delete_failed', 'Article cannot be deleted');
            $this->load->view('Admin/add_article');
        }
    }
    public function updateArticle(){
        print_r($this->input->post());
        $this->load->model('loginModel');
        $this->loginModel->update();
        if($this->loginModel->update()){

        }else{
            
        }
    }
}
?>