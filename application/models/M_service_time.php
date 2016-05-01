<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_service_time extends CI_Model {

	var $table_name='tbl_service_time';
    
     public function getBy($data,$json=false)
    {
        $this->db->from($this->table_name);
        $this->db->where($data[0],$data[1]);
        $result_data=$this->db->get()->result();
        
        if ($json==false) 
        {
            return $result_data;
        }
        else
        {
            return json_encode($result_data);
        }

       
    }

	

}

/* End of file M_service_time.php */
/* Location: ./application/models/M_service_time.php */