<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_owner extends CI_Model {

	var $table_name='tbl_owners';
    
     public function getAll($data,$json=false)
    {
        $this->db->from($this->table_name);
        $this->db->where($data[0],$data[1]);
        $this->db->where('is_deleted',0);
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

    public function owner_belogns_to_restaurants($res_id,$owner_id)
    {
         $this->db->from($this->table_name);
         $this->db->where('res_id',$res_id);
         $this->db->where('owner_id',$owner_id);
        $result_data=$this->db->get()->row();
        return json_encode($result_data);
    }

	

}

/* End of file M_owner.php */
/* Location: ./application/models/M_owner.php */