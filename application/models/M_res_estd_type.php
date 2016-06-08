<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_estd_type extends CI_Model {

	var $table_name='tbl_res_estd_type';
    
     public function getBy($data,$json=false)
    {   
        $this->db->select('et.type_id,et.type,reset.res_id');
        $this->db->from('establishment_type as et');
        $this->db->join( '(select * from tbl_res_estd_type where tbl_res_estd_type.res_id='.$data[1].' ) as reset','reset.type_id=et.type_id','left');
        //$this->db->join('establishment_type','establishment_type.type_id=tbl_res_estd_type.type_id');
        //$this->db->where($data[0],$data[1]);
        $this->db->order_by('et.type','asc');
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

    public function update_res_estdtype($res_id,$estd_id,$status)
    {
        if ($status) 
        {
            $insert_data=array(
                'res_id'=>$res_id,
                'type_id'=>$estd_id,
                'status'=>1
                );
          $this->db->insert('tbl_res_estd_type',$insert_data);
        }
        else
        {
           $this->db->where('type_id',$estd_id);
           $this->db->where('res_id',$res_id);
           $this->db->delete('tbl_res_estd_type');
        }
        return true;
        
    }
	

}

/* End of file M_estd_type.php */
/* Location: ./application/models/M_estd_type.php */