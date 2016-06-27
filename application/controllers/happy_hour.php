<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Happy_hour extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index( $offset = 0 )
	{

	}

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $res_id = NULL )
	{
		$this->db->trans_start();
		$this->db->where('res_id',$res_id);
		$this->db->delete('tbl_happy_hours');

		$happyhours = $this->input->post('happyhours');
        if (is_array($happyhours)) {
            foreach ($happyhours as $day => $hours) {
                $newtbl_happy_hours = array(
                    'res_id' => $res_id,
                    'day' => $day,
                    'start_time' => $hours['start'],
                    'end_time' => $hours['end'],
                    'status' => 1,
                );
                $this->db->insert('tbl_happy_hours', $newtbl_happy_hours);
            }
        }

        $happyhours = $this->input->post('happyhours1');
        if (is_array($happyhours)) {
            foreach ($happyhours as $day => $hours) {
                $newtbl_happy_hours = array(
                    'res_id' => $res_id,
                    'day' => $day,
                    'start_time' => $hours['start'],
                    'end_time' => $hours['end'],
                    'position' => 2,
                    'status' => 1,
                );
                $this->db->insert('tbl_happy_hours', $newtbl_happy_hours);
            }
        }

        $this->db->trans_complete();

		$this->session->set_flashdata('message', 'Update Successfully');
		redirect('restaurants/details/'.$res_id,'refresh');
	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file happy_hour.php */
/* Location: ./application/controllers/happy_hour.php */
