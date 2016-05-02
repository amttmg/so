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

	public function update_estd_contact($id)
	{

		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('res_mobile1', 'Mobile', 'trim|required|max_length[12]');
        $this->form_validation->set_rules('res_mobile2', 'Mobile', 'trim|max_length[12]');
        $this->form_validation->set_rules('res_landline1', 'fieldlabel', 'trim|required|max_length[12]');
        $this->form_validation->set_rules('res_landline2', 'fieldlabel', 'trim|max_length[12]');
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'mobile1'=>$this->input->post('res_mobile1'),
				'mobile2'=>$this->input->post('res_mobile2'),
				'landline1'=>$this->input->post('res_landline1'),
				'landline2'=>$this->input->post('res_landline2'),
				'website'=>$this->input->post('res_website'),
				'email'=>$this->input->post('res_email')
				);
			$this->db->where('res_id',$id);
			$this->db->update('tbl_restaurants',$data);

			$master['status']  = True;
			$master['message'] ="successfully update data";
		} 
		else 
		{
			$master['status'] = false;
            foreach ($_POST as $key => $value) 
            {
				if (form_error($key) != '') 
                {
					$data['error_string'] = $key;
					$data['input_error']  = form_error($key);
					array_push($master, $data);
                }
            }
		}
		echo(json_encode($master));

	}

	public function view_estdcontact($id)
	{
		echo $this->res->getBy(array('res_id',$id),true);
	}

}

/* End of file restaurant.php */
/* Location: ./application/controllers/restaurant.php */