<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_facility extends CI_Model {

	var $table='tbl_facilities';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
		return $this->db->from($this->table)
				        ->order_by('facility','asc')
				        ->where('status',1)
				        ->get()->result();
	}
	

}

/* End of file M_facility.php */
/* Location: ./application/models/M_facility.php */