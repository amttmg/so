<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cousin extends CI_Controller {

	public function by_country()
	{
		$this->load->model('M_cuisine_by_country','c_country');
		$data['c_by_countries']=$this->c_country->getAll();
		$this->load->_render_page('pages/cuisine/bycountry',$data);
	}

	public function by_food()
	{
		$this->load->model('M_cuisine_by_food','c_food');
		$data['c_by_foods']=$this->c_food->getAll();
		$this->load->_render_page('pages/cuisine/byfood',$data);
	}

	public function deletebycountry($id)
	{

		$this->db->where('cousin_id',$id);
		$this->db->update('tbl_cousins',array('status'=>0));
		$this->session->set_flashdata('message', 'Delete Successfully !');
		redirect('cuisine/bycountry','refresh');
	}

	public function deletebyfood($id)
	{

		$this->db->where('food_id',$id);
		$this->db->update('tbl_food',array('status'=>0));
		$this->session->set_flashdata('message', 'Delete Successfully !');
		redirect('cuisine/byfood','refresh');
	}

	public function add()
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('cousin_name', 'Cousin Name', 'trim|required|max_length[65]|is_unique[tbl_cousins.cousin]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			$data=array(
			'cousin'=>$this->input->post('cousin_name')
			);
			$this->db->insert('tbl_cousins',$data);

			if ($this->input->is_ajax_request()) 
			{
				$last_id=$this->db->insert_id();
				$result=$this->db->where('cousin_id',$last_id)
					          ->get('tbl_cousins')
					          ->row();
				$master['data']=$result;
				
			}
			
			$master['status']  = True;
			$master['message'] ="successfully saved data";
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

	public function add_cousinebyfood()
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('cousin_name', 'Cuisine by food', 'trim|required|max_length[65]|is_unique[tbl_food.food]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			$data=array(
			'food'=>$this->input->post('cousin_name')
			);
			$this->db->insert('tbl_food',$data);
			if ($this->input->is_ajax_request()) 
			{
				$last_id=$this->db->insert_id();
				$result=$this->db->where('food_id',$last_id)
					          ->get('tbl_food')
					          ->row();
				$master['data']=$result;
				
			}
			$this->session->set_flashdata('message', 'Cuisine by food saved successfully !');
			$master['status']  = True;
			$master['message'] ="successfully saved data";
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

	public function update_res_cousin($res_id,$cousin_id,$status)
	{
		$this->load->model('m_res_cousin','res_cousin');
		$data=array();
		if ($this->res_cousin->update_res_cousin($res_id,$cousin_id,$status)==true) 
		{
			$data['status']=true;
		}
		else
		{
			$data['status']=false;
		}
		echo(json_encode($data));

	}

	public function update_res_cousinbyfood($res_id,$cousin_id,$status)
	{
		$this->load->model('m_res_cousinsbyfood','res_cousinbyfood');
		$data=array();
		if ($this->res_cousinbyfood->update_res_cousinbyfood($res_id,$cousin_id,$status)==true) 
		{
			$data['status']=true;
		}
		else
		{
			$data['status']=false;
		}
		echo(json_encode($data));

	}

}

/* End of file cousin.php */
/* Location: ./application/controllers/cousin.php */