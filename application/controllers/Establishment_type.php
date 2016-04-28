<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Establishment_type extends CI_Controller {

	public function add()
	{
		$data=array(
			'serves_name'=>$this->input->post('type')
			);
		$this->db->insert('establishment_type',$data);

		if ($this->input->is_ajax_request()) 
		{
			$last_id=$this->db->insert_id();
			$result=$this->db->where('type_id',$last_id)
				          ->get('establishment_type')
				          ->row();
			echo(json_encode($result));

		}
	}

}

/* End of file Establishment_type.php */
/* Location: ./application/controllers/Establishment_type.php */