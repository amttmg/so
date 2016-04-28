<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Serve extends CI_Controller {

	public function index()
	{
		
	}

	public function add()
	{
		$data=array(
			'serves_name'=>$this->input->post('serve_name')
			);
		$this->db->insert('tbl_serves',$data);

		if ($this->input->is_ajax_request()) 
		{
			$last_id=$this->db->insert_id();
			$result=$this->db->where('serves_id',$last_id)
				          ->get('tbl_serves')
				          ->row();
			echo(json_encode($result));

		}

	}

}

/* End of file Serve.php */
/* Location: ./application/controllers/Serve.php */