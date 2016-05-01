<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Place extends CI_Controller {

	public function suggest()
	{
		if ($this->input->is_ajax_request()) 
		{
			$this->db->like('area');
			$data=$this->db->get('tbl_restaurants');
			$temp='';
			//print_r($data->result());
			if ($data->num_rows() > 0) 
			{
				foreach ($data->result() as $res) 
				{
					$temp.='<option value="'.$res->area.'"></option>';
				}
			}
			echo($temp);
			
		}
	}

}

/* End of file place.php */
/* Location: ./application/controllers/place.php */