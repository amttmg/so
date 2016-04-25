<div class="container" style="background-color: #f5f5f5">
    <form>
        <div class="row" style="padding: 15px">
            <div class="col-md-12">
                <h1 class="text-center">Scoot Out Data Entry</h1></p>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label>Restaurant Name</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <div class="well">
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
            </div>
            <div class="col-md-6">
                <div class="well">
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
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <div class="well">
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
                <div class="well">
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
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <h4>Serves: </h4>
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
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <div class="well">
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
                <div class="well">
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
        <hr/>
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </form>
</div>
