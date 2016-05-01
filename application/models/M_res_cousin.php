<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_cousin extends CI_Model {


	var $table_name='tbl_res_cousins';

     public function getBy($data,$json=false)
    {
        $this->db->select('c.*,rc.res_id');
        $this->db->from('tbl_cousins as c');
        $this->db->join('(select * from tbl_res_cousins where tbl_res_cousins.res_id='.$data[1].' ) as rc','rc.cousin_id=c.cousin_id','left');
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

/* End of file M_cousin.php */
/* Location: ./application/models/M_cousin.php */