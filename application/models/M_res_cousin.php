<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_cousin extends CI_Model {


	var $table_name='tbl_res_cousins';

     public function getBy($data,$json=false)
    {
        $this->db->select('c.*,rc.res_id');
        $this->db->from('tbl_cousins as c');
        $this->db->join('(select * from tbl_res_cousins where tbl_res_cousins.res_id='.$data[1].' ) as rc','rc.cousin_id=c.cousin_id','left');
        $this->db->where('c.status',1);
        $this->db->order_by('c.cousin');
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

    public function update_res_cousin($res_id,$cousin_id,$status)
    {
        if ($status) 
        {
            $insert_data=array(
                'res_id'=>$res_id,
                'cousin_id'=>$cousin_id,
                'status'=>1
                );
          $this->db->insert('tbl_res_cousins',$insert_data);
        }
        else
        {
            $this->db->where('cousin_id',$cousin_id);
            $this->db->where('res_id',$res_id);
           $this->db->delete('tbl_res_cousins');
        }
        return true;
        
    }

	

}

/* End of file M_cousin.php */
/* Location: ./application/models/M_cousin.php */