<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurants extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->so->user_logged_in()) 
		{
			redirect('login','refresh');
		}
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
		//$data['content'] = $this->load->view('pages/restaurant/index',$data, true);
        $this->load->_render_page('pages/restaurant/index', $data);
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
		$data['res_costs']=$this->res_estimate_cost->getBy($restaurant_id);
		$data['owners']=$this->owner->getAll(array('res_id',$restaurant_id));
		$data['facilities']=$this->res_facility->getBy(array('res_id',$restaurant_id));
		//$data['content'] = $this->load->view('pages/restaurant/details',$data, true);
        $this->load->_render_page('pages/restaurant/details', $data);
	}

	public function update_estd_contact($id)
	{

		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('res_mobile1', 'Mobile', 'trim|max_length[12]');
        $this->form_validation->set_rules('res_mobile2', 'Mobile', 'trim|max_length[12]');
        $this->form_validation->set_rules('res_landline1', 'fieldlabel', 'trim|max_length[12]');
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
			$this->session->set_flashdata('flashSuccess', 'Update Succcessfully !');
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
	 public function update_name($res_id)
	 {
	 	$this->db->where('res_id',$res_id);
	 	$this->db->update('tbl_restaurants',array('res_name'=>$this->input->post('name')));
	 	$this->session->set_flashdata('flashSuccess', 'Update Successfully !');
	 }
	public function update_coordinate($id)
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('res_lat', 'Latitude', 'trim|required|max_length[30]');
        $this->form_validation->set_rules('res_lon', 'Longitude', 'trim|required|max_length[30]');
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'lat'=>$this->input->post('res_lat'),
				'lon'=>$this->input->post('res_lon'),
				'google_map'=>$this->input->post('res_map')
				);
			$this->db->where('res_id',$id);
			$this->db->update('tbl_restaurants',$data);

			$master['status']  = True;
			$master['message'] ="successfully update data";
			$this->session->set_flashdata('flashSuccess', 'Update Succcessfully !');
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

	public function update_estd_location($id)
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('est_city', 'Establishment City', 'trim|required|max_length[30]');
        $this->form_validation->set_rules('est_area', 'Establishment Area', 'trim|required|max_length[30]');
        $this->form_validation->set_rules('est_street', 'Establishment Street', 'trim|max_length[30]');
        $this->form_validation->set_rules('est_landmark', 'Establishment Landmark', 'trim|max_length[30]');
        $this->form_validation->set_rules('est_other', 'Establishment Other', 'trim|max_length[30]');
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'city'=>$this->input->post('est_city'),
				'area'=>$this->input->post('est_area'),
				'street'=>$this->input->post('est_street'),
				'landmark'=>$this->input->post('est_landmark'),
				'other'=>$this->input->post('est_other')
				);
			$this->db->where('res_id',$id);
			$this->db->update('tbl_restaurants',$data);

			$master['status']  = True;
			$master['message'] ="successfully update data";
			$this->session->set_flashdata('flashSuccess', 'Update Succcessfully !');
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

	public function view_owners($id,$owner_id)
	{
		$this->load->model('M_owner','owner');
		echo $this->owner->owner_belogns_to_restaurants($id,$owner_id);
		//echo $this->owner->getBy(array('res_id',$id),true);
	}

	public function owner_entryform()
	{
		$this->load->view('pages/restaurant/_ownerEntryForm');
	}

	public function delete($res_id)
	{
		$this->res->delete($res_id);
		$this->session->set_flashdata('message', 'Restaurat deleted successfully ');
		redirect('restaurants','refresh');
	}

	public function update_parking($res_id,$status,$data)
	{
		if ($data==='res_parking2') 
		{
			$this->db->where('res_id',$res_id);
			$this->db->update('tbl_restaurants',array('parking_two'=>$status));
		}
		else
		{
			$this->db->where('res_id',$res_id);
			$this->db->update('tbl_restaurants',array('parking_four'=>$status));
		}
		echo("success");
	}

	public function datatables()
	{
		
		$list = $this->res->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $res) {
			$no++;
			$row = array();
			$row[]=$no;
			$row[]=$res->res_name;
			$row[] = $res->area;
			$row[] = $res->street;
			$row[] = $res->landmark;
			$row[]='<div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                        	<a href="'.site_url('restaurants/details/'.$res->res_id).'"><label class="text-success"><i class="glyphicon glyphicon-edit"></i>&nbsp&nbspEdit</label></a>
                                        </li>
                                        <li>
                                        	<a href="#" class="delete" data-resid="'.$res->res_id.'"><label class="text-warning"><i class="glyphicon glyphicon-trash"></i>&nbsp&nbspDelete</label></a>
                                        </li>
                                    </ul>
                                </div>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->res->count_all(),
						"recordsFiltered" => $this->res->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

}

/* End of file restaurant.php */
/* Location: ./application/controllers/restaurant.php */