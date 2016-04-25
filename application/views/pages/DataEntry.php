<div class="container" style="background-color: #f5f5f5">
    <form>
        <div class="row" style="padding: 15px">
            <div class="col-md-12">
                <h1 class="text-center">Scoot Out Data Entry</h1></p>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label>Restaurant Name</label>
                        <textarea name="res_name" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="well-sm well">
                    <div class="form-group">
                        <label>Mobile 1</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mobile 2</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Land line1</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Land line2</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="well-sm well">
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Present in google Map</label>
                        <input type="checkbox">
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="well-sm well">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mobile 1</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mobile 2</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Land line1</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Land line2</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="well-sm well">
                    <div class="form-group">
                        <label>Establishment Location: City:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Area</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Street</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Landmark</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Others(Building's Name):</label>
                        <input type="text" class="form-control">
                    </div>
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
                                    <input type="text" class="form-control">
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
                    <b> Facilities :</b>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="serves[]"
                               value="1">Yes
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="serves[]"
                               value="1">Two Wheeler
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="serves[]"
                               value="1">Four Wheeler
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well">
                   <b> Establishment Type:</b>
                    <?php foreach ($establishment_types as $est) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="serves[]" value="<?php echo $est->type_id ?>"><?php echo $est->type ?>
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
                    <?php foreach ($facilities as $fac) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="serves[]" value="<?php echo $fac->facilities_id ?>"><?php echo $fac->facility ?>
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
                    <?php foreach ($cousins as $Cousin) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="serves[]" value="<?php echo $Cousin->cousin_id ?>"><?php echo $Cousin->cousin ?>
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
                    <?php foreach ($foods as $food) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="serves[]" value="<?php echo $food->food_id?>"><?php echo $food->food ?>
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
                    <?php foreach ($pop_dishes as $pop) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="serves[]" value="<?php echo $pop->pop_dishes_id ?>"><?php echo $pop->pop_dishes ?>
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
                        <textarea class="form-control"></textarea>
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
