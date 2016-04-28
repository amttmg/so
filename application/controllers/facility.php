<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facility extends CI_Controller {

	public function add()
	{
		$data=array(
			'serves_name'=>$this->input->post('facility')
			);
		$this->db->insert('tbl_facilities',$data);

		if ($this->input->is_ajax_request()) 
		{
			$last_id=$this->db->insert_id();
			$result=$this->db->where('facilities_id',$last_id)
				          ->get('tbl_facilities')
				          ->row();
			echo(json_encode($result));

		}
	}

}

/* End of file facility.php */
/* Location: ./application/controllers/facility.php */