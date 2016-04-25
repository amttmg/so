<?php

/**
 * Created by PhpStorm.
 * User: amttm
 * Date: 4/25/2016
 * Time: 4:17 PM
 */
class restaurant extends CI_Model
{
    function add()
    {
        $this->db->trans_start();

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {

        }
    }
}