<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cuisine_by_food extends CI_Model {

	var $table='tbl_food';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
		return $this->db->from($this->table)
						->select('food_id as id,food,status')
				        ->order_by('food','asc')
				        ->where('status',1)
				        ->get()->result();
	}
	

}

/* End of file M_cuisine_by_food.php */
/* Location: ./application/models/M_cuisine_by_food.php */