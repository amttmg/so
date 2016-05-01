<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_estd_type extends CI_Model {

	var $table_name='tbl_res_estd_type';

	public function getAll($order_by='',$json=false)
    {
        if ($order_by=='') 
        {
            $this->db->order_by('estd_type_id','desc');
        }
        else
        {
            $this->db->order_by($order_by[0],$order_by[1]);
        }

        $this->db->from($this->table_name);
        $result_data= $this->db->get()->result();

        if ($json==true)
        {
           return json_encode($result_data);
        }
        else
        {
            return $result_data;
        }
    }

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