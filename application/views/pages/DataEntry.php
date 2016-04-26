<div class="container" style="background-color: #f0f0f0">
    <form method="post" action="<?php echo base_url('index.php/dataentry/insert') ?>">
        <div class="row header" style="background-color:#1b6d85; color: white; box-shadow: 0px 2px 5px #888888;">
            <div class="col-md-12">
                <h2 class="text-center">SCOOT OUT DATA ENTRY FORM</h2></p>
            </div>
        </div>
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
                                <input maxlength="10" type="number" name="res_mobile1"
                                       value="<?php echo set_value('res_mobile1') ?>"
                                       class="form-control phone">
                                <?php echo form_error('res_mobile1'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mobile 2
                            </td>
                            <td>
                                <input name="res_mobile2" value="<?php echo set_value('res_mobile2') ?>" type="text"
                                       class="form-control phone">
                                <?php echo form_error('res_mobile2'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Land line1
                            </td>
                            <td>
                                <input type="text" name="res_landline1" value="<?php echo set_value('res_landline1') ?>"
                                       class="form-control">
                                <?php echo form_error('res_landline1'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Land line2
                            </td>
                            <td>
                                <input type="text" name="res_landline2" value="<?php echo set_value('res_landline2') ?>"
                                       class="form-control">
                                <?php echo form_error('res_landline2'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Website
                            </td>
                            <td>
                                <input type="text" name="res_website" value="<?php echo set_value('res_website') ?>"
                                       class="form-control">
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
                                <input type="text" name="owners_mobile1"
                                       value="<?php echo set_value('owners_mobile1') ?>"
                                       class="form-control">
                                <?php echo form_error('owners_mobile1'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mobile 2
                            </td>
                            <td>
                                <input type="text" name="owners_mobile2"
                                       value="<?php echo set_value('owners_mobile2') ?>"
                                       class="form-control">
                                <?php echo form_error('owners_mobile2'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Land line1
                            </td>
                            <td>
                                <input type="text" name="owners_landline1"
                                       value="<?php echo set_value('owners_landline1') ?>"
                                       class="form-control">
                                <?php echo form_error('owners_landline1'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Land line2
                            </td>
                            <td>
                                <input type="text" name="owners_landline2"
                                       value="<?php echo set_value('owners_landline2') ?>"
                                       class="form-control">
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
                                <input type="text" name="est_city" value="<?php echo set_value('est_city') ?>"
                                       class="form-control">
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
                <div class="well-sm well">
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
                            <td><input name="servtime[1][open]" type="text" class="form-control"></td>
                            <td><input name="servtime[1][close]" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td><input name="servtime[2][open]" type="text" class="form-control"></td>
                            <td><input name="servtime[2][close]" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td><input name="servtime[3][open]" type="text" class="form-control"></td>
                            <td><input name="servtime[3][close]" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td><input name="servtime[4][open]" type="text" class="form-control"></td>
                            <td><input name="servtime[4][close]" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td><input name="servtime[5][open]" type="text" class="form-control"></td>
                            <td><input name="servtime[5][close]" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td><input name="servtime[6][open]" type="text" class="form-control"></td>
                            <td><input name="servtime[6][close]" type="text" class="form-control"></td>
                        </tr>

                        <tr>
                            <td>Saturday</td>
                            <td><input name="servtime[7][open]" type="text" class="form-control"></td>
                            <td><input name="servtime[7][close]" type="text" class="form-control"></td>
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
                                    <input type="text" name="estimate_cost_topic[<?php echo $topic->topic_id ?>]" class="form-control">
                                </td>
                            </tr>
                            <?php
                        } ?>
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
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well">
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
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Sunday</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>

                        <tr>
                            <td>Saturday</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
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
                            <input type="checkbox" name="serves[]"
                                   value="<?php echo $Cousin->cousin_id ?>"><?php echo $Cousin->cousin ?>
                        </label>
                        <?php
                    } ?>
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
                            <input type="checkbox" name="serves[]"
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
                            <input type="checkbox" name="serves[]"
                                   value="<?php echo $pop->pop_dishes_id ?>"><?php echo $pop->pop_dishes ?>
                        </label>
                        <?php
                    } ?>
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

