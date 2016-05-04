<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_service_time extends CI_Model {

	var $table_name='tbl_service_time';
    
     public function getBy($data,$json=false)
    {
        $this->db->from($this->table_name);
        $this->db->where($data[0],$data[1]);
        $this->db->where('position',1);
        $result_data=$this->db->get()->result();
        if ($json==false) 
        {
            $master=array();
            foreach ($result_data as $time) 
            {
                $data1=array();

                $data1['first']=$time;
                $this->db->where('position',2);
                $this->db->where($data[0],$data[1]);
                $this->db->where('day',$time->day);
                $second_result=$this->db->get($this->table_name)->row();
                $data1['second']=$second_result;
                array_push($master, $data1);
            }

            return $master;
        }
        else
        {
            return json_encode($result_data);
        }

       
    }

	

}

/* End of file M_service_time.php */
/* Location: ./application/models/M_service_time.php */