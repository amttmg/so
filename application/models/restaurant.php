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
        $res_name = $this->input->post('res_name');
        $area = $this->input->post('est_area');
        $street = $this->input->post('est_street');
        $landmark = $this->input->post('est_landmark');
        $mobile1 = $this->input->post('res_mobile1');
        $mobile2 = $this->input->post('res_mobile2');
        $landline1 = $this->input->post('res_landline1');
        $landline2 = $this->input->post('res_landline2');
        $lat = $this->input->post('res_lat');
        $lon = $this->input->post('res_lon');
        $google_map = $this->input->post('res_map');
        $website = $this->input->post('res_website');
        $email = $this->input->post('res_email');
        $other = $this->input->post('res_remarks');
        $parking = $this->input->post('res_parking');
        $parking_two = $this->input->post('res_parking2');
        $parking_four = $this->input->post('res_parking4');

        $newtbl_restaurants = array(
            'res_name' => $res_name,
            'area' => $area,
            'street' => $street,
            'landmark' => $landmark,
            'mobile1' => $mobile1,
            'mobile2' => $mobile2,
            'landline1' => $landline1,
            'landline2' => $landline2,
            'lat' => $lat,
            'lon' => $lon,
            'google_map' => $google_map,
            'website' => $website,
            'email' => $email,
            'other' => $other,
            'parking' => $parking,
            'parking_two' => $parking_two,
            'parking_four' => $parking_four,
        );

        $this->db->insert('tbl_restaurants', $newtbl_restaurants);
        $res_id = $this->db->insert_id();

        $serves = $this->input->post('serves');
        if (is_array($serves)) {
            foreach ($serves as $val) {
                $newtbl_serves = array(
                    'res_id' => $res_id,
                    'serves_id' => $val,
                    'status' => 1,
                );
                $this->db->insert('tbl_res_serves', $newtbl_serves);
            }
        }

        $srv_time = $this->input->post('servtime');
        if (is_array($srv_time)) {
            foreach ($srv_time as $day => $serv) {
                $newtbl_service_time = array(
                    'res_id' => $res_id,
                    'day' => $day,
                    'opening_time' => $serv['open'],
                    'closing_time' => $serv['close'],
                    'status' => 1,
                );
                $this->db->insert('tbl_service_time', $newtbl_service_time);
            }
        }
        $estimate_cost_topic = $this->input->post('estimate_cost_topic');
        if (is_array($estimate_cost_topic)) {
            foreach ($estimate_cost_topic as $topic_id => $val) {
                $newtbl_res_estimate_cost = array(
                    'res_id' => $res_id,
                    'topic_id' => $topic_id,
                    'cost' => $val,
                    'status' => 1,
                );
                $this->db->insert('tbl_res_estimate_cost', $newtbl_res_estimate_cost);
            }
        }
//Owners
        $name = $this->input->post('owners_name');
        $designation = $this->input->post('owners_designation');
        $mobile1 = $this->input->post('owners_mobile1');
        $mobile2 = $this->input->post('owners_mobile2');
        $landline1 = $this->input->post('owners_landline1');
        $landline2 = $this->input->post('owners_landline2');

        $newtbl_owners = array(
            'name' => $name,
            'designation' => $designation,
            'mobile1' => $mobile1,
            'mobile2' => $mobile2,
            'landline1' => $landline1,
            'landline2' => $landline2,
            'res_id' => $res_id,
        );
        $this->db->insert('tbl_owners', $newtbl_owners);
    }
}