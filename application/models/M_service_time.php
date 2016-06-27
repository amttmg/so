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

    public function update($res_id)
    {
        $this->db->trans_start();

        $this->db->where('res_id',$res_id);
        $this->db->delete('tbl_service_time');

        $srv_time = $this->input->post('servtime');
        if (is_array($srv_time)) {
            foreach ($srv_time as $day => $serv) {
                $newtbl_service_time = array(
                    'res_id' => $res_id,
                    'day' => $day,
                    'opening_time' => $serv['open'],
                    'closing_time' => $serv['close'],
                    'status' => 1,
                );
                $this->db->insert('tbl_service_time', $newtbl_service_time);
            }
        }

        $srv_time = $this->input->post('servtime1');

        if (is_array($srv_time)) {
            foreach ($srv_time as $day => $serv) {
                $newtbl_service_time = array(
                    'res_id' => $res_id,
                    'day' => $day,
                    'opening_time' => $serv['open'],
                    'closing_time' => $serv['close'],
                    'position' => 2,
                    'status' => 1,
                );
                $this->db->insert('tbl_service_time', $newtbl_service_time);
            }
        }
        $this->db->trans_complete();
    }

	

}

/* End of file M_service_time.php */
/* Location: ./application/models/M_service_time.php */