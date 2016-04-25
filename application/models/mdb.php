<?php

/**
 * Created by PhpStorm.
 * User: amttm
 * Date: 4/25/2016
 * Time: 11:38 AM
 */
class mdb extends CI_Model
{
    function getResult($sql)
    {
        $qry = $this->db->query($sql);
        return $qry->result();
    }

    function getQuery($sql)
    {
        $qry = $this->db->query($sql);
        return $qry;
    }

    function getRows($sql)
    {
        $qry = $this->db->query($sql);
        return $qry->rows();
    }

    function getNum_rows($sql)
    {
        $qry = $this->db->query($sql);
        return $qry->num_rows();
    }
}