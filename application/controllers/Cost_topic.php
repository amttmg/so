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

}

/* End of file Cost_topic.php */
/* Location: ./application/controllers/Cost_topic.php */