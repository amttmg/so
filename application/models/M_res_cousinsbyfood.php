<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_cousinsbyfood extends CI_Model {

	var $table_name='tbl_res_foods';
    
     public function getBy($data,$json=false)
    {
        $this->db->select('f.*,rf.res_id');
        $this->db->from('tbl_food as f');
        $this->db->join('(select * from tbl_res_foods where tbl_res_foods.res_id='.$data[1].' ) as rf','rf.food_id=f.food_id','left');
        
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

    public function update_res_cousinbyfood($res_id,$cousin_id,$status)
    {
        if ($status) 
        {
            $insert_data=array(
                'res_id'=>$res_id,
                'food_id'=>$cousin_id,
                'status'=>1
                );
          $this->db->insert('tbl_res_foods',$insert_data);
        }
        else
        {
            $this->db->where('res_food_id',$cousin_id);
            $this->db->where('res_id',$res_id);
           $this->db->delete('tbl_res_foods');
        }
        return true;
    }
	

}

/* End of file M_res_cousinsbyfood.php */
/* Location: ./application/models/M_res_cousinsbyfood.php */