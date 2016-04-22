<?php

/**
 * Created by PhpStorm.
 * User: amttm
 * Date: 4/21/2016
 * Time: 3:12 PM
 */
class dataentry extends CI_Controller
{
    public function index()
    {
        $data['content'] = $this->load->view('pages/DataEntry','', true);
        $this->load->view('page_template', $data);
    }
}