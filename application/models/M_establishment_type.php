<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_establishment_type extends CI_Model {

	var $table='establishment_type';

	public function getAll()
	{
		return $this->db->from($this->table)
						->where('status',1)
						->order_by('type','asc')
						->get()->result();
	}

}

/* End of file M_establishment_type.php */
/* Location: ./application/models/M_establishment_type.php */