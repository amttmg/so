<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurants extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('restaurant','res');
		$this->load->model('m_pop_dishes','pop_dish');
		$this->load->model('m_res_pop_dish','res_pop_dish');
		$this->load->model('m_res_estd_type','res_estd_type');
	}

	public function index()
	{
		$data['restaurants']=$this->res->getAll(array('res_name','asc'));
		$data['content'] = $this->load->view('pages/restaurant/index',$data, true);
        $this->load->view('page_template', $data);
	}

	public function details($restaurant_id)
	{
		$data['restaurants']=$this->res->getBy(array('res_id',$restaurant_id));
		$data['pop_dishes']=$this->res_pop_dish->getBy(array('res_id',$restaurant_id));
		$data['est_type']=$this->res_estd_type->getBy(array('res_id',$restaurant_id));
		print_r($data);
		$data['content'] = $this->load->view('pages/restaurant/details',$data, true);
        $this->load->view('page_template', $data);
	}

}

/* End of file restaurant.php */
/* Location: ./application/controllers/restaurant.php */