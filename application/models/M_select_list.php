<?php

/**
 * Created by PhpStorm.
 * User: amttm
 * Date: 6/22/2016
 * Time: 5:30 AM
 */
class M_select_list extends CI_Model
{
    public function getSelectList($tbl, $conditions = '', $key, $value, $attr = '', $selected = '')
    {
        $this->db->select($key . ',' . $value);
        if (is_array($conditions)) {
            foreach ($conditions as $k => $v) {
                $this->db->where($k, $v);
            }
        }
        $this->db->order_by($value);
        $result = $this->db->get($tbl)->result_array();
        $data = "<select $attr>";
        $data .= "<option value=''>Please Select</option>";
        foreach ($result as $r) {
            if ($r[$key] == $selected) {
                $data .= "<option selected value='$r[$key]'>$r[$value]</option>";
            } else {
                $data .= "<option value='$r[$key]'>$r[$value]</option>";
            }
        }
        $data .= "</select>";
        return $data;
    }
}