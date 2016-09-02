<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function image_upload($res_id)
	{
		if (!$res_id) 
		{
			show_404();
		}
		$data['title']='Upload Photo';
		$data['res_name']=$this->db->get_where('tbl_restaurants',array('res_id'=>$res_id))->row()->res_name;
		$this->load->_render_page('pages/uploads/menu_image',$data);
	}

	public function upload_files($id='')
	{
		if ($this->input->method()!='post') 
		{
			show_404();
		}
		$config['upload_path']   = './uploads/menu/';
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
			$this->db->insert('menu_image',$data);
			
		}
	}

	public function delete($image_id='',$res_id)
	{
		
		if ($image_id) 
		{
			$query=$this->db->get_where('menu_image',array('id'=>$image_id));

			if($query->num_rows()>0)
			{

				$data=$query->row();
				$file_name=$data->image_name;


				if(file_exists($file=FCPATH.'/uploads/menu/'.$file_name))
				{
					unlink($file);
				}

				if(file_exists($file=FCPATH.'/uploads/menu/thumbnail/sm_'.$file_name))
				{
					unlink($file);
				}
			}
			$this->session->set_flashdata('success', 'Image Deleted Successfully !');
			$this->db->delete('menu_image',array('id'=>$image_id));
			redirect('menu/image_upload/'.$res_id,'refresh');
		}
		else
		{
			$token=$this->input->post('token');		
			$query=$this->db->get_where('menu_image',array('token'=>$token));

			if($query->num_rows()>0)
			{

				$data=$query->row();
				$file_name=$data->image_name;


				if(file_exists($file=FCPATH.'/uploads/menu/'.$file_name))
				{
					unlink($file);
				}

				if(file_exists($file=FCPATH.'/uploads/menu/thumbnail/sm_'.$file_name))
				{
					unlink($file);
				}

			}
			$this->db->delete('menu_image',array('token'=>$token));
			echo json_encode(array('deleted'=>true));
		}
		
	}

	public function resize_image($image_name='')
	{
		if (!is_dir(base_url('uploads/menu/thumbnail'))) 
		{
		    mkdir(base_url('uploads/menu/thumbnail'));
		}
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/menu/'.$image_name;
		$config['new_image']='./uploads/menu/thumbnail/sm_'.$image_name;
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
		$data['images']=$this->db->order_by('id','desc')->get_where('menu_image',array('restaurant_id'=>$id))
		                         ->result();
		$this->load->view('pages/uploads/_menu_image',$data);
	}

	public function map()
	{
		$config=array(
			'sensonr'=>true
			);
		// Load the library 
		$this->load->library('googlemaps');
		// Initialize our map. Here you can also pass in additional parameters for customising the map (see below) 
		$this->googlemaps->initialize($config);
		// Create the map. This will return the Javascript to be included in our pages <head></head> section and the HTML code to be // placed where we want the map to appear. 
		// Set the marker parameters as an empty array. Especially important if we are using multiple markers 
		$marker = array();
// Specify an address or lat/long for where the marker should appear. 
		$marker[' position '] = 'Crescent Park, Palo Alto'; 
// Once all the marker parameters have been specified lets add the marker to our map 
		//$this->googlemaps->add_marker($marker);

		$data['map'] = $this->googlemaps->create_map();
		// Load our view, passing the map data that has just been created 
		$this->load->view('my_view', $data);

	}

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */