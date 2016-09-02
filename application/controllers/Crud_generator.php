<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_generator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('generate');
		$this->load->helper('file');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$data['tables']=$this->db->list_tables();
		$this->load->view('generator/index',$data);
	}

	// Add a new item
	public function generate($table)
	{
		if ($this->generate->model($table) && $this->generate->controller($table) && $this->generate->view($table)) 
		{
			$this->session->set_flashdata('success', 'Successfully generated model view controller of table '.$table);
		}
		else
		{
			$this->session->set_flashdata('error', 'could not generate model view controller');
		}
		redirect('Crud_generator','refresh');

	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Crud_generator.php */
/* Location: ./application/controllers/Crud_generator.php */
