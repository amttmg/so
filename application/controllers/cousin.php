<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cousin extends CI_Controller {

	public function add()
	{
		$data=array(
			'cousin'=>$this->input->post('cousin_name')
			);
		$this->db->insert('tbl_cousins',$data);

		if ($this->input->is_ajax_request()) 
		{
			$last_id=$this->db->insert_id();
			$result=$this->db->where('cousin_id',$last_id)
				          ->get('tbl_cousins')
				          ->row();
			echo(json_encode($result));

		}
	}

}

/* End of file cousin.php */
/* Location: ./application/controllers/cousin.php */