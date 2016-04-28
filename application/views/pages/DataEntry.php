<div class="container" style="background-color: #f0f0f0">
    <form method="post" action="<?php echo base_url('index.php/dataentry/insert') ?>">
        <div class="row header" style="background-color:#1b6d85; color: white; box-shadow: 0px 2px 5px #888888;">
            <div class="col-md-12">
                <h2 class="text-center">SCOOT OUT DATA ENTRY FORM</h2></p>
            </div>
        </div>
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
                                <div class="form-group input-group">
                                    <span class="input-group-addon">98</span>
                                    <input maxlength="8" oninput="maxLengthCheck(this)" type="number" class="form-control" name="res_mobile1"
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
                                <div class="form-group input-group">
                                    <span class="input-group-addon">98</span>
                                    <input name="res_mobile2" type="number" maxlength="8" oninput="maxLengthCheck(this)" value="<?php echo set_value('res_mobile2') ?>" type="text"
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
                                    <span class="input-group-addon">09</span>
                                    <input type="number" name="res_landline1" maxlength="10" oninput="maxLengthCheck(this)" value="<?php echo set_value('res_landline1') ?>"
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
                                    <span class="input-group-addon">09</span>
                                    <input type="number" name="res_landline2" maxlength="10" oninput="maxLengthCheck(this)" value="<?php echo set_value('res_landline2') ?>"
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
                <div class="well-sm well">
                    <table class="table table-bordered">
                        <th colspan="2">Map(Coordinates)</th>
                        <tr>
                            <td>
                                Latitude
                            </td>
                            <td>
                                <input type="text" name="res_lat" value="<?php echo set_value('res_lat') ?>"
                                       class="form-control">
                                <?php echo form_error('res_lat'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Longitude
                            </td>
                            <td>
                                <input type="text" name="res_lon" value="<?php echo set_value('res_lon') ?>"
                                       class="form-control">
                                <?php echo form_error('res_lon'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Present in google Map
                            </td>
                            <td>
                                <input type="checkbox" name="res_map" value="1">
                                <?php echo form_error('res_map'); ?>
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
                                <input type="text" name="owners_name" value="<?php echo set_value('owners_name') ?>"
                                       class="form-control">
                                <?php echo form_error('owners_name'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Designation
                            </td>
                            <td>
                                <input type="text" name="owners_designation"
                                       value="<?php echo set_value('owners_designation') ?>" class="form-control">
                                <?php echo form_error('owners_designation'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mobile 1
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">98</span>
                                    <input type="text" name="owners_mobile1" maxlength="8" oninput="maxLengthCheck(this)" value="<?php echo set_value('owners_mobile1') ?>"
                                       class="form-control">
                                </div>
                                <?php echo form_error('owners_mobile1'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mobile 2
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">98</span>
                                    <input type="text" name="owners_mobile2" maxlength="8" oninput="maxLengthCheck(this)"
                                       value="<?php echo set_value('owners_mobile2') ?>"
                                       class="form-control">
                                </div>
                                <?php echo form_error('owners_mobile2'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Land line1
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">09</span>
                                    <input type="text" name="owners_landline1" maxlength="8" oninput="maxLengthCheck(this)"
                                       value="<?php echo set_value('owners_landline1') ?>"
                                       class="form-control">
                                </div>
                                <?php echo form_error('owners_landline1'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Land line2
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">09</span>
                                    <input type="text" name="owners_landline2" maxlength="8" oninput="maxLengthCheck(this)"
                                       value="<?php echo set_value('owners_landline2') ?>"
                                       class="form-control">
                                </div>
                                <?php echo form_error('owners_landline2'); ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="well-sm well">
                    <table class="table table-bordered">
                        <th colspan="2">Establishment Location</th>
                        <tr>
                            <td>
                                City
                            </td>
                            <td>
                                <input list="est_city" id="city_suggest" name="est_city" value="<?php echo set_value('est_city') ?>"
                                       class="form-control">
                                       <datalist id="est_city">
                                           
                                       </datalist>
                                <?php echo form_error('est_city'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Area
                            </td>
                            <td>
                                <input type="text" name="est_area" value="<?php echo set_value('est_area') ?>"
                                       class="form-control">
                                <?php echo form_error('est_area'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Street
                            </td>
                            <td>
                                <input type="text" name="est_street" value="<?php echo set_value('est_street') ?>"
                                       class="form-control">
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
                <div class="well-sm well" id="serve_checkbox">
                    <b>Serves: </b>
                    <?php foreach ($serves as $ser) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="serves[]"
                                   value="<?php echo $ser->serves_id ?>"><?php echo $ser->serves_name ?>
                        </label>
                        <?php
                    } ?>
                    <?php echo form_error('serves'); ?>
                    <button type="button" id="btn_addServe" class="btn btn-info"><i class="fa fa-plus fa"></i> Add New</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="well-sm well">
                    <table class="table table-bordered">
                        <tr>
                            <th>

                            </th>
                            <th>
                                Opening Time
                            </th>
                            <th>
                                Closing Time
                            </th>
                        </tr>
                        <tr>
                            <td>if same all weeks</td>
                            <td><input id="open_time_all" type="text" class="form-control"></td>
                            <td><input id="close_time_all" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Sunday</td>
                            <td><input name="servtime[1][open]" type="text" class="form-control open_time"></td>
                            <td><input name="servtime[1][close]" type="text" class="form-control close_time"></td>
                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td><input name="servtime[2][open]" type="text" class="form-control open_time"></td>
                            <td><input name="servtime[2][close]" type="text" class="form-control close_time"></td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td><input name="servtime[3][open]" type="text" class="form-control open_time"></td>
                            <td><input name="servtime[3][close]" type="text" class="form-control close_time"></td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td><input name="servtime[4][open]" type="text" class="form-control open_time"></td>
                            <td><input name="servtime[4][close]" type="text" class="form-control close_time"></td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td><input name="servtime[5][open]" type="text" class="form-control open_time"></td>
                            <td><input name="servtime[5][close]" type="text" class="form-control close_time"></td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td><input name="servtime[6][open]" type="text" class="form-control open_time"></td>
                            <td><input name="servtime[6][close]" type="text" class="form-control close_time"></td>
                        </tr>

                        <tr>
                            <td>Saturday</td>
                            <td><input name="servtime[7][open]" type="text" class="form-control open_time"></td>
                            <td><input name="servtime[7][close]" type="text" class="form-control close_time"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="well-sm well">
                    <table class="table table-bordered">
                        <tr>
                            <th colspan="2">
                                Cost(Lunch, dinner or breakfast) for two
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
                            <td class="text-bold">
                                Total
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
                        <input type="checkbox" name="res_parking"
                               value="1">Yes
                    </label>
                    <hr/>

                    <label class="checkbox-inline">
                        <input type="checkbox" name="res_parking2"
                               value="1">Two Wheeler
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="res_parking4"
                               value="1">Four Wheeler
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well">
                    <b> Establishment Type:</b>
                    <hr/>
                    <?php foreach ($establishment_types as $est) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="establishment_type[]"
                                   value="<?php echo $est->type_id ?>"><?php echo $est->type ?>
                        </label>
                        <?php
                    } ?>
                    <button type="button" id="btn_establishmentType" class="btn btn-info"> Add New</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well" id="facility_checkbox">
                    <b> Facilities :</b>
                    <hr/>
                    <?php foreach ($facilities as $fac) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="facilities[]"
                                   value="<?php echo $fac->facilities_id ?>"><?php echo $fac->facility ?>
                        </label>
                        <?php
                    } ?>
                    <button type="button" id="btn_facilities" class="btn btn-info"> Add New</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well">
                    <b> Offers: </b>
                    <hr/>
                    <label class="checkbox-inline">
                        <input type="radio" name="serves[]" value="yes"> Yes
                    </label>
                    <label class="checkbox-inline">
                        <input type="radio" name="serves[]" value="yes"> No
                    </label>
                    <label class="checkbox-inline">
                        <input type="radio" name="serves[]" value="yes"> Occasional
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well">
                    <table class="table table-bordered">
                        <tr>
                            <th>

                            </th>
                            <th>
                                Start Time
                            </th>
                            <th>
                                End Time
                            </th>
                        </tr>
                        <tr>
                            <td>if same all weeks</td>
                            <td><input type="text" class="form-control" id="start_time_all"></td>
                            <td><input type="text" class="form-control" id="end_time_all"></td>
                        </tr>
                        <tr>
                            <td>Sunday</td>
                            <td><input name="happyhours[1][start]" type="text" class="form-control start_time"></td>
                            <td><input name="happyhours[1][end]" type="text" class="form-control end_time"></td>
                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td><input name="happyhours[2][start]" type="text" class="form-control start_time"></td>
                            <td><input name="happyhours[2][end]" type="text" class="form-control end_time"></td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td><input name="happyhours[3][start]" type="text" class="form-control start_time"></td>
                            <td><input name="happyhours[3][end]" type="text" class="form-control end_time"></td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td><input name="happyhours[4][start]" type="text" class="form-control start_time"></td>
                            <td><input name="happyhours[4][end]" type="text" class="form-control end_time"></td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td><input name="happyhours[5][start]" type="text" class="form-control start_time"></td>
                            <td><input name="happyhours[5][end]" type="text" class="form-control end_time"></td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td><input name="happyhours[6][start]" type="text" class="form-control start_time"></td>
                            <td><input name="happyhours[6][end]" type="text" class="form-control end_time"></td>
                        </tr>

                        <tr>
                            <td>Saturday</td>
                            <td><input name="happyhours[7][start]" type="text" class="form-control start_time"></td>
                            <td><input name="happyhours[7][end]" type="text" class="form-control end_time"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well">
                    <b> Cousins by Country :</b>
                    <hr/>
                    <?php foreach ($cousins as $Cousin) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="cousins[]"
                                   value="<?php echo $Cousin->cousin_id ?>"><?php echo $Cousin->cousin ?>
                        </label>
                        <?php
                    } ?>
                    <button type="button" id="btn_addCousin" class="btn btn-info"><i class="fa fa-plus fa"></i> Add New</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well">
                    <b> Cousins by Food :</b>
                    <hr/>
                    <?php foreach ($foods as $food) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="foods[]"
                                   value="<?php echo $food->food_id ?>"><?php echo $food->food ?>
                        </label>
                        <?php
                    } ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well">
                    <b> Popular Dish:</b>
                    <hr/>
                    <?php foreach ($pop_dishes as $pop) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="pop_dishes[]"
                                   value="<?php echo $pop->pop_dishes_id ?>"><?php echo $pop->pop_dishes ?>
                        </label>
                        <?php
                    } ?>
                    <button type="button" id="btn_addPopDish" class="btn btn-info"><i class="fa fa-plus fa"></i> Add New</button>
                </div>
            </div>
        </div>

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
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
<style>
    hr {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .error {
        color: red;
    }
</style>

<div class="modal fade" id="mdl-addserve">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        total();

       $('.estimate_cost_topic').keyup(function() {

          total();
       });
        
        $('#btn_addServe').click(function() {
            $('#mdl-addserve').modal('show');
        });    

        $('#city_suggest').keyup(function() {
            $.ajax({
                url: '<?php echo(site_url("place/suggest")) ?>',
                type: 'POST',
                dataType:'html',
                data: $(this).val(),
                success:function(data)
                {
                   
                    $('#est_city').empty();
                    $('#est_city').append(data);
                }
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        });
    });

    $('#open_time_all').change(function () {
        $('.open_time').val($(this).val());
    })
    $('#close_time_all').change(function () {
        $('.close_time').val($(this).val());
    })

    $('#start_time_all').change(function () {
        $('.start_time').val($(this).val());
    })
    $('#end_time_all').change(function () {
        $('.end_time').val($(this).val());
    })

    function maxLengthCheck(object)
    {
        if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
    }

    function insertIntoServe(form_id,button_id,serve_id)
    {
        disable_button(button_id,'Saving');

        $.ajax({
            url: '<?php echo(site_url("serve/add")) ?>',
            dataType:'json',
            data:$('#'+form_id).serialize(),
            success:function(data)
            {
                console.log(data);
                    if (data.status===true)
                    {
                        enable_button(button_id,'Add New');

                        var temp_checkbox='<label class="checkbox-inline">';
                            temp_checkbox+='<input type="checkbox" name="serves[]" value="'+data.serves_id+'">'+data.serves_name+'</label>';
                      
                        $('#'+serve_id).append(temp_checkbox);
                    };
            }
        })
        
        .fail(function() {

            enable_button(button_id,'Add New');
        });
    }

    function insertIntoEstType(form_id,button_id,estd_typeid)
    {
        disable_button(button_id,'Saving');

        $.ajax({
            url: '<?php echo(site_url("establishment_type/add")) ?>',
            dataType:'json',
            data:$('#'+form_id).serialize(),
            success:function(data)
            {
                console.log(data);
                    if (data.status===true)
                    {
                        enable_button(button_id,'Add New');

                        var temp_checkbox='<label class="checkbox-inline">';
                            temp_checkbox+='<input type="checkbox" name="establishment_type[]" value="'+data.type_id+'">'+data.type+'</label>';
                      
                        $('#'+estd_typeid).append(temp_checkbox);
                    };
            }
        })
        
        .fail(function() {

            enable_button(button_id,'Add New');
        });
    }

    function insertIntoFacilitis(form_id,button_id,facility_id)
    {
        disable_button(button_id,'Saving');

        $.ajax({
            url: '<?php echo(site_url("facility/add")) ?>',
            dataType:'json',
            data:$('#'+form_id).serialize(),
            success:function(data)
            {
                console.log(data);
                    if (data.status===true)
                    {
                        enable_button(button_id,'Add New');

                        var temp_checkbox='<label class="checkbox-inline">';
                            temp_checkbox+='<input type="checkbox" name="facility[]" value="'+data.facilities_id+'">'+data.facility+'</label>';
                      
                        $('#'+facility_id).append(temp_checkbox);
                    };
            }
        })
        
        .fail(function() {

            enable_button(button_id,'Add New');
        });
    }

    function insertIntoCousins(form_id,button_id,cousin_id)
    {
        disable_button(button_id,'Saving');

        $.ajax({
            url: '<?php echo(site_url("Cousin/add")) ?>',
            dataType:'json',
            data:$('#'+form_id).serialize(),
            success:function(data)
            {
                console.log(data);
                    if (data.status===true)
                    {
                        enable_button(button_id,'Add New');

                        var temp_checkbox='<label class="checkbox-inline">';
                            temp_checkbox+='<input type="checkbox" name="cousins[]" value="'+data.cousin_id+'">'+data.cousin+'</label>';
                      
                        $('#'+cousin_id).append(temp_checkbox);
                    };
            }
        })
        
        .fail(function() {

            enable_button(button_id,'Add New');
        });
    }

    function insertIntoPopularDish(form_id,button_id,dish_id)
    {
        disable_button(button_id,'Saving');

        $.ajax({
            url: '<?php echo(site_url("Cousin/add")) ?>',
            dataType:'json',
            data:$('#'+form_id).serialize(),
            success:function(data)
            {
                console.log(data);
                    if (data.status===true)
                    {
                        enable_button(button_id,'Add New');

                        var temp_checkbox='<label class="checkbox-inline">';
                            temp_checkbox+='<input type="checkbox" name="pop_dishes[]" value="'+data.pop_dishes_id+'">'+data.pop_dishes+'</label>';
                      
                        $('#'+dish_id).append(temp_checkbox);
                    };
            }
        })
        
        .fail(function() {

            enable_button(button_id,'Add New');
        });
    }

    function disable_button (id,text='')
    {
        $('#'+id).prop('disabled', true);
        if (text!='')
         {
            $('#'+id).text(text+'...........');
         };
    }

    function enable_button (id,text='')
    {
        $('#'+id).prop('disabled', false);
        if (text!='')
         {
            $('#'+id).text(text);
         };
    }

    function total()
    {
        var temp=0;
        $('input[name^="estimate_cost_topic"]').each(function() {
            var val=$(this).val();
            if (val) 
            {
                 temp=temp+parseFloat(val);
            };
           
        });
        $('#total').val(temp.toFixed(2));
        
    }


</script>

