<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_street extends CI_Model {

	var $table='tbl_street';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
		return $this->db->select('s.*,a.name as area')
		                ->from('tbl_street as s')
						->join('tbl_area as a','a.id=s.area_id')
				        ->order_by('a.name','asc')
				        ->where('s.status',1)
				        ->get()->result();
	}



	

}

/* End of file M_street.php */
/* Location: ./application/models/M_street.php */