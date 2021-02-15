<?php
    class Dynamic_dependent extends CI_controller{
        public function __construct()
        {
            parent:: __construct();
            $this->load->model('dynamic_dependent_model');
        }
        function index(){
            $countryData['country']=$this->dynamic_dependent_model->fetch_country();
            $this->load->view('Users/dynamic',$countryData);
        }
        function fetchState(){
            //  if($this->input->post('country_id')){
            //      $country_id = $this->input->post('country_id');
            //      print_r ($country_id);
            //     $countryData['state']=$this->dynamic_dependent_model->fetch_state($country_id);
            //     // print_r($countryData);
            //     $this->load->view('Users/dynamic',$countryData);
            // }
            // print_r($country_id);
            $country_id = $this->input->post('country_id');
            echo $country_id;
        }
        function selectCity(){

        }
        
    }
?>