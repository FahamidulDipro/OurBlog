<?php
$config = [
    'add_article_rules' => [
        ['field' => 'article_title', 'label' => 'Article Title', 'rules' => 'required|alpha'],
        ['field' => 'description', 'label' => 'Description', 'rules' => 'required|alpha']

    ],
    'login_user_rules' => [
        ['field' => 'username', 'label' => 'User Name', 'rules' => 'required|alpha'],
        ['field' => 'password', 'label' => 'Password', 'rules' => 'required|max_length[12]']

    ],
    'send_email_rules' => [
        ['field' => 'username', 'label' => 'User Name', 'rules' => 'required|alpha'],
        ['field' => 'password', 'label' => 'Password', 'rules' => 'required|max_length[12]'],
        ['field' => 'firstname', 'label' => 'First Name', 'rules' => 'required|alpha'],
        ['field' => 'lastname', 'label' => 'Last Name', 'rules' => 'required|alpha'],
        ['field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email|is_unique[users.email]'],

    ],

    

];
?>