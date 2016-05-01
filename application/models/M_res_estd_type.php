<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_estd_type extends CI_Model {

	var $table_name='tbl_res_estd_type';
    
     public function getBy($data,$json=false)
    {
        $this->db->from($this->table_name);
        $this->db->join('establishment_type','establishment_type.type_id=tbl_res_estd_type.type_id');
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

/* End of file M_estd_type.php */
/* Location: ./application/models/M_estd_type.php */