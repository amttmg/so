<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parking extends CI_Controller {

	public function update($res_id)
	{
		$update_data=array(
			'parking'=>(int) $this->input->post('res_parking')
			);
		if (isset($_POST['wheel'])) 
		{
			$update_data['parking_two']=NULL;
			$update_data['parking_four']=NULL;
			foreach ($_POST['wheel'] as $value) 
			{
				if ($value=='2') 
				{
					$update_data['parking_two']=1;
				}
				
				if ($value=='4') 
				{
					$update_data['parking_four']=1;
				}
				
			}
		}
		else
		{
			$update_data['parking_two']=NULL;
			$update_data['parking_four']=NULL;
		}
		
		$this->db->where('res_id',$res_id);
		$this->db->update('tbl_restaurants',$update_data);
		echo("success");
	}

}

/* End of file Parking.php */
/* Location: ./application/controllers/Parking.php */