<?php

class master extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdb');
    }

    function getServes($parameters = '')
    {
        $sql = "select * from tbl_serves where 1=1 ";
        if (is_array($parameters)) {
            foreach ($parameters as $key => $val) {
                $sql .= ' and ' . $key . '=' . $val;
            }
        }
        return $this->mdb->getResult($sql);
    }

    function getEstimate_cost_topic($parameters = '')
    {
        $sql = "select * from estimate_cost_topic where 1=1 ";
        if (is_array($parameters)) {
            foreach ($parameters as $key => $val) {
                $sql .= ' and ' . $key . '=' . $val;
            }
        }
        return $this->mdb->getResult($sql);
    }
}