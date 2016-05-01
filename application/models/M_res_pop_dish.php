<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_pop_dish extends CI_Model {


	var $table_name='tbl_res_pop_dishes';

     public function getBy($data,$json=false)
    {
        $this->db->select('pd.*,rpd.res_id');
        $this->db->from('tbl_pop_dishes as pd');
        $this->db->join('(select * from tbl_res_pop_dishes where tbl_res_pop_dishes.res_id='.$data[1].' ) as rpd','rpd.pop_dishes_id=pd.pop_dishes_id','left');
        
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