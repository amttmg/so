<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cost_topic extends CI_Controller {

	public function add()
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('cost_topic', 'Cost Topic', 'trim|required|max_length[65]|is_unique[estimate_cost_topic.topic]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'topic'=>$this->input->post('cost_topic')
				);
			$this->db->insert('estimate_cost_topic',$data);
			$master['data']=$this->db->where('topic_id',$this->db->insert_id())->get('estimate_cost_topic')->result();
			$master['status']  = True;
			$master['message'] ="successfully saved data";
		} 
		else 
		{
			$master['status'] = false;
            foreach ($_POST as $key => $value) 
            {
				if (form_error($key) != '') 
                {
					$data['error_string'] = $key;
					$data['input_error']  = form_error($key);
					array_push($master, $data);
                }
            }
		}

		echo(json_encode($master));
	}

	public function update($res_id='')
	{
		$this->db->where('res_id',$res_id);
		$this->db->delete('tbl_res_estimate_cost');
		$estimate_cost_topic = $this->input->post('estimate_cost_topic');
        if (is_array($estimate_cost_topic)) {
            foreach ($estimate_cost_topic as $topic_id => $val) {
                $newtbl_res_estimate_cost = array(
                	'topic_id'=>$topic_id,
                	'res_id'=>$res_id,
                    'cost' => $val,
                    'status' => 1,
                );
                $this->db->insert('tbl_res_estimate_cost', $newtbl_res_estimate_cost);
            }
        }

        $this->session->set_flashdata('flashSuccess', 'Update Successfully !');
		redirect('restaurants/details/'.$res_id,'refresh');
	}

}

/* End of file Cost_topic.php */
/* Location: ./application/controllers/Cost_topic.php */