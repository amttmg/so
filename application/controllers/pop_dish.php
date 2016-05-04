<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pop_dish extends CI_Controller {

	public function add()
	{
		$this->load->library('form_validation');
		$master['status'] = True;
		$data             = array();
		$master           = array();
        $this->form_validation->set_rules('dish_name', 'Dish Name', 'trim|required|max_length[65]|is_unique[tbl_pop_dishes.pop_dishes]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</>');
		
		if ($this->form_validation->run() == True) 
		{
			$data=array(
			'pop_dishes'=>$this->input->post('dish_name')
			);
			$this->db->insert('tbl_pop_dishes',$data);

			if ($this->input->is_ajax_request()) 
			{
				$last_id=$this->db->insert_id();
				$result=$this->db->where('pop_dishes_id',$last_id)
					          ->get('tbl_pop_dishes')
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

	public function update_res_popdish($res_id,$dish_id,$status)
	{
		$this->load->model('m_res_pop_dish','res_popdish');
		$data=array();
		if ($this->res_popdish->update_res_popdish($res_id,$dish_id,$status)==true) 
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

/* End of file pop_dish.php */
/* Location: ./application/controllers/pop_dish.php */