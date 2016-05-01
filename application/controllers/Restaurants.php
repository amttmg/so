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
		$this->load->model('m_res_serve','res_serve');
		$this->load->model('m_res_cousin','res_cousin');
		$this->load->model('M_res_cousinsbyfood','res_food');
		$this->load->model('M_service_time','service_time');
		$this->load->model('M_happy_hour','happy_hour');
		$this->load->model('M_res_estimate_cost','res_estimate_cost');
		$this->load->model('m_owner','owner');
		$this->load->model('m_res_facility','res_facility');
	}

	public function index()
	{
		$data['restaurants']=$this->res->getAll(array('res_name','asc'));
		$data['content'] = $this->load->view('pages/restaurant/index',$data, true);
        $this->load->view('page_template', $data);
	}

	public function details($restaurant_id='')
	{
		if (!$restaurant_id) 
		{
			show_404();
		}
		$data['restaurants']=$this->res->getBy(array('res_id',$restaurant_id));
		$data['pop_dishes']=$this->res_pop_dish->getBy(array('res_id',$restaurant_id));
		$data['est_type']=$this->res_estd_type->getBy(array('res_id',$restaurant_id));
		$data['serves']=$this->res_serve->getBy(array('res_id',$restaurant_id));
		$data['cousins']=$this->res_cousin->getBy(array('res_id',$restaurant_id));
		$data['foods']=$this->res_food->getBy(array('res_id',$restaurant_id));
		$data['service_time']=$this->service_time->getBy(array('res_id',$restaurant_id));
		$data['happy_hours']=$this->happy_hour->getBy(array('res_id',$restaurant_id));
		$data['res_costs']=$this->res_estimate_cost->getBy(array('res_id',$restaurant_id));
		$data['owners']=$this->owner->getBy(array('res_id',$restaurant_id));
		$data['facilities']=$this->res_facility->getBy(array('res_id',$restaurant_id));
		$data['content'] = $this->load->view('pages/restaurant/details',$data, true);
        $this->load->view('page_template', $data);
	}

}

/* End of file restaurant.php */
/* Location: ./application/controllers/restaurant.php */