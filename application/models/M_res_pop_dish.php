<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_pop_dish extends CI_Model {


	var $table_name='tbl_res_pop_dishes';

     public function getBy($data,$json=false)
    {
        $this->db->from($this->table_name);
        $this->db->join('tbl_pop_dishes','tbl_pop_dishes.pop_dishes_id=tbl_res_pop_dishes.pop_dishes_id');
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

/* End of file Res_pop_dish.php */
/* Location: ./application/models/Res_pop_dish.php */