<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

	public function index()
	{
		$this->load->model('M_city','city');
		$data['cities']=$this->city->getAll();
		$this->load->_render_page('pages/city/index',$data);
	}

	public function add()
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('city', 'City Name', 'trim|required|max_length[65]|is_unique[tbl_city.name]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'name'=>$this->input->post('city'),
				'status'=>1
				);
			$this->db->insert('tbl_city',$data);
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

		$city=$this->db->where('id',$id)->get('tbl_city')->row()->name;
		$is_unique='';
		if (strtolower($this->input->post('city'))!=strtolower($city)) 
		{
			$is_unique='|is_unique[tbl_city.name]';
		}
        $this->form_validation->set_rules('city', 'City Name', 'trim|required|max_length[65]'.$is_unique);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'name'=>$this->input->post('city'),
				'status'=>1
				);
			$this->db->where('id',$id);
			$this->db->update('tbl_city',$data);
			$this->session->set_flashdata('message', 'Update Successfully !');
			$master['status']  = True;
			$master['message'] ="successfully Updated data";
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
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_city',array('status'=>0));
		$this->session->set_flashdata('message', 'Delete Successfully !');
		redirect('city','refresh');
	}

}

/* End of file City.php */
/* Location: ./application/controllers/City.php */