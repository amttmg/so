<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Street extends CI_Controller {

	public function index()
	{
		$this->load->model('M_street','street');
		$this->load->model('M_area','area');
		$data['streets']=$this->street->getAll();
		$data['areas']=$this->area->getAll();
		$this->load->_render_page('pages/street/index',$data);
	}

	public function add()
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('street', 'Street Name', 'trim|required|max_length[65]|is_unique[tbl_street.name]');
        $this->form_validation->set_rules('area', 'Area Name', 'trim|required|max_length[60]|callback_validate_dropdown');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'name'=>$this->input->post('street'),
				'area_id'=>$this->input->post('area')
				);
			$this->db->insert('tbl_street',$data);
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

	public function validate_dropdown($value)
    {
        if ($value == '0') {
            $this->form_validation->set_message('validate_dropdown', 'The {field} field is required');
            return false;
        }
        return true;
    }

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_street',array('status'=>0));
		$this->session->set_flashdata('message', 'Delete Successfully !');
		redirect('street','refresh');
	}

}

/* End of file Street.php */
/* Location: ./application/controllers/Street.php */