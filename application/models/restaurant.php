<?php

/**
 * Created by PhpStorm.
 * User: amttm
 * Date: 4/25/2016
 * Time: 4:17 PM
 */
class restaurant extends CI_Model
{
    var $table_name='tbl_restaurants';

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

        $srv_time = $this->input->post('servtime1');
        if (is_array($srv_time)) {
            foreach ($srv_time as $day => $serv) {
                $newtbl_service_time = array(
                    'res_id' => $res_id,
                    'day' => $day,
                    'opening_time' => $serv['open'],
                    'closing_time' => $serv['close'],
                    'position'=>2,
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
        
        foreach ($name as $key => $value) {

            $newtbl_owners = array(
                'name' => $name[$key],
                'designation' => $designation[$key],
                'mobile1' => $mobile1[$key],
                'mobile2' => $mobile2[$key],
                'landline1' => $landline1[$key],
                'landline2' => $landline2[$key],
                'res_id' => $res_id,
            );
            $this->db->insert('tbl_owners', $newtbl_owners);
           
        }
        

        $establishment_type = $this->input->post('establishment_type');
        if (is_array($establishment_type)) {
            foreach ($establishment_type as $est_type) {
                $newtbl_res_estd_type = array(
                    'type_id' => $est_type,
                    'res_id' => $res_id,
                    'status' => 1,
                );
                $this->db->insert('tbl_res_estd_type', $newtbl_res_estd_type);
            }
        }
        $facilities = $this->input->post('facilities');
        if (is_array($facilities)) {
            foreach ($facilities as $fac) {
                $newtbl_res_facility = array(
                    'facility_id' => $fac,
                    'res_id' => $res_id,
                    'status' => 1,
                );
                $this->db->insert('tbl_res_facility', $newtbl_res_facility);
            }
        }

        $happyhours = $this->input->post('happyhours');
        if (is_array($happyhours)) {
            foreach ($happyhours as $day => $hours) {
                $newtbl_happy_hours = array(
                    'res_id' => $res_id,
                    'day' => $day,
                    'start_time' => $hours['start'],
                    'end_time' => $hours['end'],
                    'status' => 1,
                );
                $this->db->insert('tbl_happy_hours', $newtbl_happy_hours);
            }
        }

        $happyhours = $this->input->post('happyhours1');
        if (is_array($happyhours)) {
            foreach ($happyhours as $day => $hours) {
                $newtbl_happy_hours = array(
                    'res_id' => $res_id,
                    'day' => $day,
                    'start_time' => $hours['start'],
                    'end_time' => $hours['end'],
                    'position'=>2,
                    'status' => 1,
                );
                $this->db->insert('tbl_happy_hours', $newtbl_happy_hours);
            }
        }

        $cousins = $this->input->post('cousins');
        if (is_array($cousins)) {
            foreach ($cousins as $cousin) {
                $newtbl_res_cousins= array(
                    'res_id'=> $res_id,
                    'cousin_id'=> $cousin,
                    'status'=> 1,
                );
                $this->db->insert('tbl_res_cousins', $newtbl_res_cousins);
            }
        }
        $foods = $this->input->post('foods');
        if (is_array($foods)) {
            foreach ($foods as $food) {
                $newtbl_res_foods= array(
                    'res_id'=> $res_id,
                    'food_id'=> $food,
                    'status'=> 1,
                );
                $this->db->insert('tbl_res_foods', $newtbl_res_foods);
            }
        }
        $pop_dishes = $this->input->post('pop_dishes');
        if (is_array($pop_dishes)) {
            foreach ($pop_dishes as $dishes) {
                $newtbl_res_pop_dishes= array(
                    'res_id'=> $res_id,
                    'pop_dishes_id'=> $dishes,
                    'status'=> 1,
                );
                $this->db->insert('tbl_res_pop_dishes', $newtbl_res_pop_dishes);
            }
        }
    }

    public function getAll($order_by='',$json=false)
    {
        if ($order_by=='') 
        {
            $this->db->order_by('res_id','desc');
        }
        else
        {
            $this->db->order_by($order_by[0],$order_by[1]);
        }

        $this->db->from($this->table_name);
        $this->db->where('status',1);
        $result_data= $this->db->get()->result();

        if ($json==true)
        {
           return json_encode($result_data);
        }
        else
        {
            return $result_data;
        }
    }

    public function getBy($data,$json=false)
    {
         $this->db->from($this->table_name);
         $this->db->where($data[0],$data[1]);
         $this->db->where('status',1);
        $result_data=$this->db->get()->row();
        if ($json==false) 
        {
            return $result_data;
        }
        else
        {
            return json_encode($result_data);
        }

       
    }

    public function delete($res_id)
    {
        $this->db->where('res_id',$res_id);
        $this->db->update($this->table_name,array('status'=>0));
    }

}