<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facility extends CI_Controller {

	public function index()
	{
		$this->load->model('M_facility','facility');
		$data['facilities']=$this->facility->getAll();
		$this->load->_render_page('pages/facility/index',$data);
	}

	public function add()
	{
		$this->load->library('form_validation');

		$master['status'] = True;
		$data             = array();
		$master           = array();
		
        $this->form_validation->set_rules('facility_name', 'Facility Name', 'trim|required|max_length[65]|is_unique[tbl_facilities.facility]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{

			$data=array(
			'facility'=>$this->input->post('facility_name')
			);
			$this->db->insert('tbl_facilities',$data);

			if ($this->input->is_ajax_request()) 
			{
				$last_id=$this->db->insert_id();
				$result=$this->db->where('facilities_id',$last_id)
					          ->get('tbl_facilities')
					          ->row();
				$master['data']=$result;

			}
			$this->session->set_flashdata('message', 'Saved Successfully !');
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

	public function update($id)
	{
		$this->load->library('form_validation');

		$master['status'] = True;
		$data             = array();
		$master           = array();

		$fn=$this->db->where('facilities_id',$id)->get('tbl_facilities')->row()->facility;
		$is_unique='';
		if (strtolower($this->input->post('facility_name'))!=strtolower($fn)) 
		{
			$is_unique='|is_unique[tbl_facilities.facility]';
		}
        $this->form_validation->set_rules('facility_name', 'Facility Name', 'trim|required|max_length[65]'.$is_unique);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{

			$data=array(
			'facility'=>$this->input->post('facility_name')
			);
			$this->db->where('facilities_id',$id);
			$this->db->update('tbl_facilities',$data);
			$this->session->set_flashdata('message', 'Update Successfully !');
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

	public function update_res_facility($res_id,$facility_id,$status)
	{
		$this->load->model('m_res_facility','res_facility');
		$data=array();
		if ($this->res_facility->update_res_facility($res_id,$facility_id,$status)==true) 
		{
			$data['status']=true;
		}
		else
		{
			$data['status']=false;
		}
		echo(json_encode($data));
	}

	public function delete($id)
	{
		$this->db->where('facilities_id',$id);
		$this->db->update('tbl_facilities',array('status'=>0));
		$this->session->set_flashdata('message', 'Updated Successfully !');
		redirect('facility','refresh');
	}

}

/* End of file facility.php */
/* Location: ./application/controllers/facility.php */