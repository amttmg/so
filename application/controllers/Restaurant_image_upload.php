<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant_image_upload extends CI_Controller {

	public function index($id='')
	{
		if (!$id) 
		{
			show_404();
		}
		$data['title']='Upload Photo';
		$data['res_name']=$this->db->get_where('tbl_restaurants',array('res_id'=>$id))->row()->res_name;
		$this->load->_render_page('pages/uploads/restaurant_image',$data);
	}
	public function upload_files($id='')
	{
		if ($this->input->method()!='post') 
		{
			show_404();
		}
		$config['upload_path']   = './uploads/restaurants/';
		$config['allowed_types'] = '*';
		$config['file_name']=$this->uri->segment(3).uniqid();
		$this->load->library('upload',$config);

		if($this->upload->do_upload('userfile'))
		{
			$token=$this->input->post('token');
			
			$data=array(
				'restaurant_id'=>$id,
				'image_name'=>$this->upload->data('file_name'),
				'token'=>$token
				);
			$this->resize_image($this->upload->data('file_name'));
			$this->db->insert('restaurants_image',$data);
			
		}
	}

	public function delete($image_id='',$res_id)
	{
		
		if ($image_id) 
		{
			$query=$this->db->get_where('restaurants_image',array('id'=>$image_id));

			if($query->num_rows()>0)
			{

				$data=$query->row();
				$file_name=$data->image_name;


				if(file_exists($file=FCPATH.'/uploads/restaurants/'.$file_name))
				{
					unlink($file);
				}

				if(file_exists($file=FCPATH.'/uploads/restaurants/thumbnail/sm_'.$file_name))
				{
					unlink($file);
				}
			}
			$this->session->set_flashdata('success', 'Image Deleted Successfully !');
			$this->db->delete('restaurants_image',array('id'=>$image_id));
			redirect('restaurant_image_upload/index/'.$res_id,'refresh');
		}
		else
		{
			$token=$this->input->post('token');		
			$query=$this->db->get_where('restaurants_image',array('token'=>$token));

			if($query->num_rows()>0)
			{

				$data=$query->row();
				$file_name=$data->image_name;


				if(file_exists($file=FCPATH.'/uploads/restaurants/'.$file_name))
				{
					unlink($file);
				}

				if(file_exists($file=FCPATH.'/uploads/restaurants/thumbnail/sm_'.$file_name))
				{
					unlink($file);
				}

			}
			$this->db->delete('restaurants_image',array('token'=>$token));
			echo json_encode(array('deleted'=>true));
		}
		
	}

	public function resize_image($image_name='')
	{
		if (!is_dir(base_url('uploads/restaurants/thumbnail'))) 
		{
		    mkdir(base_url('uploads/restaurants/thumbnail'));
		}
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/restaurants/'.$image_name;
		$config['new_image']='./uploads/restaurants/thumbnail/sm_'.$image_name;
		$config['create_thumb'] = false;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 75;
		$config['height']       = 50;

		$this->load->library('image_lib', $config);
		if ( ! $this->image_lib->resize())
		{
		        echo $this->image_lib->display_errors();
		}
	}

	public function load_image($id)
	{
		$data['images']=$this->db->order_by('id','desc')->get_where('restaurants_image',array('restaurant_id'=>$id))
		                         ->result();
		$this->load->view('pages/uploads/_images',$data);
	}
}

/* End of file restaurant_image_upload.php */
/* Location: ./application/controllers/restaurant_image_upload.php */