<?php

/**
 * Created by PhpStorm.
 * User: amttm
 * Date: 4/21/2016
 * Time: 3:12 PM
 */
class dataentry extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('master');
    }

    public function index()
    {
        $dt['serves'] = $this->master->getServes();
        $dt['estimate_cost_topic']=$this->master->getEstimate_cost_topic();
        $data['content'] = $this->load->view('pages/DataEntry', $dt, true);
        $this->load->view('page_template', $data);
    }
}