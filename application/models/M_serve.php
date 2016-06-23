<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_serve extends CI_Model {

	var $table='tbl_serves';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
		return $this->db->from($this->table)
				        ->order_by('serves_name','asc')
				        ->where('status',1)
				        ->get()->result();
	}

	

}

/* End of file M_serve.php */
/* Location: ./application/models/M_serve.php */