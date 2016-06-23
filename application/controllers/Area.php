<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	public function index()
	{
		$this->load->model('M_area','area');
		$this->load->model('M_city','city');
		$data['area']=$this->area->getAll();
		$data['cities']=$this->city->getAll();
		$this->load->_render_page('pages/area/index',$data);
	}

	public function add()
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('city', 'City Name', 'trim|required|max_length[65]|callback_validate_dropdown');
        $this->form_validation->set_rules('area', 'Area Name', 'trim|required|max_length[300]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'name'=>$this->input->post('area'),
				'city_id'=>$this->input->post('city'),
				);
			$this->db->insert('tbl_area',$data);

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

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_area',array('status'=>0));
		$this->session->set_flashdata('message', 'Delete Successfully !');
		redirect('area','refresh');
	}

	public function validate_dropdown($value)
    {
        if ($value == '0') {
            $this->form_validation->set_message('validate_dropdown', 'Please select at least one {field}');
            return false;
        }
        return true;
    }

}

/* End of file Area.php */
/* Location: ./application/controllers/Area.php */