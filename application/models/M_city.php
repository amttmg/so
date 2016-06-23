<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_city extends CI_Model {

	var $table='tbl_city';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
		return $this->db->from($this->table)
				        ->order_by('name','asc')
				        ->where('status',1)
				        ->get()->result();
	}

}

/* End of file M_cities.php */
/* Location: ./application/models/M_cities.php */