<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_happy_hour extends CI_Model {

	var $table_name='tbl_happy_hours';
    
     public function getBy($data,$json=false)
    {
        $this->db->from($this->table_name);
        $this->db->where($data[0],$data[1]);
        $this->db->where('position', 1);
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

                $this->db->where('position', 3);
                $this->db->where($data[0], $data[1]);
                $this->db->where('day', $time->day);
                $third_result = $this->db->get($this->table_name)->row();
                $data1['third'] = $third_result;
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
        $this->db->delete('tbl_happy_hours');
        $happyhours = $this->input->post('happyhours');
        if (is_array($happyhours)) {
            foreach ($happyhours as $day => $hours) {
                $newtbl_happy_hours = array(
                    'res_id' => $res_id,
                    'day' => $day,
                    'start_time' => $hours['start'],
                    'end_time' => $hours['end'],
                    'status' => 1,
                );
                $this->db->insert('tbl_happy_hours', $newtbl_happy_hours);
            }
        }

        $happyhours = $this->input->post('happyhours1');
        if (is_array($happyhours)) {
            foreach ($happyhours as $day => $hours) {
                $newtbl_happy_hours = array(
                    'res_id' => $res_id,
                    'day' => $day,
                    'start_time' => $hours['start'],
                    'end_time' => $hours['end'],
                    'position' => 2,
                    'status' => 1,
                );
                $this->db->insert('tbl_happy_hours', $newtbl_happy_hours);
            }
        }

        $happyhours = $this->input->post('happyhours2');
        if (is_array($happyhours)) {
            foreach ($happyhours as $day => $hours) {
                $newtbl_happy_hours = array(
                    'res_id' => $res_id,
                    'day' => $day,
                    'start_time' => $hours['start'],
                    'end_time' => $hours['end'],
                    'position' => 3,
                    'status' => 1,
                );
                $this->db->insert('tbl_happy_hours', $newtbl_happy_hours);
            }
        }

        $this->db->trans_complete();
    }

    public function FunctionName($value='')
    {
       
    }
	

}

/* End of file M_happy_hour.php */
/* Location: ./application/models/M_happy_hour.php */