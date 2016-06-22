<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Establishment_type extends CI_Controller {

	public function index()
	{
		$this->load->model('M_establishment_type','estd');
		$data['estds']=$this->estd->getAll();
		$this->load->_render_page('pages/establishments/index',$data);
	}

	public function add()
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
		
        $this->form_validation->set_rules('estd_type', 'Establishment Type', 'trim|required|max_length[65]|is_unique[establishment_type.type]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			$data=array(
			'type'=>$this->input->post('estd_type')
			);
			$this->db->insert('establishment_type',$data);

			if ($this->input->is_ajax_request()) 
			{
				$last_id=$this->db->insert_id();
				$result=$this->db->where('type_id',$last_id)
					          ->get('establishment_type')
					          ->row();

				$master['data']=$result;
			}
			$this->session->set_flashdata('message','Saved successfully !');
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


	public function update_res_estdtype($res_id,$estd_id,$status)
	{
		$this->load->model('m_res_estd_type','est_type');
		$data=array();
		if ($this->est_type->update_res_estdtype($res_id,$estd_id,$status)==true) 
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
		$this->db->where('type_id',$id);
		$this->db->update('establishment_type',array('status'=>0));
		$this->session->set_flashdata('message', 'Updated Successfully !');
		redirect('establishment_type','refresh');
	}

}

/* End of file Establishment_type.php */
/* Location: ./application/controllers/Establishment_type.php */