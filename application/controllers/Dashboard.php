<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->so->user_logged_in()) 
		{
			redirect('login','refresh');
		}
		$this->load->model('master');
        $this->load->model('restaurant');
	}

	public function index()
	{
		$dt['serves'] = $this->master->getServes();
        $dt['estimate_cost_topic'] = $this->master->getEstimate_cost_topic();
        $dt['establishment_types'] = $this->master->getEstablishment_type();
        $dt['facilities'] = $this->master->getFacilities();
        $dt['cousins'] = $this->master->getCousins();
        $dt['foods'] = $this->master->getFood();
        $dt['pop_dishes'] = $this->master->getPop_dishes();
        //$data['content'] = $this->load->view('pages/DataEntry', $dt, true);
        $this->load->_render_page('pages/DataEntry', $dt);
    
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */