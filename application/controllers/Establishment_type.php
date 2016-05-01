<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Establishment_type extends CI_Controller {

	public function add()
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
		
        $this->form_validation->set_rules('estd_type', 'Establishment Type', 'trim|required|max_length[65]|is_unique[establishment_type.type]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			$data=array(
			'type'=>$this->input->post('estd_type')
			);
			$this->db->insert('establishment_type',$data);

			if ($this->input->is_ajax_request()) 
			{
				$last_id=$this->db->insert_id();
				$result=$this->db->where('type_id',$last_id)
					          ->get('establishment_type')
					          ->row();

				$master['data']=$result;
			}
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

/* End of file Establishment_type.php */
/* Location: ./application/controllers/Establishment_type.php */