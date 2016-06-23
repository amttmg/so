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
		$this->load->model('m_select_list', 'select');
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
		$dt['cityDropdown'] = $this->select->getSelectList('tbl_city', '', 'id', 'name', 'id="est_city" name="est_city" class="form-control"');
		$dt['areaDropdown'] = $this->select->getSelectList('tbl_area', '', 'id', 'name', 'id="est_area" name="est_area" class="form-control"');
		$dt['streetDropdown'] = $this->select->getSelectList('tbl_street', '', 'id', 'name', 'id="est_street" name="est_street" class="form-control"');

		//$data['content'] = $this->load->view('pages/DataEntry', $dt, true);
        $this->load->_render_page('pages/DataEntry', $dt);
    
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */