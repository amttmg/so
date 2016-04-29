<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pop_dish extends CI_Controller {

	public function add()
	{
		$data=array(
			'pop_dishes'=>$this->input->post('dish_name')
			);
		$this->db->insert('tbl_pop_dishes',$data);

		if ($this->input->is_ajax_request()) 
		{
			$last_id=$this->db->insert_id();
			$result=$this->db->where('pop_dishes_id',$last_id)
				          ->get('tbl_pop_dishes')
				          ->row();
			echo(json_encode($result));

		}
	}

}

/* End of file pop_dish.php */
/* Location: ./application/controllers/pop_dish.php */