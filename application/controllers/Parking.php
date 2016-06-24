<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parking extends CI_Controller {

	public function update($res_id)
	{
		
		$this->db->where('res_id',$res_id);
		$this->db->update('tbl_restaurants',array('parking'=>(int) $this->input->post('res_parking')));
		echo("success");
	}

}

/* End of file Parking.php */
/* Location: ./application/controllers/Parking.php */