<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Happy_hour extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index( $offset = 0 )
	{

	}

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $res_id = NULL )
	{
		
		$this->load->model('M_happy_hour','hr');
		$this->hr->update($res_id);
		$this->session->set_flashdata('flashSuccess', 'Update Successfully !');
		redirect('restaurants/details/'.$res_id,'refresh');
	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file happy_hour.php */
/* Location: ./application/controllers/happy_hour.php */
