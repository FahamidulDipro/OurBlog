<?php
    class dynamic_dependent_model extends CI_model{
        function fetch_country(){
            $query=$this->db->order_by('country_name','ASC')
                    ->get('country');
            return $query->result();        

        }
        function fetch_state($country_id){
         $query = $this->db->where('country_id',$country_id)
                            ->order_by('state_name','ASC')
                            ->get('state');
            return $query->result();      

        }
    }
?>