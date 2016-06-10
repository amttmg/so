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

    public function insert()
    {

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('res_name', 'Restaurent Name', 'required');
        $this->form_validation->set_rules('res_mobile1', 'Mobile Number', 'required');
        $this->form_validation->set_rules('res_landline1', 'Land Line Number', 'required');
       /* $this->form_validation->set_rules('owners_name', 'Owners Name', 'required');
        $this->form_validation->set_rules('owners_designation', 'Designation', 'required');
        $this->form_validation->set_rules('owners_mobile1', 'Mobile', 'required');
        $this->form_validation->set_rules('owners_landline1', 'Landline', 'required');*/

        $this->form_validation->set_rules('res_lat', 'Latitude', 'required');
        $this->form_validation->set_rules('res_lon', 'Longitude', 'required');
        $this->form_validation->set_rules('est_city', 'City', 'required');
        $this->form_validation->set_rules('est_area', 'Area', 'required');
        $this->form_validation->set_rules('est_street', 'Street', 'required');
        $this->form_validation->set_rules('est_landmark', 'Landmark', 'required');


        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //
        if ($this->form_validation->run() == FALSE) {
            $dt['serves'] = $this->master->getServes();
            $dt['estimate_cost_topic'] = $this->master->getEstimate_cost_topic();
            $dt['establishment_types'] = $this->master->getEstablishment_type();
            $dt['facilities'] = $this->master->getFacilities();
            $dt['cousins'] = $this->master->getCousins();
            $dt['foods'] = $this->master->getFood();
            $dt['pop_dishes'] = $this->master->getPop_dishes();
            //$data['content'] = $this->load->view('pages/DataEntry', $dt, true);
            $this->load->_render_page('pages/DataEntry', $dt);
        } else {
            $this->db->trans_start();

            $this->restaurant->add();

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('flashError', 'Sorry Data is not inserted due to Somthing is wrong');
            } else {
                $this->db->trans_commit();
                $this->session->set_flashdata('flashSuccess', 'Data Successfully Inserted');
            }
            redirect('dataentry');
        }

    }
}