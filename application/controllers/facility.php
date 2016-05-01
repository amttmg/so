<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facility extends CI_Controller {

	public function add()
	{
		$this->load->library('form_validation');

		$master['status'] = True;
		$data             = array();
		$master           = array();
		
        $this->form_validation->set_rules('facility_name', 'Facility Name', 'trim|required|max_length[65]|is_unique[tbl_facilities.facility]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{

			$data=array(
			'facility'=>$this->input->post('facility_name')
			);
			$this->db->insert('tbl_facilities',$data);

			if ($this->input->is_ajax_request()) 
			{
				$last_id=$this->db->insert_id();
				$result=$this->db->where('facilities_id',$last_id)
					          ->get('tbl_facilities')
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

/* End of file facility.php */
/* Location: ./application/controllers/facility.php */