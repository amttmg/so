<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

	public function update($res_id='')
	{
		$newtbl_restaurants=array();
		foreach ($_POST['offers'] as $key => $value) 
        {
            if ($value==='yes') 
            {
            	$newtbl_restaurants['offers']=$this->input->post('offerremarks');
            }
            else
            {
            	$newtbl_restaurants['offers']=NULL;
            }
        }
        $this->db->where('res_id',$res_id);
        $this->db->update('tbl_restaurants',$newtbl_restaurants);
        echo("success");
	}

}

/* End of file Offers.php */
/* Location: ./application/controllers/Offers.php */