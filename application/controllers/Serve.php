<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Serve extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->model('M_serve','serve');
		$data['serves']=$this->serve->getAll();
		$this->load->_render_page('pages/serves/index',$data);
	}

	public function add()
	{

		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('serve_name', 'Serve Name', 'trim|required|max_length[65]|is_unique[tbl_serves.serves_name]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'serves_name'=>$this->input->post('serve_name'),
				'status'=>1
				);
			$this->db->insert('tbl_serves',$data);

			if ($this->input->is_ajax_request()) 
			{
				$last_id=$this->db->insert_id();
				$result=$this->db->where('serves_id',$last_id)
					          ->get('tbl_serves')
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
        $this->form_validation->set_rules('serve_name', 'Serve Name', 'trim|required|max_length[65]|is_unique[tbl_serves.serves_name]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'serves_name'=>$this->input->post('serve_name')
				);
			$this->db->where('serves_id',$id);
			$this->db->update('tbl_serves',$data);

			if ($this->input->is_ajax_request()) 
			{
				$last_id=$this->db->insert_id();
				$result=$this->db->where('serves_id',$last_id)
					          ->get('tbl_serves')
					          ->row();
				$master['data']=$result;

			}
			$this->session->set_flashdata('message', 'Updated Successfully !');
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

	public function update_res_serves($res_id,$serve_id,$status)
	{
		$this->load->model('m_res_serve','res_serve');
		$data=array();
		if ($this->res_serve->update_res_serves($res_id,$serve_id,$status)==true) 
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
		$this->db->where('serves_id',$id);
		$this->db->update('tbl_serves',array('status'=>0));
		$this->session->set_flashdata('message', 'Delete Successfully !');
		redirect('serve','refresh');
	}

}

/* End of file Serve.php */
/* Location: ./application/controllers/Serve.php */