<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_area extends CI_Model {

	var $table='tbl_area';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
		return $this->db->from('tbl_area as a')
						->select('a.name as area,c.name as city,a.id as area_id,c.id as city_id')
					
						->join('tbl_city as c','c.id=a.city_id','inner')
				        ->order_by('c.name','asc')
				        ->where('a.status',1)
				        ->get()->result();
	}

	

}

/* End of file M_area.php */
/* Location: ./application/models/M_area.php */