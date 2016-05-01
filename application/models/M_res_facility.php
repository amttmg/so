<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_facility extends CI_Model {


	var $table_name='tbl_res_facility';


     public function getBy($data,$order_by='',$json=false)
    {
        $this->db->select('f.*,rf.res_id');
        $this->db->from('tbl_facilities as f');
        $this->db->join('(select * from tbl_res_facility where tbl_res_facility.res_id='.$data[1].' ) as rf','rf.facility_id=f.facilities_id','left');
        if ($order_by) 
        {
        	 $this->db->order_by($order_by[0],$order_by[1]);
        }
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

     public function update_res_facility($res_id,$facility_id,$status)
    {
        if ($status) 
        {
            $insert_data=array(
                'res_id'=>$res_id,
                'facility_id'=>$facility_id,
                'status'=>1
                );
          $this->db->insert('tbl_res_facility',$insert_data);
        }
        else
        {
            $this->db->where('facility_id',$facility_id);
            $this->db->where('res_id',$res_id);
           $this->db->delete('tbl_res_facility');
        }
        return true;
        
    }



	

}

/* End of file M_res_facility.php */
/* Location: ./application/models/M_res_facility.php */