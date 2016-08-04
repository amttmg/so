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
        if (!$this->so->user_logged_in()) {
            redirect('login', 'refresh');
        }
        $this->load->model('master');
        $this->load->model('m_select_list', 'select');
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
        $dt['areaDropdown'] = $this->select->getSelectList('tbl_area', array('status'=>1), 'id', 'name', 'id="est_area" name="est_area" class="form-control"');
        $dt['streetDropdown'] = $this->select->getSelectList('tbl_street', '', 'id', 'name', 'id="est_street" name="est_street" class="form-control"');
        //$data['content'] = $this->load->view('pages/DataEntry', $dt, true);
        $this->load->_render_page('pages/DataEntry', $dt);
    }

    public function insert()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('res_name', 'Restaurent Name', 'required');
        $this->form_validation->set_rules('res_mobile1', 'Mobile Number', 'trim|max_length[12]');
        $this->form_validation->set_rules('res_landline1', 'Land Line Number', 'trim|max_length[12]');
        /* $this->form_validation->set_rules('owners_name', 'Owners Name', 'required');
         $this->form_validation->set_rules('owners_designation', 'Designation', 'required');
         $this->form_validation->set_rules('owners_mobile1', 'Mobile', 'required');
         $this->form_validation->set_rules('owners_landline1', 'Landline', 'required');*/

        $this->form_validation->set_rules('res_lat', 'Latitude', 'trim|required|max_length[12]');
        $this->form_validation->set_rules('res_lon', 'Longitude', 'trim|required|max_length[12]');
        $this->form_validation->set_rules('est_city', 'City', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('est_area', 'Area', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('est_street', 'Street', 'trim|max_length[100]');
        $this->form_validation->set_rules('est_landmark', 'Landmark', 'trim|max_length[100]');
        $this->form_validation->set_rules('cousins', 'Cusins', 'callback_cusin_check');

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
            $dt['cityDropdown'] = $this->select->getSelectList('tbl_city', '', 'id', 'name', 'id="est_city" name="est_city" class="form-control"', $this->form_validation->set_value('est_city'));
            $dt['areaDropdown'] = $this->select->getSelectList('tbl_area', '', 'id', 'name', 'id="est_area" name="est_area" class="form-control"', $this->form_validation->set_value('est_area'));
            $dt['streetDropdown'] = $this->select->getSelectList('tbl_street', '', 'id', 'name', 'id="est_street" name="est_street" class="form-control"', $this->form_validation->set_value('est_street'));

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

    public function cusin_check()
    {
        if (isset($_POST['cousins']) || isset($_POST['foods'])) {
            return true;
        } else {
            $this->form_validation->set_message('cusin_check', 'At least one cusine by country or cusine by food is required !');
            return false;
        }
    }

    public function getCityDropDown()
    {
        echo $this->select->getSelectList('tbl_city', '', 'id', 'name', 'name="est_city" class="form-control"');
    }

    public function getAreaDropDown($city_id='')
    {
        echo $this->select->getSelectList('tbl_area', array('city_id' => $city_id), 'id', 'name', 'id="est_area" name="est_area" class="form-control"');
    }

    public function getStreetDropDown($area_id='')
    {
        echo $this->select->getSelectList('tbl_street', array('area_id' => $area_id), 'id', 'name', 'id="est_street" name="est_street" class="form-control"');
    }

}