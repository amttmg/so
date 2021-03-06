
<!-- <div class="container" style="background-color: #f0f0f0"> -->
<form method="post" action="<?php echo base_url('index.php/dataentry/insert') ?>">
    <?php if ($this->session->flashdata('flashSuccess')): ?>
        <div class="alert alert-success" style="margin-top: 10px">
            <b>
                <i class="glyphicon glyphicon-ok"></i> <?php echo $this->session->flashdata('flashSuccess') ?>
            </b>
        </div>
    <?php endif ?>
    <?php if ($this->session->flashdata('flashError')): ?>
        <div class="alert alert-danger" style="margin-top: 10px">
            <b>
                <i class="glyphicon glyphicon-remove"></i> <?php echo $this->session->flashdata('flashError') ?>
            </b>
        </div>
    <?php endif ?>


    <div class="row" style="margin-top: 15px">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>Restaurant Name</th>
                </tr>
                <tr>
                    <td>
                            <textarea name="res_name"
                                      class="form-control"><?php echo set_value('res_name') ?></textarea>
                        <?php echo form_error('res_name'); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="well-sm well">
                <table class="table table-bordered">
                    <tr>
                        <th colspan="2">Establishment's Contact Number</th>
                    </tr>
                    <tr>
                        <td>
                            Mobile 1
                        </td>
                        <td>
                            <div class="form-group">
                                <input maxlength="10" oninput="maxLengthCheck(this)" type="number" class="form-control"
                                       name="res_mobile1"
                                       value="<?php echo set_value('res_mobile1') ?>"
                                    >
                            </div>
                            <?php echo form_error('res_mobile1'); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mobile 2
                        </td>
                        <td>
                            <div class="form-group">
                                <input name="res_mobile2" type="number" maxlength="10" oninput="maxLengthCheck(this)"
                                       value="<?php echo set_value('res_mobile2') ?>" type="text"
                                       class="form-control phone">
                            </div>
                            <?php echo form_error('res_mobile2'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Land line1
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <span class="input-group-addon">01</span>
                                <input type="number" name="res_landline1" maxlength="10" oninput="maxLengthCheck(this)"
                                       value="<?php echo set_value('res_landline1') ?>"
                                       class="form-control">
                            </div>
                            <?php echo form_error('res_landline1'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Land line2
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <span class="input-group-addon">01</span>
                                <input type="number" name="res_landline2" maxlength="10" oninput="maxLengthCheck(this)"
                                       value="<?php echo set_value('res_landline2') ?>"
                                       class="form-control">
                            </div>
                            <?php echo form_error('res_landline2'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Website
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <span class="input-group-addon">www.</span>
                                <input type="text" name="res_website" value="<?php echo set_value('res_website') ?>"
                                       class="form-control">
                            </div>
                            <?php echo form_error('res_website'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email
                        </td>
                        <td>
                            <input type="text" name="res_email" value="<?php echo set_value('res_email') ?>"
                                   class="form-control">
                            <?php echo form_error('res_email'); ?>
                        </td>
                    </tr>
                </table>

            </div>

        </div>
        <div class="col-md-6">
            <div class="well-sm well">
                <table class="table table-bordered">
                    <th colspan="2">Owner's or manager Restaurant Number</th>
                    <tr>
                        <td>
                            Name
                        </td>
                        <td>
                            <input type="text" name="owners_name[]" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Designation
                        </td>
                        <td>
                            <input type="text" name="owners_designation[]" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mobile 1
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" name="owners_mobile1[]" maxlength="10" oninput="maxLengthCheck(this)"
                                       class="form-control">
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mobile 2
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" name="owners_mobile2[]" maxlength="10" oninput="maxLengthCheck(this)"
                                       class="form-control">
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Land line1
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <span class="input-group-addon">01</span>
                                <input type="text" name="owners_landline1[]" maxlength="8"
                                       oninput="maxLengthCheck(this)" class="form-control">
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Land line2
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <span class="input-group-addon">01</span>
                                <input type="text" name="owners_landline2[]" maxlength="8"
                                       oninput="maxLengthCheck(this)" class="form-control">
                            </div>

                        </td>
                    </tr>
                </table>
                <button type="button" id="btn-addMoreOwner" class="btn btn-sm btn-info pull-right">Add More owner
                </button>
                <div class="clearfix">

                </div>
            </div>

        </div>
    </div>
    <div id="containerOwner">

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <b>Multiple Outlets</b>
                <hr>
                <label class="checkbox-inline">
                    <label></label>
                    <input class="multi_outlets" type="radio" name="multiple_outlets" value="1">Yes
                </label>
                <label class="checkbox-inline">
                    <input class="multi_outlets" checked type="radio" name="multiple_outlets" value="0">No
                </label>
                <span id="outlets_no" style="display: none" >
                     <label class="checkbox-inline">
                         <label>No. of outlets</label>
                     </label>
                     <label class="checkbox-inline">
                        <input  class="form-control" type="number" name="outlets_no">
                    </label>
                </span>
               
                <span style="display: none" id="otdetails">
                    <label class="checkbox-inline">
                        <label>&nbsp&nbspDetails</label>
                    </label>
                    <label class="checkbox-inline">
                        <input type="text" name="outletdetails" id="outletdetails" class="form-control" value=""> 
                    </label>
                </span>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="well-sm well">
                <table class="table table-bordered">
                    <th colspan="2">Map(Coordinates)</th>
                    <tr>
                        <td>
                            Latitude
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <span class="input-group-addon">27.</span>
                                <input type="number" name="res_lat" value="<?php echo set_value('res_lat') ?>"
                                       class="form-control">
                            </div>
                            <?php echo form_error('res_lat'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Longitude
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <span class="input-group-addon">85.</span>
                                <input type="number" name="res_lon" value="<?php echo set_value('res_lon') ?>"
                                       class="form-control">
                            </div>
                            <?php echo form_error('res_lon'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Present in google Map
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" name="google_map" id="googlemapyes" value="1">Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="google_map" id="googlemapno" value="0" checked="">No
                                </label>

                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="well-sm well">
                <table class="table table-bordered">
                    <th colspan="2">Establishment Location</th>
                    <tr>
                        <td>
                            City
                        </td>
                        <td>
                            <!--<input list="est_city" id="city_suggest" name="est_city"
                                   value="<?php /*echo set_value('est_city') */ ?>"
                                   class="form-control">
                            <datalist id="est_city">

                            </datalist>-->
                            <?php echo $cityDropdown ?>
                            <?php echo form_error('est_city'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Area
                        </td>
                        <td>
                            <!-- <input list="est_area" name="est_area" id="area_suggest"
                                   value="<?php /*echo set_value('est_area') */ ?>"
                                   class="form-control">
                            <datalist id="est_area">

                            </datalist>-->
                            <div id="est_area_div">
                                <?php echo $areaDropdown ?>
                            </div>
                            <?php echo form_error('est_area'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Street
                        </td>
                        <td>
                            <!--  <input type="text" name="est_street" value="<?php /*echo set_value('est_street') */ ?>"
                                   class="form-control">-->
                            <div id="est_street_div">
                                <?php echo $streetDropdown ?>
                            </div>
                            <?php echo form_error('est_street'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Landmark
                        </td>
                        <td>
                            <input type="text" name="est_landmark" value="<?php echo set_value('est_landmark') ?>"
                                   class="form-control">
                            <?php echo form_error('est_landmark'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Others(Building's Name)
                        </td>
                        <td>
                            <input type="text" name="est_other" value="<?php echo set_value('est_other') ?>"
                                   class="form-control">
                            <?php echo form_error('est_other'); ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="well-sm well clearfix">
                <b>Serves: </b>
                <button type="button" id="btn_addServe" class="btn btn-sm btn-info pull-right"><i
                        class="fa fa-plus fa"></i> Add New
                </button>
                <div class="clearfix">

                </div>
                <div id="serve_checkbox">
                    <?php foreach ($serves as $ser) {
                        ?>
                        <div class="col-md-2">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="serves[]"
                                       value="<?php echo $ser->serves_id ?>"><?php echo $ser->serves_name ?>
                            </label>
                        </div>
                        <?php
                    } ?>
                    <?php echo form_error('serves'); ?>

                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="well-sm well">

                <br/>
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>

                            </th>
                            <th>
                                Opening Time
                            </th>
                            <th>
                                Closing Time
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        <tr>
                            <td>if same all weeks</td>
                            <td>
                                <input id="open_time_all" type="time" class="form-control time" data-time-format="H:i:s">
                                <input id="open_time_all1" type="time" class="form-control time" data-time-format="H:i:s">
                                <input id="open_time_all2" type="time" class="form-control time" data-time-format="H:i:s">
                            </td>
                            <td>
                                <input id="close_time_all" type="time" class="form-control time" data-time-format="H:i:s">
                                <input id="close_time_all1" type="time" class="form-control time" data-time-format="H:i:s">
                                <input id="close_time_all2" type="time" class="form-control time" data-time-format="H:i:s">
                            </td>
                            <td>
                                
                            </td>

                        </tr>
                        <tr>
                            <td>Sunday</td>
                            <td>
                                <input name="servtime[1][open]" type="time" class="form-control open_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[1][open]" type="time" class="form-control open_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[1][open]" type="time" class="form-control open_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <input name="servtime[1][close]" type="time" class="form-control close_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[1][close]" type="time" class="form-control close_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[1][close]" type="time" class="form-control close_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <!-- <button type="button" class="btn btn-xs btn-primary addservetime" data-position="1">New
                                     Time
                                 </button>-->
                                 <div class="checkbox">
                                     <label>
                                         <input type="checkbox" class="close_day" value="">
                                         Close this day
                                     </label>
                                 </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td>
                                <input name="servtime[2][open]" type="time" class="form-control open_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[2][open]" type="time" class="form-control open_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[2][open]" type="time" class="form-control open_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <input name="servtime[2][close]" type="time" class="form-control close_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[2][close]" type="time" class="form-control close_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[2][close]" type="time" class="form-control close_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <!--<button type="button" class="btn btn-xs btn-primary  addservetime" data-position="2">New
                                    Time
                                </button>-->
                                <div class="checkbox">
                                     <label>
                                         <input type="checkbox" class="close_day" value="" >Close this day
                                     </label>
                                 </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>
                                <input name="servtime[3][open]" type="time" class="form-control open_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[3][open]" type="time" class="form-control open_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[3][open]" type="time" class="form-control open_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <input name="servtime[3][close]" type="time" class="form-control close_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[3][close]" type="time" class="form-control close_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[3][close]" type="time" class="form-control close_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <!-- <button type="button" class="btn btn-xs btn-primary addservetime" data-position="3">New
                                     Time
                                 </button>-->
                                 <div class="checkbox">
                                     <label>
                                         <input type="checkbox" class="close_day" value="">
                                         Close this day
                                     </label>
                                 </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>
                                <input name="servtime[4][open]" type="time" class="form-control open_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[4][open]" type="time" class="form-control open_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[4][open]" type="time" class="form-control open_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <input name="servtime[4][close]" type="time" class="form-control close_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[4][close]" type="time" class="form-control close_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[4][close]" type="time" class="form-control close_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <!--  <button type="button" class="btn btn-xs btn-primary addservetime" data-position="4">New
                                      Time
                                  </button>-->
                                  <div class="checkbox">
                                     <label>
                                         <input type="checkbox" class="close_day" value="">
                                         Close this day
                                     </label>
                                 </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>
                                <input name="servtime[5][open]" type="time" class="form-control open_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[5][open]" type="time" class="form-control open_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[5][open]" type="time" class="form-control open_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <input name="servtime[5][close]" type="time" class="form-control close_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[5][close]" type="time" class="form-control close_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[5][close]" type="time" class="form-control close_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <!-- <button type="button" class="btn btn-xs btn-primary addservetime" data-position="5">New
                                     Time
                                 </button>-->
                                 <div class="checkbox">
                                     <label>
                                         <input type="checkbox" class="close_day" value="">
                                         Close this day
                                     </label>
                                 </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>
                                <input name="servtime[6][open]" type="time" class="form-control open_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[6][open]" type="time" class="form-control open_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[6][open]" type="time" class="form-control open_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <input name="servtime[6][close]" type="time" class="form-control close_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[6][close]" type="time" class="form-control close_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[6][close]" type="time" class="form-control close_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <!-- <button type="button" class="btn btn-xs btn-primary addservetime" data-position="6">New
                                     Time
                                 </button>-->
                                 <div class="checkbox">
                                     <label>
                                         <input type="checkbox" class="close_day" value="">
                                         Close this day
                                     </label>
                                 </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Saturday</td>
                            <td>
                                <input name="servtime[7][open]" type="time" class="form-control open_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[7][open]" type="time" class="form-control open_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[7][open]" type="time" class="form-control open_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <input name="servtime[7][close]" type="time" class="form-control close_time time"
                                       data-time-format="H:i:s">
                                <input name="servtime1[7][close]" type="time" class="form-control close_time1 time"
                                       data-time-format="H:i:s">
                                <input name="servtime2[7][close]" type="time" class="form-control close_time2 time"
                                       data-time-format="H:i:s">
                            </td>
                            <td>
                                <!-- <button type="button" class="btn btn-xs btn-primary addservetime" data-position="7">New
                                     Time
                                 </button>-->
                                 <div class="checkbox">
                                     <label>
                                         <input type="checkbox" class="close_day" value="">
                                         Close this day
                                     </label>
                                 </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-5">
            <div class="well-sm well">
                <table class="table table-bordered" id="tbl-costTopic">
                    <tr>
                        <th colspan="2">
                            Cost(Lunch, dinner or breakfast) for two
                            <span class="pull-right"><button type="button" id="btn_costForTwo"
                                                             class="btn btn-sm btn-info"> Add New
                                </button></span>

                            <div class="clearfix">

                            </div>
                        </th>
                    </tr>
                    <?php foreach ($estimate_cost_topic as $topic) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $topic->topic ?>
                            </td>
                            <td>
                                <input type="number" name="estimate_cost_topic[<?php echo $topic->topic_id ?>]"
                                       class="estimate_cost_topic form-control">
                            </td>
                        </tr>
                        <?php

                    } ?>
                    <tr>
                        <td>
                            <b>Total</b>
                        </td>
                        <td>
                            <input type="number" class="form-control" disabled="" name="total" id="total" value="0">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="well-sm well">
                <b> Parking :</b>
                <label class="checkbox-inline">
                    <input type="radio" id="parking_yes" class="parking" name="res_parking"
                           value="1">Yes
                </label>
                <label class="checkbox-inline">
                    <input type="radio" id="parking_no" class="parking" name="res_parking" value="0" checked>No
                </label>
                <hr/>

                <label class="checkbox-inline">
                    <input type="checkbox" class="parking_options" name="res_parking2"
                           value="1">Two Wheeler
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" class="parking_options" name="res_parking4"
                           value="1">Four Wheeler
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="well-sm well clearfix" id="estd_checkbox">
                <b> Establishment Type:</b><span class="pull-right"><button
                        type="button" id="btn_establishmentType"
                        class="btn btn-sm btn-info"> Add New
                    </button></span>
                    <label><input type="text" id="searchestd" class="form-control" placeholder="search"></label>
                <div class="clearfix">

                </div>
                <hr/>
                <div id="all_text">
                    <?php foreach ($establishment_types as $est) {
                        ?>
                        <div class="col-md-2 cet">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="establishment_type[]"
                                       value="<?php echo $est->type_id ?>"><?php echo $est->type ?>
                            </label>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    (function ($) {
      jQuery.expr[':'].Contains = function(a,i,m){
          return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
      };
     function filterestd () {

         $('#searchestd').keyup(function() {
         var filter = $(this).val();
            // get the value of the input field so we can filter the results

            $('.cet').find("label:not(:Contains(" + filter + "))").parent().hide();
            $('.cet').find("label:Contains(" + filter + ")").parent().show();
        });

     }
     $(function () {
        filterestd();
      });
    }
    (jQuery));
</script>
    <div class="row">
        <div class="col-md-12">
            <div class="well-sm well clearfix" id="facility_checkbox">
                <b> Facilities :</b><span class="pull-right"><button type="button" id="btn_facilities"
                                                                     class="btn btn-sm btn-info"> Add New
                    </button></span>

                <div class="clearfix">

                </div>
                <hr/>
                <?php foreach ($facilities as $fac) {
                    ?>
                    <div class="col-md-2">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="facilities[]"
                                   value="<?php echo $fac->facilities_id ?>"><?php echo $fac->facility ?>
                        </label>
                    </div>
                    <?php
                } ?>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="well-sm well">
                <b> Offers: </b>
                <hr/>
                <label class="checkbox-inline">
                    <input type="radio" name="offers[]" class="offers" id="offers_yes" value="yes"> Yes
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="offers[]" class="offers" id="offers_no" value="no" checked> No
                </label>
                <label class="checkbox-inline">
                    <input type="text" name="offerremarks" id="textBoxOfferRemarks" class="form-control">
                </label>
            </div>
        </div>
    </div>
    <script type="text/javascript">
            if ($('#offers_no').prop('checked')) 
            {
              $('#textBoxOfferRemarks').val('')
                                       .hide();  
            }
            $('.offers').change(function() {
                if ($('#offers_no').prop('checked')) 
                {
                  $('#textBoxOfferRemarks').val('')
                                           .hide();  
                }
                else
                {
                    $('#textBoxOfferRemarks').show(); 
                }
            });
        
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="well-sm well">
               <label class="switch">
                  <input type="checkbox" id="chk-hh">
                  <div class="slider"></div>
                </label>
                <span class="pull-center">
                    <h3 id="hr_heading">Happy Hours</h3>
                </span>
                <table class="table table-bordered" id="tbl-happy_hours" style="display:none">
                    <tr>
                        <th colspan="3" style="text-align: center">Happy Hours</th>
                    </tr>
                    <tr>
                        <th>

                        </th>
                        <th>
                            Start Time
                        </th>
                        <th>
                            End Time
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    <tr>
                        <td>if same all weeks</td>
                        <td><input type="time" class="form-control time" id="start_time_all" data-time-format="H:i:s">
                        </td>
                        <td><input type="time" class="form-control time" id="end_time_all" data-time-format="H:i:s">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sunday</td>
                        <td>
                            <input name="happyhours[1][start]" type="time" class="form-control time start_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[1][start]" type="time" class="form-control time start_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[1][start]" type="time" class="form-control time start_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                            <input name="happyhours[1][end]" type="time" class="form-control time end_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[1][end]" type="time" class="form-control time end_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[1][end]" type="time" class="form-control time end_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                             <div class="checkbox">
                                 <label>
                                     <input type="checkbox" class="close_day" value="" >
                                     Close this day
                                 </label>
                             </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Monday</td>
                        <td>
                            <input name="happyhours[2][start]" type="time" class="form-control time start_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[2][start]" type="time" class="form-control time start_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[2][start]" type="time" class="form-control time start_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                            <input name="happyhours[2][end]" type="time" class="form-control time end_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[2][end]" type="time" class="form-control time end_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[2][end]" type="time" class="form-control time end_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                             <div class="checkbox">
                                 <label>
                                     <input type="checkbox" class="close_day" value="" >
                                     Close this day
                                 </label>
                             </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tuesday</td>
                        <td>
                            <input name="happyhours[3][start]" type="time" class="form-control time start_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[3][start]" type="time" class="form-control time start_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[3][start]" type="time" class="form-control time start_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                            <input name="happyhours[3][end]" type="time" class="form-control time end_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[3][end]" type="time" class="form-control time end_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[3][end]" type="time" class="form-control time end_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                             <div class="checkbox">
                                 <label>
                                     <input type="checkbox" class="close_day" value="" >
                                     Close this day
                                 </label>
                             </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Wednesday</td>
                        <td>
                            <input name="happyhours[4][start]" type="time" class="form-control time start_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[4][start]" type="time" class="form-control time start_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[4][start]" type="time" class="form-control time start_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                            <input name="happyhours[4][end]" type="time" class="form-control time end_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[4][end]" type="time" class="form-control time end_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[4][end]" type="time" class="form-control time end_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                             <div class="checkbox">
                                 <label>
                                     <input type="checkbox" class="close_day" value="" >
                                     Close this day
                                 </label>
                             </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Thursday</td>
                        <td>
                            <input name="happyhours[5][start]" type="time" class="form-control time start_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[5][start]" type="time" class="form-control time start_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[5][start]" type="time" class="form-control time start_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                            <input name="happyhours[5][end]" type="time" class="form-control time end_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[5][end]" type="time" class="form-control time end_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[5][end]" type="time" class="form-control time end_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                             <div class="checkbox">
                                 <label>
                                     <input type="checkbox" class="close_day" value="">
                                     Close this day
                                 </label>
                             </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Friday</td>
                        <td>
                            <input name="happyhours[6][start]" type="time" class="form-control time start_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[6][start]" type="time" class="form-control time start_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[6][start]" type="time" class="form-control time start_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                            <input name="happyhours[6][end]" type="time" class="form-control time end_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[6][end]" type="time" class="form-control time end_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[6][end]" type="time" class="form-control time end_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                             <div class="checkbox">
                                 <label>
                                     <input type="checkbox" class="close_day" value="" >
                                     Close this day
                                 </label>
                             </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Saturday</td>
                        <td>
                            <input name="happyhours[7][start]" type="time" class="form-control time start_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[7][start]" type="time" class="form-control time start_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[7][start]" type="time" class="form-control time start_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                            <input name="happyhours[7][end]" type="time" class="form-control time end_time"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours1[7][end]" type="time" class="form-control time end_time1"
                                   data-time-format="H:i:s">
                            <br/>
                            <input name="happyhours2[7][end]" type="time" class="form-control time end_time2"
                                   data-time-format="H:i:s">
                        </td>
                        <td>
                             <div class="checkbox">
                                 <label>
                                     <input type="checkbox" class="close_day" value="">
                                     Close this day
                                 </label>
                             </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.start_time1,.start_time2,.end_time1,.end_time2,#tbl-happy_hours br').remove();
    $('#chk-hh').change(function() {
        if ($(this).prop('checked')) 
        {
            $('#hr_heading').hide();
            $('#tbl-happy_hours').show();
        }
        else
        {
            $('#hr_heading').show();
            $('#tbl-happy_hours').hide();
        }
    });
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="well-sm well clearfix" id="cousin_checkbox">
                <b> Cuisine by Country :</b><span class="pull-right"><button type="button" id="btn_addCousin"
                                                                             class="btn btn-sm btn-info "><i
                            class="fa fa-plus fa"></i> Add New
                    </button></span>

                <div class="clearfix">

                </div>
                <?php echo(form_error('cousins')); ?>
                <hr/>
                <?php foreach ($cousins as $Cousin) {
                    ?>
                    <div class="col-md-2">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="cousins[]"
                                   value="<?php echo $Cousin->cousin_id ?>"><?php echo $Cousin->cousin ?>
                        </label>
                    </div>
                    <?php
                } ?>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="well-sm well clearfix" id="cuisineByFoodCheckBox">
                <b> Cuisine by Food :</b>
                <span id="msg-cousinByFoodWait" class="text-success" style="display:none">  </span><span
                            class="pull-right"><button type="button" id="btn_addCousinByFood" class="btn btn-sm btn-info "><i
                                    class="fa fa-plus fa"></i> Add New
                            </button></span>
                <div class="clearfix">

                </div>
                <hr/>
                <?php foreach ($foods as $food) {
                    ?>
                    <div class="col-md-2 cbf">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="foods[]"
                                   value="<?php echo $food->food_id ?>"><?php echo $food->food ?>
                        </label>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#btn_addCousinByFood').click(function() {
            $('#mdl_cuisineByFood').modal('show');
        });
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="well-sm well clearfix" id="populardish_checkbox">
                <b>Popular Dish:</b>
                    <span class="pull-right"> 
                        <button type="button" id="btn_addPopDish" class="btn btn-sm btn-info">
                            <i class="fa fa-plus fa"></i> Add New
                        </button>
                    </span>
                    &nbsp&nbsp<label><input type="text" id="searchtxt" placeholder="search" class="form-control"> </label>
                    <label class="text-success">
                        <div class="checkbox">
                            &nbsp&nbsp
                            <label>
                                <input type="checkbox" id="show_checked_items" value="">
                                Show Checked Items
                            </label>
                        </div>
                    </label>
                <div class="clearfix">

                </div>
                <hr/>

                <?php foreach ($pop_dishes as $pop) {
                    ?>
                    <div class="col-md-2 chk">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="pop_dishes[]" class="pop_dishes"
                                   value="<?php echo $pop->pop_dishes_id ?>"><?php echo $pop->pop_dishes ?>
                        </label>
                    </div>
                    <?php
                } ?>

            </div>
        </div>
    </div>
<script type="text/javascript">
    (function ($) {
      jQuery.expr[':'].Contains = function(a,i,m){
          return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
      };
        function searchpopdish (argument) {
           $('#searchtxt').keyup(function() {
                 var filter = $(this).val();
                    // get the value of the input field so we can filter the results

                    $('.chk').find("label:not(:Contains(" + filter + "))").parent().hide();
                    $('.chk').find("label:Contains(" + filter + ")").parent().show();
            });
        }
        $(function () {
            searchpopdish();
        });
    }
    (jQuery));
    $('#show_checked_items').change(function() {
           if ($(this).prop('checked'))
            {
                $('.pop_dishes').not(':checked').parent().parent().hide();
                $('.pop_dishes').is(':checked').parent().parent().show();
            }
            else
            {
                $('.pop_dishes').parent().parent().show();
            }
       });
</script>
    <div class="row" style="padding: 15px">
        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea name="res_remarks" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-sm btn-primary pull-right">Save</button>
        </div>
    </div>
</form>
<!-- </div> -->
<style>
    hr {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .error {
        color: red;
    }
</style>
<div class="modal fade" id="mdl_cuisineByFood">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add new Cuisine By Food</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form-cuisineByFood">
                    <div class="form-group">
                        <label for="">Cousin By Food</label>
                        <input type="text" name="cousin_name" class="form-control" id="cousin_name"
                               placeholder="Cousin Name">
                        <span></span>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_cuisineByFoodSave" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mdl-addserve">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Serve</h4>
            </div>
            <div class="modal-body">
                <form action="" id="serve_form">

                    <div class="form-group">
                        <label for="">label</label>
                        <input type="text" name="serve_name" id="serve_name" class="form-control"
                               placeholder="Input Serve Type">
                        <span></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_servesave" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdl_establishmentType">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add new establishment type</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="estd_typeform">
                    <div class="form-group">
                        <label for="">Establishment Type</label>
                        <input type="text" name="estd_type" id="estd_type" class="form-control"
                               placeholder="Input Establishment Type">
                        <span></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_estdtypesave" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdl_facility">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add new facility</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="" id="facility_form">

                    <div class="form-group">
                        <label for="">Facility</label>
                        <input type="text" name="facility_name" id="facility_name" class="form-control" id=""
                               placeholder="Input Facility">
                        <span></span>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_facilitysave" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdl_cousin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add new cousin</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="cousin_form">
                    <div class="form-group">
                        <label for="">Cousin</label>
                        <input type="text" name="cousin_name" class="form-control" id="cousin_name"
                               placeholder="Cousin Name">
                        <span></span>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_cousinsave" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdl_populardish">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add new popular dish</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="popdishform">
                    <div class="form-group">
                        <label for="">Dish</label>
                        <input type="text" name="dish_name" class="form-control" id="dish_name" placeholder="Dish Name">
                        <span></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_popDishSave" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdl-costTopic">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add new cost topic</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form-costTopic">
                    <div class="form-group">
                        <label for="">Cost topic</label>
                        <input type="text" name="cost_topic" class="form-control" id="cost_topic"
                               placeholder="Input Cost Topic">
                        <span></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-saveCostTopic" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<style>
    #all_text span {
        text-decoration: underline;
        background-color: yellow;
    }
</style>
<script>
    parking_check();
    $(document).ready(function () {

         $('.close_day').change(function() {
            //$(this).closest('tr').remove();
            if ($(this).prop('checked')) 
            {
                
                $(this).closest('tr').find('.time').hide().val('');
                
            }
            else
            {
                $(this).closest('tr').find('.time').show();
            }

        });

        $('.parking').click(function () {
            parking_check();
        });

        $('#btn-saveCostTopic').click(function () {
            add_costTopic('btn-saveCostTopic', 'tbl-costTopic');
        });
        $('#btn_costForTwo').click(function () {
            $('#mdl-costTopic').modal('show');

        });
        /*===============================================================================*/
        $('.addhappyhrs').click(function () {

            var temp = $(this).closest('tr').find('td').eq(1).html();
            var temp2 = $(this).closest('tr').find('td').eq(2).html();
            if ($(this).data('position') === 1) {
                temp = $(temp).attr('name', 'happyhours1[1][start]');
                temp2 = $(temp2).attr('name', 'happyhours1[1][end]');
            }
            if ($(this).data('position') === 2) {
                temp = $(temp).attr('name', 'happyhours1[2][start]');
                temp2 = $(temp2).attr('name', 'happyhours1[2][end]');
            }
            if ($(this).data('position') === 3) {
                temp = $(temp).attr('name', 'happyhours1[3][start]');
                temp2 = $(temp2).attr('name', 'happyhours1[3][end]');
            }
            if ($(this).data('position') === 4) {
                temp = $(temp).attr('name', 'happyhours1[4][start]');
                temp2 = $(temp2).attr('name', 'happyhours1[4][end]');
            }
            if ($(this).data('position') === 5) {
                temp = $(temp).attr('name', 'happyhours1[5][start]');
                temp2 = $(temp2).attr('name', 'happyhours1[5][end]');
            }
            if ($(this).data('position') === 6) {
                temp = $(temp).attr('name', 'happyhours1[6][start]');
                temp2 = $(temp2).attr('name', 'happyhours1[6][end]');
            }
            if ($(this).data('position') === 7) {
                temp = $(temp).attr('name', 'happyhours1[7][start]');
                temp2 = $(temp2).attr('name', 'happyhours1[7][end]');
            }

            $(this).closest('tr').find('td').eq(1).append('<br/>')
                .append(temp);
            $(this).closest('tr').find('td').eq(2).append('<br/>')
                .append(temp2);

            $(this).hide('slow', function () {
            });
        });
        $(document).on('focus', ".time", function () {
            $('.time').timepicker();
        });

        $('#searchfor').keyup(function () {
            $("body").find(":contains($(this).val())").closest('input').css("color", "red");
        });
        /*======================================================================================*/
        $('.addservetime').click(function () {
            var temp = $(this).closest('tr').find('td').eq(1).html();
            var temp2 = $(this).closest('tr').find('td').eq(2).html();
            if ($(this).data('position') === 1) {
                temp = $(temp).attr('name', 'servtime1[1][open]');
                temp2 = $(temp2).attr('name', 'servtime1[1][close]');
            }
            if ($(this).data('position') === 2) {
                temp = $(temp).attr('name', 'servtime1[2][open]');
                temp2 = $(temp2).attr('name', 'servtime1[2][close]');
            }
            if ($(this).data('position') === 3) {
                temp = $(temp).attr('name', 'servtime1[3][open]');
                temp2 = $(temp2).attr('name', 'servtime1[3][close]');
            }
            if ($(this).data('position') === 4) {
                temp = $(temp).attr('name', 'servtime1[4][open]');
                temp2 = $(temp2).attr('name', 'servtime1[4][close]');
            }
            if ($(this).data('position') === 5) {
                temp = $(temp).attr('name', 'servtime1[5][open]');
                temp2 = $(temp2).attr('name', 'servtime1[5][close]');
            }
            if ($(this).data('position') === 6) {
                temp = $(temp).attr('name', 'servtime1[6][open]');
                temp2 = $(temp2).attr('name', 'servtime1[6][close]');
            }
            if ($(this).data('position') === 7) {
                temp = $(temp).attr('name', 'servtime1[7][open]');
                temp2 = $(temp2).attr('name', 'servtime1[7][close]');
            }

            $(this).closest('tr').find('td').eq(1).append('<br/>')
                .append(temp);
            $(this).closest('tr').find('td').eq(2).append('<br/>')
                .append(temp2);

            $(this).hide('slow', function () {
            });
        });
        /*=============================================================================
         */
        $('#btn-addMoreOwner').click(function () {
            $(this).text('Please wait.....');
            $.ajax({
                url: '<?php echo(site_url("restaurants/owner_entryform")) ?>',
                dataType: 'html'

            })
                .done(function (data) {
                    $('#btn-addMoreOwner').text('Add More owner');
                    $('#containerOwner').html(data);
                    $('#btn-addMoreOwner').hide('slow', function () {

                    });
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });

        });
        /*=======================================================================*/
        total();

        $('body').on('keyup', '.estimate_cost_topic', function () {

            total();
        });

        $('#btn_servesave').click(function () {
            insertIntoServe('serve_form', 'btn_servesave', 'serve_checkbox');
        });
        $('#btn_cuisineByFoodSave').click(function () {

            insertIntoCuisineByFood('form-cuisineByFood', 'btn_cuisineByFoodSave', 'btn_addCousinByFood');
        });
        $('#btn_estdtypesave').click(function () {
            insertIntoEstType('estd_typeform', 'btn_estdtypesave', 'btn_establishmentType')
        });

        $('#btn_facilitysave').click(function () {
            insertIntoFacilitis('facility_form', 'btn_facilitysave', 'btn_facilities')
        });

        $('#btn_cousinsave').click(function () {

            insertIntoCousins('cousin_form', 'btn_cousinsave', 'btn_addCousin');
        });

        $('#btn_popDishSave').click(function () {
            insertIntoPopularDish('popdishform', 'btn_popDishSave', 'btn_addPopDish')
        });
        /*==============================================================*/

        $('#btn_addPopDish').click(function () {

            $('#mdl_populardish').modal('show');
        });

        $('#btn_addCousin').click(function () {
            $('#mdl_cousin').modal('show');
        });

        $('#btn_facilities').click(function () {
            $('#mdl_facility').modal('show');
        });

        $('#btn_establishmentType').click(function () {

            $('#mdl_establishmentType').modal('show');
        });

        $('#btn_addServe').click(function () {
            $('#mdl-addserve').modal('show');
        });
        /*=================================================================================*/
        $('#city_suggest').keyup(function () {
            $.ajax({
                url: '<?php echo(site_url("place/suggest")) ?>',
                type: 'POST',
                dataType: 'html',
                data: $(this).val(),
                success: function (data) {

                    $('#est_city').empty();
                    $('#est_city').append(data);
                }
            })
                .done(function () {
                    console.log("success");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });

        });
        /*=======================================================================================*/
        $('#area_suggest').keyup(function () {
            $.ajax({
                url: '<?php echo(site_url("place/suggest")) ?>',
                type: 'POST',
                dataType: 'html',
                data: $(this).val(),
                success: function (data) {

                    $('#est_area').empty();
                    $('#est_area').append(data);
                }
            })
                .done(function () {
                    console.log("success");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });

        });

    });
    /*=============================================================================*/
    $('#open_time_all').focusout(function () {
        $('.open_time').val($(this).val());
    });
    $('#close_time_all').focusout(function () {
        $('.close_time').val($(this).val());
    });
    /*=============================================================================*/

    $('#open_time_all1').focusout(function () {
        $('.open_time1').val($(this).val());
    });
    $('#close_time_all1').focusout(function () {
        $('.close_time1').val($(this).val());
    });
    /*=============================================================================*/
    $('#open_time_all2').focusout(function () {
        $('.open_time2').val($(this).val());
    });
    $('#close_time_all2').focusout(function () {
        $('.close_time2').val($(this).val());
    });
    /*=============================================================================*/
    $('#start_time_all').focusout(function () {
        $('.start_time').val($(this).val());
    });
    $('#end_time_all').focusout(function () {
        $('.end_time').val($(this).val());
    });
    /*================================================================================*/
    function maxLengthCheck(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }
    function insertIntoCuisineByFood(form_id, button_id, cousin_id) {
        disable_button(button_id, 'Saving');

        $.ajax({
            url: '<?php echo(site_url("Cousin/add_cousinebyfood")) ?>',
            dataType: 'json',
            type: 'post',
            data: $('#' + form_id).serialize(),
            success: function (data) {
                console.log(data);
                if (data.status == true) {
                    enable_button(button_id, 'Save');
                    var temp_checkbox = '<label class="checkbox-inline">';
                    temp_checkbox += '<input type="checkbox" name="foods[]" class="foods" value="' + data.data.food_id + '">' + data.data.food + '</label>';

                    $('#cuisineByFoodCheckBox').append(temp_checkbox);
                    $('#' + form_id)[0].reset();
                    $('#mdl_cuisineByFood').modal('hide');

                }
                else {
                    $.each(data, function (index, val) {
                        $('#' + form_id + ' #' + val.error_string).next().html(val.input_error);
                        $('#' + form_id + ' #' + val.error_string).parent().parent().addClass('has-error');
                    });

                    enable_button(button_id, 'Save');
                }

            }
        })

            .fail(function () {

                enable_button(button_id, 'Add New');
            });
    }

    function insertIntoServe(form_id, button_id, serve_id) {
        disable_button(button_id, 'Saving');

        $.ajax({
            url: '<?php echo(site_url("serve/add")) ?>',
            dataType: 'json',
            type: 'post',
            data: $('#' + form_id).serialize(),
            success: function (data) {
                console.log(data);
                if (data.status === true) {
                    enable_button(button_id, 'Save');
                    var temp_checkbox = '<label class="checkbox-inline">';
                    temp_checkbox += '<input type="checkbox" name="serves[]" value="' + data.data.serves_id + '">' + data.data.serves_name + '</label>';

                    $('#serve_checkbox').append(temp_checkbox);
                    $('#' + form_id)[0].reset();
                    $('#mdl-addserve').modal('hide');

                }
                else {
                    $.each(data, function (index, val) {
                        $('#' + form_id + ' #' + val.error_string).next().html(val.input_error);
                        $('#' + form_id + ' #' + val.error_string).parent().parent().addClass('has-error');
                    });

                    enable_button(button_id, 'Save');
                }
            }
        })

            .fail(function () {

                enable_button(button_id, 'Save');
            });
    }

    function insertIntoEstType(form_id, button_id, estd_typeid) {
        disable_button(button_id, 'Saving');

        $.ajax({
            url: '<?php echo(site_url("establishment_type/add")) ?>',
            dataType: 'json',
            type: 'post',
            data: $('#' + form_id).serialize(),
            success: function (data) {
                console.log(data);
                if (data.status == true) {
                    enable_button(button_id, 'Save');

                    var temp_checkbox = '<label class="checkbox-inline">';
                    temp_checkbox += '<input type="checkbox" name="establishment_type[]" value="' + data.data.type_id + '">' + data.data.type + '</label>';

                    $('#estd_checkbox').append(temp_checkbox);
                    $('#' + form_id)[0].reset();
                    $('#mdl_establishmentType').modal('hide');

                }
                else {
                    $.each(data, function (index, val) {
                        $('#' + form_id + ' #' + val.error_string).next().html(val.input_error);
                        $('#' + form_id + ' #' + val.error_string).parent().parent().addClass('has-error');
                    });

                    enable_button(button_id, 'Save');
                }

            }
        })

            .fail(function () {

                enable_button(button_id, 'Save');
            });
    }

    function insertIntoFacilitis(form_id, button_id, facility_id) {
        disable_button(button_id, 'Saving');

        $.ajax({
            url: '<?php echo(site_url("facility/add")) ?>',
            dataType: 'json',
            type: 'post',
            data: $('#' + form_id).serialize(),
            success: function (data) {
                console.log(data);
                if (data.status == true) {

                    enable_button(button_id, 'Save');

                    var temp_checkbox = '<label class="checkbox-inline">';
                    temp_checkbox += '<input type="checkbox" name="facility[]" value="' + data.data.facilities_id + '">' + data.data.facility + '</label>';

                    $('#facility_checkbox').append(temp_checkbox);
                    $('#' + form_id)[0].reset();
                    $('#mdl_facility').modal('hide');

                }
                else {
                    $.each(data, function (index, val) {
                        $('#' + form_id + ' #' + val.error_string).next().html(val.input_error);
                        $('#' + form_id + ' #' + val.error_string).parent().parent().addClass('has-error');
                    });

                    enable_button(button_id, 'Save');
                }
            }
        })

            .fail(function () {

                enable_button(button_id, 'Save');
            });
    }

    function insertIntoCousins(form_id, button_id, cousin_id) {
        disable_button(button_id, 'Saving');

        $.ajax({
            url: '<?php echo(site_url("Cousin/add")) ?>',
            dataType: 'json',
            type: 'post',
            data: $('#' + form_id).serialize(),
            success: function (data) {
                console.log(data);
                if (data.status == true) {
                    enable_button(button_id, 'Save');
                    var temp_checkbox = '<label class="checkbox-inline">';
                    temp_checkbox += '<input type="checkbox" name="cousins[]" value="' + data.data.cousin_id + '">' + data.data.cousin + '</label>';

                    $('#cousin_checkbox').append(temp_checkbox);
                    $('#' + form_id)[0].reset();
                    $('#mdl_cousin').modal('hide');

                }
                else {
                    $.each(data, function (index, val) {
                        $('#' + form_id + ' #' + val.error_string).next().html(val.input_error);
                        $('#' + form_id + ' #' + val.error_string).parent().parent().addClass('has-error');
                    });

                    enable_button(button_id, 'Save');
                }

            }
        })

            .fail(function () {

                enable_button(button_id, 'Add New');
            });
    }

    function insertIntoPopularDish(form_id, button_id, dish_id) {
        disable_button(button_id, 'Saving');

        $.ajax({
            url: '<?php echo(site_url("pop_dish/add")) ?>',
            dataType: 'json',
            type: 'post',
            data: $('#' + form_id).serialize(),
            success: function (data) {
                if (data.status == true) {
                    enable_button(button_id, 'Save');

                    var temp_checkbox = '<label class="checkbox-inline">';
                    temp_checkbox += '<input type="checkbox" name="pop_dishes[]" value="' + data.data.pop_dishes_id + '">' + data.data.pop_dishes + '</label>';

                    $('#populardish_checkbox').append(temp_checkbox);
                    $('#' + form_id)[0].reset();
                    $('#mdl_populardish').modal('hide');
                }
                else {
                    $.each(data, function (index, val) {
                        $('#' + form_id + ' #' + val.error_string).next().html(val.input_error);
                        $('#' + form_id + ' #' + val.error_string).parent().parent().addClass('has-error');
                    });

                    enable_button(button_id, 'Save');
                }


            }
        })

            .fail(function () {

                enable_button(button_id, 'Save');
            });
    }

    function disable_button(id, text='') {
        $('#' + id).prop('disabled', true);
        if (text != '') {
            $('#' + id).text(text + '...........');
        }
        ;
    }

    function enable_button(id, text='') {
        $('#' + id).prop('disabled', false);
        if (text != '') {
            $('#' + id).text(text);
        }
        ;
    }

    function total() {
        var temp = 0;
        $('input[name^="estimate_cost_topic"]').each(function () {
            var val = $(this).val();
            if (val) {
                temp = temp + parseFloat(val);
            }
            ;

        });
        $('#total').val(temp.toFixed(2));

    }

    function add_costTopic(button_id, table_name='') {
        disable_button(button_id, 'Saving..........');
        $.ajax({
            url: '<?php echo(site_url("cost_topic/add")) ?>',
            type: 'POST',
            dataType: 'json',
            data: $('#form-costTopic').serialize(),
        })
            .done(function (data) {

                if (data.status == true) {

                    $('#form-costTopic')[0].reset();
                    $('#mdl-costTopic').modal('hide');
                    var temp = "<tr><td>" + data.data[0].topic + "</td>";
                    temp += '<td><input type="number" name="estimate_cost_topic[' + data.data[0].topic_id + ']" class="estimate_cost_topic form-control" ></td></tr>';

                    $('#' + table_name).find('tr:last').prev().after(temp);
                    enable_button(button_id, 'Save');
                }
                else {
                    $.each(data, function (index, val) {
                        $('#form-costTopic' + ' #' + val.error_string).next().html(val.input_error);
                        $('#form-costTopic' + ' #' + val.error_string).parent().parent().addClass('has-error');
                    });

                    enable_button(button_id, 'Save');
                }
                console.log("success");
            })
            .fail(function () {
                enable_button(button_id, 'Save');
                console.log("error");
            })
            .always(function () {

                console.log("complete");
            });

    }

    function parking_check() {
        if ($('#parking_yes').is(':checked')) {
            $('.parking_options').parent('label').show();
        }
        else {
            $('.parking_options').prop('checked', false);
            $('.parking_options').parent('label').hide();

        }
    }


</script>
<script>
    $('#est_city').change(function () {
        var city = $(this).val();
        $.ajax({
            url: '<?php echo base_url('dataentry/getAreaDropDown/') ?>/' + city,
            success: function (data) {
                $('#est_area_div').html(data);
            }
        })
    });
    $('body').on('change', '#est_area', function () {
        var area = $(this).val();
        $.ajax({
            url: '<?php echo base_url('dataentry/getStreetDropDown/') ?>/' + area,
            success: function (data) {
                $('#est_street_div').html(data);
            }
        })
    })
</script>
<script>
    $(".multi_outlets").change(function () {
        var v = $(this).val();
        if (v == 0) {
            $('#outlets_no').val(0);
            $('#outlets_no').hide();
            $('#otdetails').hide();
        } else {
            $('#outlets_no').show();
            $('#otdetails').show();
        }
    })
</script>

