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

    function getEstablishment_type($parameters = '')
    {
        $sql = "select * from establishment_type where 1=1 ";
        if (is_array($parameters)) {
            foreach ($parameters as $key => $val) {
                $sql .= ' and ' . $key . '=' . $val;
            }
        }
        return $this->mdb->getResult($sql);
    }

    function getFacilities($parameters = '')
    {
        $sql = "select * from tbl_facilities where 1=1 ";
        if (is_array($parameters)) {
            foreach ($parameters as $key => $val) {
                $sql .= ' and ' . $key . '=' . $val;
            }
        }
        return $this->mdb->getResult($sql);
    }

    function getCousins($parameters = '')
    {
        $sql = "select * from tbl_cousins where 1=1 ";
        if (is_array($parameters)) {
            foreach ($parameters as $key => $val) {
                $sql .= ' and ' . $key . '=' . $val;
            }
        }
        return $this->mdb->getResult($sql);
    }

    function getFood($parameters = '')
    {
        $sql = "select * from tbl_food where 1=1 ";
        if (is_array($parameters)) {
            foreach ($parameters as $key => $val) {
                $sql .= ' and ' . $key . '=' . $val;
            }
        }
        return $this->mdb->getResult($sql);
    }

    function getPop_dishes($parameters = '')
    {
        $sql = "select * from tbl_pop_dishes where 1=1 ";
        if (is_array($parameters)) {
            foreach ($parameters as $key => $val) {
                $sql .= ' and ' . $key . '=' . $val;
            }
        }
        $sql.=" order by pop_dishes";
        return $this->mdb->getResult($sql);
    }
}