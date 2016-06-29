<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_estimate_cost extends CI_Model {

	var $table_name='tbl_res_estimate_cost';
    
     public function getBy($data,$json=false)
    {
        $this->db->select('estimate_cost_topic.*,a.cost,a.res_id');
        $this->db->from('estimate_cost_topic');
        $this->db->join("(select *from tbl_res_estimate_cost where res_id='".$data."') as a",'a.topic_id=estimate_cost_topic.topic_id','left');
        $this->db->order_by('estimate_cost_topic.topic','asc');

        //$this->db->group_by('estimate_cost_topic.topic');
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

/* End of file M_res_estimate_cost.php */
/* Location: ./application/models/M_res_estimate_cost.php */