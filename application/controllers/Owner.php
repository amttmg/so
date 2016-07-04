<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_owner','owner');
	}

	public function add()
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('owners_name', 'Owner Name', 'trim|required|max_length[65]');
        $this->form_validation->set_rules('owners_designation', 'Owner Designition', 'trim|required|max_length[65]');
        $this->form_validation->set_rules('owners_mobile1', 'Mobile', 'trim|max_length[12]');
        $this->form_validation->set_rules('owners_mobile2', 'Mobile', 'trim|max_length[12]');
         $this->form_validation->set_rules('owners_landline1', 'Landline 1', 'trim|max_length[12]');
        $this->form_validation->set_rules('owners_landline2', 'Landline 2', 'trim|max_length[12]');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'name'=>$this->input->post('owners_name'),
				'designation'=>$this->input->post('owners_designation'),
				'mobile1'=>$this->input->post('owners_mobile1'),
				'mobile2'=>$this->input->post('owners_mobile2'),
				'landline1'=>$this->input->post('owners_landline1'),
				'landline2'=>$this->input->post('owners_landline2'),
				'res_id'=>$this->input->post('restaurant_id')
				);
			$this->db->insert('tbl_owners',$data);

			$master['status']  = True;
			$master['message'] ="successfully added data";
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

	public function update($id)
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('owners_name', 'Owner Name', 'trim|required|max_length[65]');
        $this->form_validation->set_rules('owners_mobile1', 'Mobile', 'trim|max_length[12]');
        $this->form_validation->set_rules('owners_mobile2', 'Mobile', 'trim|max_length[12]');
        $this->form_validation->set_rules('owners_landline1', 'fieldlabel', 'trim|max_length[12]');
        $this->form_validation->set_rules('owners_landline2', 'fieldlabel', 'trim|max_length[12]');
		if ($this->form_validation->run() == True) 
		{
			
			$data=array(
				'name'=>$this->input->post('owners_name'),
				'designation'=>$this->input->post('owners_designation'),
				'mobile1'=>$this->input->post('owners_mobile1'),
				'mobile2'=>$this->input->post('owners_mobile2'),
				'landline1'=>$this->input->post('owners_landline1'),
				'landline2'=>$this->input->post('owners_landline2')
				);
			$this->db->where('owner_id',$this->input->post('partner_id'));
			$this->db->where('res_id',$id);
			$this->db->update('tbl_owners',$data);

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

	public function delete($res_id,$owner_id)
	{
		$this->db->where('owner_id',$owner_id);
		$this->db->update('tbl_owners',array('is_deleted'=>1));

		$this->session->set_flashdata('flashSuccess', 'Deleted Successfully !');
		redirect('restaurants/details/'.$res_id,'refresh');
	}
	

}

/* End of file Owner.php */
/* Location: ./application/controllers/Owner.php */