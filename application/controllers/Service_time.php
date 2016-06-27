<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_time extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		

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
	public function update( $id = NULL )
	{
		$this->load->model('M_service_time','s_time');
		$this->s_time->update($id);
		$this->session->set_flashdata('flashSuccess', 'Update Successfully !');
		redirect('restaurants/details/'.$id,'refresh');
	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Service_time.php */
/* Location: ./application/controllers/Service_time.php */
