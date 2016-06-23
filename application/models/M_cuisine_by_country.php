<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cuisine_by_country extends CI_Model {

	var $table='tbl_cousins';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
		return $this->db->from($this->table)
						->select('cousin_id as id,cousin as cuisine,status')
				        ->order_by('cousin','asc')
				        ->where('status',1)
				        ->get()->result();
	}
	

}

/* End of file M_cuisine_by_country.php */
/* Location: ./application/models/M_cuisine_by_country.php */