<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_res_serve extends CI_Model {

	var $table_name='tbl_serves';

     public function getBy($data,$order_by='',$json=false)
    {
    	

		$this->db->select('rs.res_id,s.*');
        $this->db->from('tbl_serves as s');
        $this->db->join('(select * from tbl_res_serves where tbl_res_serves.res_id='.$data[1].' ) as rs','rs.serves_id=s.serves_id','left');
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

    public function update_res_serves($res_id,$serve_id,$status)
    {
        if ($status) 
        {
            $insert_data=array(
                'res_id'=>$res_id,
                'serves_id'=>$serve_id,
                'status'=>1
                );
          $this->db->insert('tbl_res_serves',$insert_data);
        }
        else
        {
            $this->db->where('serves_id',$serve_id);
            $this->db->where('res_id',$res_id);
           $this->db->delete('tbl_res_serves');
        }
        return true;
        
    }

	

}

/* End of file M_Serve.php */
/* Location: ./application/models/M_Serve.php */