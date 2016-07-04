<!-- <div class="container" style="background-color: #f0f0f0"> -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                        <th>Restaurant Name <button type="button" id="btn-editRname" class="btn btn-sm btn-primary pull-right"><i class="fa fa-edit fa"></i>&nbsp&nbspEdit</button></th>
                        </tr>
                        <tr>
                            <td>
                                <h1 id="res_name"><?php echo($restaurants->res_name)  ?></h1>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#btn-editRname').click(function() {
                        $('#restaurant_name').val($('#res_name').text());
                        $('#modal-updateRestaurantName').modal('show');
                    });

                    $('#btn-updateRestaurantName').click(function() {
                        $(this).text('Updating.......');
                        $(this).prop('disabled',true);
                        $.ajax({
                            url: '<?php echo(site_url("restaurants/update_name/".$this->uri->segment(3))) ?>',
                            type: 'POST',
                            data: {name:$('#restaurant_name').val()}
                        })
                        .done(function() {
                            location.reload(true);
                        })
                        .fail(function() {
                            $('#btn-updateRestaurantName').text('error')
                            .addClass('btn-danger');
                            console.log("error");
                        })
                        .always(function() {
                            console.log("complete");
                        });
                        
                    });
                });
            </script>
            <div class="row">
                <div class="col-md-6">
                    <div class="well-sm well">
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2">Establishment's Contact Number
                                    <div class="pull-right">
                                        <button type="button" id="btn-estdcontactedit" class="btn btn-xs btn-primary">
                                            <i class="fa fa-edit fa"></i>&nbsp&nbspEdit
                                        </button>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    Mobile 1
                                </td>
                                <td>
                                    <?php echo($restaurants->mobile1) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mobile 2
                                </td>
                                <td>
                                    <?php echo($restaurants->mobile2) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Land line1
                                </td>
                                <td>
                                    <?php echo($restaurants->landline1 ? '01' . $restaurants->landline1 : '') ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Land line2
                                </td>
                                <td>
                                    <?php echo($restaurants->landline2 ? '01' . $restaurants->landline2 : '') ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Website
                                </td>
                                <td>
                                    <?php echo($restaurants->website ? 'www.' . $restaurants->website : '') ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email
                                </td>
                                <td>
                                    <?php echo($restaurants->email) ?>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="well-sm well">
                        <table class="table table-bordered">
                            <th colspan="2">Map(Coordinates)
                                <div class="pull-right">
                                    <button type="button" id="btn-editmapcoordinate" class="btn btn-xs btn-primary">
                                        <i class="fa fa-edit fa"></i>&nbsp&nbsp
                                        Edit
                                    </button>
                                </div>
                            </th>
                            <tr>
                                <td>
                                    Latitude
                                </td>
                                <td>
                                    <?php echo('27.' . $restaurants->lat) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Longitude
                                </td>
                                <td>
                                    <?php echo('85.' . $restaurants->lon) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Present in google Map
                                </td>
                                <td>
                                    <!-- <input type="checkbox" name="res_map" value="1"> -->

                                    <?php echo($restaurants->google_map ? "Yes" : "No") ?>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well-sm well">
                        <table class="table table-bordered">
                            <th colspan="2">Owner's or manager Restaurant Number
                                <div class="pull-right">
                                    <button type="button" id="btn-addOwner" class="btn btn-xs btn-primary"><span
                                            class="fa fa-plus"></span>&nbsp&nbspAdd
                                    </button>
                                </div>
                            </th>
                            <tr>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Desinition</th>
                                        <th>Mobile no.</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($owners as $owner): ?>
                                        <tr>
                                            <td>
                                                <?php echo($owner->name); ?>
                                            </td>
                                            <td>
                                                <?php echo($owner->designation) ?>
                                            </td>
                                            <td>
                                                <?php echo($owner->mobile1) ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li>
                                                            <a href="#" class="btn-ownerEdit"
                                                               data-partnerid="<?php echo $owner->owner_id ?>"><label
                                                                    class="text-success"><i
                                                                        class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</label></a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo(site_url('owner/delete/' . $this->uri->segment(3) . '/' . $owner->owner_id)) ?>"
                                                               class="delete" data-resid="5"
                                                               onclick="return confirm('Are you sure you want to delete?');"><label
                                                                    class="text-warning"><i
                                                                        class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;Delete</label></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </tr>
                        </table>
                    </div>
                    <div class="well-sm well">
                        <table class="table table-bordered">
                            <th colspan="2">Establishment Location
                                <div class="pull-right">
                                    <button type="button" id="btn-editEstablismentLocation"
                                            class="btn btn-xs btn-primary"><i class="fa fa-edit fa"></i>&nbsp&nbspEdit
                                    </button>
                                </div>
                            </th>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    <?php echo($restaurants->res_city) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Area
                                </td>
                                <td>
                                    <?php echo($restaurants->res_area) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Street
                                </td>
                                <td>
                                    <?php echo($restaurants->res_street) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Landmark
                                </td>
                                <td>
                                    <?php echo($restaurants->landmark) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Others(Building's Name)
                                </td>
                                <td>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="well-sm well clearfix">
                        <b>Serves: </b> <span id="msg-serveswait" class="text-success " style="display:none">  </span>
                        <button type="button" id="btn_addServe" class="btn btn-sm btn-info pull-right"><i
                                class="fa fa-plus fa"></i> Add New
                        </button>
                        <hr/>
                        <div id="serve_checkbox">
                            <?php foreach ($serves as $ser) {
                                ?>
                                <div class="col-md-2">
                                    <label class="checkbox-inline">
                                        <!-- <input type="checkbox" name="serves[]"
                                                   value="<?php echo $ser->serves_id ?>"><?php echo $ser->serves_name ?> -->
                                        <?php
                                        $data = array(
                                            'name' => 'serves[]',
                                            'class' => 'serves',
                                            'value' => $ser->serves_id,
                                            'checked' => $ser->res_id ? TRUE : FALSE
                                        );

                                        ?>
                                        <?php echo form_checkbox($data); ?><?php echo $ser->serves_name ?>

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
                <div class="col-md-6">
                    <div class="well-sm well">
                        <button type="button" id="btn-serveTimeEdit" class="btn btn-sm btn-primary pull-right "><i class="fa fa-edit"></i>&nbsp&nbspEdit</button>                        
                        <table class="table table-bordered clearfix">
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
                            
                            <?php foreach ($service_time as $st): ?>

                                <?php if ($st['first']->day == 1): ?>
                                    <tr>
                                        <td>Sunday</td>
                                        <td>
                                            <?php echo($st['first']->opening_time ? date('h:i a',strtotime($st['first']->opening_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->opening_time ? date('h:i a',strtotime($st['second']->opening_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->opening_time ? date('h:i a',strtotime($st['third']->opening_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <?php echo($st['first']->closing_time ? date('h:i a',strtotime($st['first']->closing_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->closing_time ? date('h:i a',strtotime($st['second']->closing_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->closing_time ? date('h:i a',strtotime($st['third']->closing_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 2): ?>
                                    <tr>
                                        <td>Monday</td>
                                        <td>
                                            <?php echo($st['first']->opening_time ? date('h:i a',strtotime($st['first']->opening_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->opening_time ? date('h:i a',strtotime($st['second']->opening_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->opening_time ? date('h:i a',strtotime($st['third']->opening_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <?php echo($st['first']->closing_time ? date('h:i a',strtotime($st['first']->closing_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->closing_time ? date('h:i a',strtotime($st['second']->closing_time )): '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->closing_time ? date('h:i a',strtotime($st['third']->closing_time )): '') ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 3): ?>
                                    <tr>
                                        <td>Tuesday</td>
                                        <td>
                                            <?php echo($st['first']->opening_time ? date('h:i a',strtotime($st['first']->opening_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->opening_time ? date('h:i a',strtotime($st['second']->opening_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->opening_time ? date('h:i a',strtotime($st['third']->opening_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <?php echo($st['first']->closing_time ? date('h:i a',strtotime($st['first']->closing_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->closing_time ? date('h:i a',strtotime($st['second']->closing_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->closing_time ? date('h:i a',strtotime($st['third']->closing_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 4): ?>
                                    <tr>
                                        <td>Wednesday</td>
                                        <td>
                                            <?php echo($st['first']->opening_time ? date('h:i a',strtotime($st['first']->opening_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->opening_time ? date('h:i a',strtotime($st['second']->opening_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->opening_time ? date('h:i a',strtotime($st['third']->opening_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <?php echo($st['first']->closing_time ? date('h:i a',strtotime($st['first']->closing_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->closing_time ? date('h:i a',strtotime($st['second']->closing_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->closing_time ? date('h:i a',strtotime($st['third']->closing_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 5): ?>
                                    <tr>
                                        <td>Thursday</td>
                                        <td>
                                            <?php echo($st['first']->opening_time ? date('h:i a',strtotime($st['first']->opening_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->opening_time ? date('h:i a',strtotime($st['second']->opening_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->opening_time ? date('h:i a',strtotime($st['third']->opening_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <?php echo($st['first']->closing_time ? date('h:i a',strtotime($st['first']->closing_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->closing_time ? date('h:i a',strtotime($st['second']->closing_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->closing_time ? date('h:i a',strtotime($st['third']->closing_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 6): ?>
                                    <tr>
                                        <td>Friday</td>
                                        <td>
                                            <?php echo($st['first']->opening_time ? date('h:i a',strtotime($st['first']->opening_time)): '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->opening_time ? date('h:i a',strtotime($st['second']->opening_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->opening_time ? date('h:i a',strtotime($st['third']->opening_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <?php echo($st['first']->closing_time ? date('h:i a',strtotime($st['first']->closing_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->closing_time ? date('h:i a',strtotime($st['second']->closing_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->closing_time ? date('h:i a',strtotime($st['third']->closing_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 7): ?>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>
                                            <?php echo($st['first']->opening_time ? date('h:i a',strtotime($st['first']->opening_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->opening_time ? date('h:i a',strtotime($st['second']->opening_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->opening_time ? date('h:i a',strtotime($st['third']->opening_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <?php echo($st['first']->closing_time ? date('h:i a',strtotime($st['first']->closing_time)) : '') ?>
                                            <?php if ($st['second']): ?>
                                                <br/>
                                                <br/><?php echo($st['second']->closing_time ? date('h:i a',strtotime($st['second']->closing_time)) : '') ?>
                                            <?php endif ?>
                                            <?php if ($st['third']): ?>
                                                <br/>
                                                <br/><?php echo($st['third']->closing_time ? date('h:i a',strtotime($st['third']->closing_time)) : '') ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well-sm well">
                    <button type="button" id="btn-editCostTopic" class="btn btn-sm btn-primary pull-right"><i class="fa fa-edit fa"></i>&nbsp&nbspEdit</button>
                        <br/>
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2">
                                    Cost(Lunch, dinner or breakfast) for two
                                </th>
                            </tr>
                            <?php $total = 0;
                            foreach ($res_costs as $topic) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $topic->topic ?>
                                    </td>
                                    <td>
                                        <?php echo($topic->cost) ?>
                                    </td>
                                </tr>
                                <?php
                                $total += $topic->cost;
                            } ?>
                            <tr>
                                <td>
                                    <b>Total</b>
                                </td>
                                <td>
                                   <b><?php echo $total ?></b>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $('#btn-editCostTopic').click(function() {
                    $('#modal-editCostTopic').modal('show');
                });
                $('#btn-serveTimeEdit').click(function() {
                    $('#modal-serveTimeEdit').modal('show');
                });
            </script>

            <div class="row">
                <div class="col-md-12">
                    <div class="well-sm well clearfix">
                        <form id="form-updateParking">
                            <b> Parking :</b><span id="msg-parkingWait" class="text-success" style="display:none">  </span>
                            <label class="checkbox-inline">
                                <input type="radio" id="parking_yes" class="parking" name="res_parking"
                                       value="1" <?php echo($restaurants->parking ? 'checked' : '') ?>>Yes
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" id="parking_no" class="parking" name="res_parking"
                                       value="0" <?php echo($restaurants->parking ? '' : 'checked') ?>>No
                            </label>
                            <hr/>
                       </form>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="parking_options" id='res_parking2' name="res_parking2"
                                   value="2" <?php echo($restaurants->parking_two ? 'checked' : '') ?>>Two Wheeler
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="parking_options" id="res_parking4" name="res_parking4"
                                   value="4" <?php echo($restaurants->parking_four ? 'checked' : '') ?>>Four Wheeler
                        </label>
                        <button type="button" id="btn-updateParking" style="display:none" class="btn btb-sm btn-primary pull-right">Update</button>
                        <br>
                        
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="well-sm well clearfix" id="estd_checkbox">
                        <b> Establishment Type:</b> <span id="msg-estdTypeWait" class="text-success"
                                                          style="display:none">  </span><span class="pull-right"><button
                                type="button" id="btn_establishmentType" class="btn btn-sm btn-info"> Add New
                            </button></span>
                        <hr/>
                        <?php foreach ($est_type as $est): ?>
                            <div class="col-md-2">
                                <label class="checkbox-inline">
                                    <?php
                                    $data = array(
                                        'name' => 'establishment_type[]',
                                        'class' => 'estd_type',
                                        'value' => $est->type_id,
                                        'checked' => $est->res_id ? TRUE : FALSE
                                    );

                                    ?>
                                    <?php echo form_checkbox($data); ?><?php echo $est->type ?>
                                </label>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="well-sm well clearfix" id="facility_checkbox">
                        <b> Facilities :</b><span id="msg-facilityWait" class="text-success"
                                                  style="display:none">  </span><span class="pull-right"><button
                                type="button" id="btn_facilities" class="btn btn-sm btn-info"> Add New
                            </button></span>
                        <hr/>

                        <?php foreach ($facilities as $fac): ?>
                            <div class="col-md-2">
                                <label class="checkbox-inline">
                                    <?php
                                    $data = array(
                                        'name' => 'facilities[]',
                                        'class' => 'facility',
                                        'value' => $fac->facilities_id,
                                        'checked' => $fac->res_id ? TRUE : FALSE
                                    );

                                    ?>
                                    <?php echo form_checkbox($data); ?><?php echo $fac->facility ?>
                                </label>
                            </div>
                        <?php endforeach ?>


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="well-sm well">
                        <b> Offers: </b>
                        <hr/>
                        <form id="form-updateOffers">
                            <label class="checkbox-inline">
                                <input type="radio" name="offers[]" class="offers" id="offers_yes" value="yes" <?php echo($restaurants->offers?'checked':'') ?>> Yes
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" name="offers[]" class="offers" id="offers_no" value="no" <?php echo($restaurants->offers?'':'checked') ?>> No
                            </label>
                            <label id="offerremarks">
                                <input type="text" name="offerremarks" id="inputOfferremarks" class="form-control" value="<?php echo($restaurants->offers); ?>">
                            </label>
                            <button type="button" id="btn-updateOffers" class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i>&nbsp&nbspUpdate</button>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                var offer='<?php echo($restaurants->offers) ?>';
                if ($('#offers_yes').prop('checked')) 
                {
                    $('#offerremarks').show();
                }
                else
                {
                    $('#offerremarks').hide()
                }
                $('.offers').change(function() {
                   if ($('#offers_yes').prop('checked')) 
                    {
                        $('#offerremarks').show();
                    }
                    else
                    {
                        $('#offerremarks').hide()
                    }
                });

                $('#btn-updateOffers').click(function()
                {
                    $(this).prop('disabled',true)
                           .html('<i class="fa fa-spinner"></i>  Updating....');
                    $.ajax({
                        url: '<?php echo(site_url("offers/update/".$this->uri->segment(3))) ?>',
                        type: 'POST',
                        data: $('#form-updateOffers').serialize()
                    })
                    .done(function(data) {
                        $('#btn-updateOffers').prop('disabled',true)
                               .html('<i class="fa fa-check"></i>  Update Successfully');
                       setTimeout(function () {
                            $('#btn-updateOffers').prop('disabled',false)
                               .html('<i class="fa fa-refresh"></i>  Update');
                        }, 1000);
                        
                    })
                    .fail(function(data) {
                        alert('Something went wrong !');
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                    
                });   

            </script>
            <div class="row">
                <div class="col-md-12">
                    <div class="well-sm well">
                        <button type="button" id="btn-editHappyHours" class="btn btn-primary pull-right"><i class="fa fa-edit fa"></i>&nbsp&nbspEdit</button>
                        <h3 class="text-center">Happy hours</h3>
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

                            <?php foreach ($happy_hours as $hh): ?>

                                <tr>
                                    <td><?php switch ($hh['first']->day) {
                                            case '1':
                                                echo("sunday");
                                                break;
                                            case '2':
                                                echo("Monday");
                                                break;
                                            case '3':
                                                echo("Tuesday");
                                                break;
                                            case '4':
                                                echo('Wednesday');
                                                break;
                                            case '5':
                                                echo('Thursday');
                                                break;
                                            case '6':
                                                echo('Friday');
                                                break;
                                            case '7':
                                                echo('Saturday');
                                                break;
                                        } ?>
                                    </td>
                                    <td>
                                        <?php echo($hh['first']->start_time ?date('h:i a',strtotime($hh['first']->start_time)) : '') ?>
                                        <?php if (!empty($hh['second'])): ?>
                                            
                                            <br/><?php echo($hh['second']->start_time ? date('h:i a',strtotime($hh['second']->start_time )): '') ?>
                                        <?php endif ?>

                                        <?php if (!empty($hh['third'])): ?>
                                           
                                            <br/><?php echo($hh['third']->start_time ? date('h:i a',strtotime($hh['third']->start_time )): '') ?>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?php echo($hh['first']->end_time ? date('h:i a',strtotime($hh['first']->end_time)) : '') ?>
                                        <?php if (!empty($hh['second'])): ?>
                                           
                                            <br/><?php echo($hh['second']->end_time ? date('h:i a',strtotime($hh['second']->end_time)) : '') ?>
                                        <?php endif ?>

                                        <?php if (!empty($hh['third'])): ?>
                                           
                                            <br/><?php echo($hh['third']->end_time ? date('h:i a',strtotime($hh['third']->end_time)) : '') ?>
                                        <?php endif ?>
                                    </td>
                                </tr>


                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $('#btn-editHappyHours').click(function() {
                    $('#modal-editHappyHours').modal('show');
                });
            </script>
            <div class="row">
                <div class="col-md-12">
                    <div class="well-sm well clearfix" id="cousin_checkbox">
                        <b> Cuisine by Country :</b><span id="msg-cousinByCountryWait" class="text-success"
                                                          style="display:none">  </span><span class="pull-right"><button
                                type="button" id="btn_addCousin" class="btn btn-sm btn-info "><i
                                    class="fa fa-plus fa"></i> Add New
                            </button></span>
                        <hr/>
                        <?php foreach ($cousins as $Cousin): ?>
                            <div class="col-md-2">
                                <label class="checkbox-inline">
                                    <?php
                                    $data = array(
                                        'name' => 'cousins[]',
                                        'class' => 'cousins',
                                        'value' => $Cousin->cousin_id,
                                        'checked' => $Cousin->res_id ? TRUE : FALSE
                                    );

                                    ?>
                                    <?php echo form_checkbox($data); ?><?php echo $Cousin->cousin ?>
                                </label>
                            </div>
                        <?php endforeach ?>
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
                        <hr/>
                        <?php foreach ($foods as $food): ?>
                            <div class="col-md-2">
                                <label class="checkbox-inline">
                                    <?php
                                    $data = array(
                                        'name' => 'foods[]',
                                        'class' => 'foods',
                                        'value' => $food->food_id,
                                        'checked' => $food->res_id ? TRUE : FALSE
                                    );

                                    ?>
                                    <?php echo form_checkbox($data); ?><?php echo $food->food ?>
                                </label>
                            </div>
                        <?php endforeach ?>
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
                        <b> Popular Dish:</b><span id="msg-popDishWait" class="text-success"
                                                   style="display:none">  </span><span class="pull-right"> <button
                                type="button" id="btn_addPopDish" class="btn btn-sm btn-info"><i
                                    class="fa fa-plus fa"></i> Add New
                            </button></span>
                        <hr/>
                        <?php foreach ($pop_dishes as $pop): ?>
                            <div class="col-md-2">
                                <label class="checkbox-inline">
                                    <?php
                                    $data = array(
                                        'name' => 'pop_dishes[]',
                                        'class' => 'pop_dishes',
                                        'value' => $pop->pop_dishes_id,
                                        'checked' => $pop->res_id ? TRUE : FALSE
                                    );

                                    ?>
                                    <?php echo form_checkbox($data); ?><?php echo $pop->pop_dishes ?>
                                </label>
                            </div>
                        <?php endforeach ?>
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
    </div>
</div>
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

<div class="modal fade" id="mdl-estdcontact">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Establishment's Contact Number</h4>
            </div>
            <div class="modal-body">
                <div class="well-sm well">
                    <form id="form-establishment">
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
                                        <input maxlength="8" oninput="maxLengthCheck(this)" type="number"
                                               class="form-control" name="res_mobile1"
                                               value="<?php echo set_value('res_mobile1') ?>" id="res_mobile1"
                                            >
                                        <span></span>
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
                                        <input name="res_mobile2" type="number" maxlength="8"
                                               oninput="maxLengthCheck(this)"
                                               value="<?php echo set_value('res_mobile2') ?>" type="text"
                                               class="form-control phone" id="res_mobile2">
                                        <span></span>
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
                                        <input type="number" name="res_landline1" id="res_landline1" maxlength="10"
                                               oninput="maxLengthCheck(this)"
                                               value="<?php echo set_value('res_landline1') ?>"
                                               class="form-control">
                                        <span></span>
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
                                        <input type="number" name="res_landline2" id="res_landline2" maxlength="10"
                                               oninput="maxLengthCheck(this)"
                                               value="<?php echo set_value('res_landline2') ?>"
                                               class="form-control">
                                        <span></span>
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
                                        <input type="text" name="res_website" id="res_website"
                                               value="<?php echo set_value('res_website') ?>"
                                               class="form-control">
                                        <span></span>
                                    </div>
                                    <?php echo form_error('res_website'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email
                                </td>
                                <td>
                                    <div class="form-group">
                                        <span></span>
                                        <input type="text" name="res_email" id="res_email"
                                               value="<?php echo set_value('res_email') ?>" class="form-control">
                                        <span></span>
                                    </div>
                                    <?php echo form_error('res_email'); ?>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-updateEstdNumber" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdl-mrnumber">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Owner's or manager Restaurant Number</h4>
            </div>
            <div class="modal-body">
                <div class="well-sm well">
                    <form id="form-ownerManagerResNumber">
                        <table class="table table-bordered">
                            <th colspan="2">Owner's or manager Restaurant Number</th>
                            <tr>
                                <td>
                                    Name
                                </td>
                                <td>
                                    <input type="text" name="owners_name" id="owners_name"
                                           value="<?php echo set_value('owners_name') ?>"
                                           class="form-control">
                                    <span></span>
                                    <?php echo form_error('owners_name'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Designation
                                </td>
                                <td>
                                    <input type="text" name="owners_designation" id="owners_designation"
                                           value="<?php echo set_value('owners_designation') ?>" class="form-control">
                                    <span></span>
                                    <?php echo form_error('owners_designation'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mobile 1
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="owners_mobile1" id="owners_mobile1" maxlength="12"
                                               oninput="maxLengthCheck(this)"
                                               value="<?php echo set_value('owners_mobile1') ?>"
                                               class="form-control">
                                        <span></span>
                                    </div>
                                    <?php echo form_error('owners_mobile1'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mobile 2
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="owners_mobile2" id="owners_mobile2" maxlength="12"
                                               oninput="maxLengthCheck(this)"
                                               value="<?php echo set_value('owners_mobile2') ?>"
                                               class="form-control">
                                        <span></span>
                                    </div>
                                    <?php echo form_error('owners_mobile2'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Landline 1
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="owners_landline1" id="owners_landline1" maxlength="12"
                                               oninput="maxLengthCheck(this)"
                                               value="<?php echo set_value('owners_landline1') ?>"
                                               class="form-control">
                                        <span></span>
                                    </div>
                                    <?php echo form_error('owners_landline1'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Landline 2
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="owners_landline2" id="owners_landline2" maxlength="12"
                                               oninput="maxLengthCheck(this)"
                                               value="<?php echo set_value('owners_landline2') ?>"
                                               class="form-control">
                                        <span></span>
                                    </div>
                                    <?php echo form_error('owners_landline2'); ?>
                                </td>
                            </tr>
                            <input type="hidden" name="partner_id" id="partner_id" value="">
                        </table>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-updateOwnerManagerResNumber" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-mapcoordinate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Map(Coordinates)</h4>
            </div>
            <div class="modal-body">
                <div class="well-sm well">
                    <form id="form-mapCoordinates">
                        <table class="table table-bordered">
                            <th colspan="2">Map(Coordinates)</th>
                            <tr>
                                <td>
                                    Latitude
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">28.</span>
                                        <input type="text" name="res_lat" id="res_lat"
                                               value="<?php echo set_value('res_lat') ?>"
                                               class="form-control">
                                        <span></span>
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
                                        <span class="input-group-addon">84.</span>
                                        <input type="text" name="res_lon" id="res_lon"
                                               value="<?php echo set_value('res_lon') ?>"
                                               class="form-control">
                                        <span></span>
                                    </div>
                                    <?php echo form_error('res_lon'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Present in google Map
                                </td>
                                <td>
                                    <!-- <input type="checkbox" name="res_map" value="1"> -->
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            <input type="radio" name="res_map" id="map_yes" value="1">Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="res_map" id="map_no" value="0">No
                                        </label>

                                    </div>
                                    <?php echo form_error('res_map'); ?>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-updateMapCoordinate" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdl-establishmentLocation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Establishment Location</h4>
            </div>
            <div class="modal-body">
                <form id="form-estdLocation">
                    <div class="well-sm well">
                        <table class="table table-bordered">
                            <th colspan="2">Establishment Location</th>
                            <tr>
                                <td>
                                    City
                                </td>
                                <td>
                                    <div class="form-group">
                                        <?php echo($cityDropdown) ?>
                                        <span></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Area
                                </td>
                                <td>
                                    <div class="form-group" id="est_area_div">
                                        <!-- <input list="est_area" name="est_area" id="area_suggest"
                                               value="<?php echo set_value('est_area') ?>" class="form-control"> -->
                                         <?php echo $areaDropdown ?>  
                                        <span></span>
                                    </div>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Street
                                </td>
                                <td>
                                    <div class="form-group" id="est_street_div">
                                        <!-- <input type="text" name="est_street" id="est_street"
                                               value="<?php echo set_value('est_street') ?>"
                                               class="form-control"> -->
                                        <?php echo $streetDropdown ?>
                                        <span></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Landmark
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="est_landmark" id="est_landmark"
                                               value="<?php echo set_value('est_landmark') ?>"
                                               class="form-control">
                                        <span></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Others(Building's Name)
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="est_other" id="est_other"
                                               value="<?php echo set_value('est_other') ?>"
                                               class="form-control">
                                        <span></span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-updateEstdLocation" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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
<div class="modal fade" id="modal-addOwner">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add new owner</h4>
            </div>
            <div class="modal-body">
                <div class="well-sm well">
                    <form id="form-addNewOwner">

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="owners_name" id="owners_name"
                                   placeholder="Input Name">
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Designition</label>
                            <input type="text" class="form-control" name="owners_designation" id="owners_designation"
                                   placeholder="Input Designition">
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Mobile 1</label>
                            <input type="number" class="form-control" name="owners_mobile1" id="owners_mobile1"
                                   placeholder="Input Mobile Number">
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Mobile 2</label>
                            <input type="number" class="form-control" name="owners_mobile2" id="owners_mobile2"
                                   placeholder="Input Mobile Number">
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Landline 1</label>
                            <input type="number" class="form-control" name="owners_lanline1" id="owners_lanline1"
                                   placeholder="Input Landline Number">
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Landline 2</label>
                            <input type="number" class="form-control" name="owners_landline2" id="owners_landline2"
                                   placeholder="Input Landline Number">
                            <span></span>
                        </div>
                        <input type="hidden" name="restaurant_id" value="<?php echo($this->uri->segment(3)) ?>">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-ownerAddNew">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-updateRestaurantName">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Form</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Restaurant Name</label>
                    <input type="text" name="restaurant_name" id="restaurant_name" class="form-control" value="">
                    <span></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-updateRestaurantName" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-serveTimeEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Serve Time</h4>
            </div>
             <?php echo form_open('service_time/update/'.$this->uri->segment(3)); ?>
            <div class="modal-body">
                <table class="table table-bordered clearfix">
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
                        <td>
                            <input id="open_time_all" type="time" class="form-control time" data-time-format="H:i">
                            <input id="open_time_all1" type="time" class="form-control time" data-time-format="H:i">
                            <input id="open_time_all2" type="time" class="form-control time" data-time-format="H:i">
                        </td>
                        <td>
                            <input id="close_time_all" type="time" class="form-control time" data-time-format="H:i">
                            <input id="close_time_all1" type="time" class="form-control time" data-time-format="H:i">
                            <input id="close_time_all2" type="time" class="form-control time" data-time-format="H:i">
                        </td>

                    </tr>
                   <?php if ($service_time): ?>
                       <?php foreach ($service_time as $st): ?>

                                <?php if ($st['first']->day == 1): ?>
                                    <tr>
                                        <td>Sunday</td>
                                        <td>
                                            <input name="servtime[1][open]" type="time" class="form-control open_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->opening_time ? $st['first']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[1][open]" type="time" class="form-control open_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second']? $st['second']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[1][open]" type="time" class="form-control open_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third']? $st['third']->opening_time : '') ?>">
                                        </td>
                                        <td>
                                            <input name="servtime[1][close]" type="time" class="form-control close_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->closing_time ? $st['first']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[1][close]" type="time" class="form-control close_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second'] ? $st['second']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[1][close]" type="time" class="form-control close_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third'] ? $st['third']->closing_time : '') ?>">
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 2): ?>
                                    <tr>
                                        <td>Monday</td>
                                        <td>
                                            <input name="servtime[2][open]" type="time" class="form-control open_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->opening_time ? $st['first']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[2][open]" type="time" class="form-control open_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second']? $st['second']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[2][open]" type="time" class="form-control open_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third']? $st['third']->opening_time : '') ?>">
                                        </td>
                                        <td>
                                            <input name="servtime[2][close]" type="time" class="form-control close_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->closing_time ? $st['first']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[2][close]" type="time" class="form-control close_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second'] ? $st['second']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[2][close]" type="time" class="form-control close_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third'] ? $st['third']->closing_time : '') ?>">
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 3): ?>
                                    <tr>
                                        <td>Tuesday</td>
                                        <td>
                                            <input name="servtime[3][open]" type="time" class="form-control open_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->opening_time ? $st['first']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[3][open]" type="time" class="form-control open_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second']? $st['second']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[3][open]" type="time" class="form-control open_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third']? $st['third']->opening_time : '') ?>">
                                        </td>
                                        <td>
                                            <input name="servtime[3][close]" type="time" class="form-control close_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->closing_time ? $st['first']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[3][close]" type="time" class="form-control close_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second'] ? $st['second']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[3][close]" type="time" class="form-control close_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third'] ? $st['third']->closing_time : '') ?>">
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 4): ?>
                                    <tr>
                                        <td>Wednesday</td>
                                        <td>
                                            <input name="servtime[4][open]" type="time" class="form-control open_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->opening_time ? $st['first']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[4][open]" type="time" class="form-control open_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second']? $st['second']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[4][open]" type="time" class="form-control open_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third']? $st['third']->opening_time : '') ?>">
                                        </td>
                                        <td>
                                            <input name="servtime[4][close]" type="time" class="form-control close_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->closing_time ? $st['first']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[4][close]" type="time" class="form-control close_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second'] ? $st['second']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[4][close]" type="time" class="form-control close_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third'] ? $st['third']->closing_time : '') ?>">
                                            
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 5): ?>
                                    <tr>
                                        <td>Thursday</td>
                                        <td>
                                            <input name="servtime[5][open]" type="time" class="form-control open_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->opening_time ? $st['first']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[5][open]" type="time" class="form-control open_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second']? $st['second']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[5][open]" type="time" class="form-control open_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third']? $st['third']->opening_time : '') ?>">
                                        </td>
                                        <td>
                                            <input name="servtime[5][close]" type="time" class="form-control close_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->closing_time ? $st['first']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[5][close]" type="time" class="form-control close_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second'] ? $st['second']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[5][close]" type="time" class="form-control close_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third'] ? $st['third']->closing_time : '') ?>">
                                            
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 6): ?>
                                    <tr>
                                        <td>Friday</td>
                                        <td>
                                            <input name="servtime[6][open]" type="time" class="form-control open_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->opening_time ? $st['first']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[6][open]" type="time" class="form-control open_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second']? $st['second']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[6][open]" type="time" class="form-control open_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third']? $st['third']->opening_time : '') ?>">
                                        </td>
                                        <td>
                                            <input name="servtime[6][close]" type="time" class="form-control close_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->closing_time ? $st['first']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[6][close]" type="time" class="form-control close_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second'] ? $st['second']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[6][close]" type="time" class="form-control close_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third'] ? $st['third']->closing_time : '') ?>">
                                            
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($st['first']->day == 7): ?>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>
                                            <input name="servtime[7][open]" type="time" class="form-control open_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->opening_time ? $st['first']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[7][open]" type="time" class="form-control open_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second']? $st['second']->opening_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[7][open]" type="time" class="form-control open_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third']? $st['third']->opening_time : '') ?>">
                                        </td>
                                        <td>
                                            <input name="servtime[7][close]" type="time" class="form-control close_time time"
                                            data-time-format="H:i" value="<?php echo($st['first']->closing_time ? $st['first']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime1[7][close]" type="time" class="form-control close_time1 time"
                                            data-time-format="H:i" value="<?php echo($st['second'] ? $st['second']->closing_time : '') ?>">
                                            <br/>
                                            <input name="servtime2[7][close]" type="time" class="form-control close_time2 time"
                                            data-time-format="H:i" value="<?php echo($st['third'] ? $st['third']->closing_time : '') ?>">
                                            
                                        </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                   <?php else: ?>
                        <?php
                            $days=array('1','2','3','4','5','6','7'); 
                         ?>
                        <?php foreach ($days as $day): ?>
                            <tr>
                                <td><?php switch ($day) {
                                        case '1':
                                            echo("sunday");
                                            break;
                                        case '2':
                                            echo("Monday");
                                            break;
                                        case '3':
                                            echo("Tuesday");
                                            break;
                                        case '4':
                                            echo('Wednesday');
                                            break;
                                        case '5':
                                            echo('Thursday');
                                            break;
                                        case '6':
                                            echo('Friday');
                                            break;
                                        case '7':
                                            echo('Saturday');
                                            break;
                                    } ?>
                                </td>
                                <td>
                                    <input name="servtime[<?php echo($day) ?>][open]" type="time" class="form-control open_time time"
                                    data-time-format="H:i" >
                                    <br/>
                                    <input name="servtime1[<?php echo($day) ?>][open]" type="time" class="form-control open_time1 time"
                                    data-time-format="H:i" >
                                    <br/>
                                    <input name="servtime2[<?php echo($day) ?>][open]" type="time" class="form-control open_time2 time"
                                    data-time-format="H:i" >
                                </td>
                                <td>
                                    <input name="servtime[<?php echo($day) ?>][close]" type="time" class="form-control close_time time"
                                    data-time-format="H:i" >
                                    <br/>
                                    <input name="servtime1[<?php echo($day) ?>][close]" type="time" class="form-control close_time1 time"
                                    data-time-format="H:i" >
                                    <br/>
                                    <input name="servtime2[<?php echo($day) ?>][close]" type="time" class="form-control close_time2 time"
                                    data-time-format="H:i" >
                                    
                                </td>
                            </tr>
                        <?php endforeach ?>
                        
                   <?php endif ?>

                    
                    
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" href="<?php echo(site_url('service_time/update/'.$this->uri->segment(3))) ?>" id="btn-serveTimeUpdate" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-editHappyHours">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Happy Hours</h4>
            </div>
            <?php echo(form_open('happy_hour/update/'.$this->uri->segment(3))) ?>
            <div class="modal-body">
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
                        <td>
                            <input type="time" class="form-control time" id="start_time_all" data-time-format="H:i">
                            <input type="time" class="form-control time" id="start_time_all1" data-time-format="H:i">
                            <input type="time" class="form-control time" id="start_time_all2" data-time-format="H:i">
                        </td>
                        <td>
                            <input type="time" class="form-control time" id="end_time_all" data-time-format="H:i">
                            <input type="time" class="form-control time" id="end_time_all1" data-time-format="H:i">
                            <input type="time" class="form-control time" id="end_time_all2" data-time-format="H:i">
                        </td>
                    </tr>
                    <?php
                        $days=array(1,2,3,4,5,6,7); 
                     ?>
                    <?php if ($happy_hours): ?>
                        <?php foreach ($happy_hours as $hh): ?>

                            
                                    <?php if ($hh['first']->day == 1): ?>
                                    <tr>
                                        <td>Sunday</td>
                                    <td>
                                        <input name="happyhours[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->start_time ? $hh['first']->start_time : '') ?>">
                                        
            
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->start_time) ? $hh['second']->start_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->start_time) ? $hh['third']->start_time : '') ?>">
                                            
                                        
                                    </td>

                                    <td>
                                            <input name="happyhours[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time"
                                            data-time-format="H:i" value="<?php echo($hh['first']->end_time ? $hh['first']->end_time : '') ?>">
                                        
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->end_time )? $hh['second']->end_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->end_time )? $hh['third']->end_time : '') ?>">
                                            
                                    </td>
                               
                                </tr>
                            <?php endif ?>

                            <?php if ($hh['first']->day == 2): ?>
                                    <tr>
                                        <td>Monday</td>
                                    <td>
                                    <input name="happyhours[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->start_time ? $hh['first']->start_time : '') ?>">
                                        
            
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->start_time) ? $hh['second']->start_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->start_time) ? $hh['third']->start_time : '') ?>">
                                            
                                        
                                    </td>

                                    <td>
                                            <input name="happyhours[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->end_time ? $hh['first']->end_time : '') ?>">
                                        
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->end_time )? $hh['second']->end_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->end_time )? $hh['third']->end_time : '') ?>">
                                            
                                    </td>
                               
                                </tr>
                            <?php endif ?>

                            <?php if ($hh['first']->day == 3): ?>
                                    <tr>
                                        <td>Tuesday</td>
                                    <td>
                                            <input name="happyhours[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->start_time ? $hh['first']->start_time : '') ?>">
                                        
            
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->start_time) ? $hh['second']->start_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->start_time) ? $hh['third']->start_time : '') ?>">
                                            
                                        
                                    </td>

                                    <td>
                                        <input name="happyhours[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->end_time ? $hh['first']->end_time : '') ?>">
                                        
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->end_time )? $hh['second']->end_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->end_time )? $hh['third']->end_time : '') ?>">
                                            
                                    </td>
                               
                                </tr>
                            <?php endif ?>

                            <?php if ($hh['first']->day == 4): ?>
                                    <tr>
                                        <td>Wednesday</td>
                                    <td>
                                        <input name="happyhours[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->start_time ? $hh['first']->start_time : '') ?>">
                                        
            
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->start_time) ? $hh['second']->start_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->start_time) ? $hh['third']->start_time : '') ?>">
                                            
                                        
                                    </td>

                                    <td>
                                            <input name="happyhours[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->end_time ? $hh['first']->end_time : '') ?>">
                                        
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->end_time )? $hh['second']->end_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->end_time )? $hh['third']->end_time : '') ?>">
                                            
                                    </td>
                               
                                </tr>
                            <?php endif ?>

                            <?php if ($hh['first']->day == 5): ?>
                                    <tr>
                                        <td>Thursday</td>
                                    <td>
                                        <input name="happyhours[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->start_time ? $hh['first']->start_time : '') ?>">
                                        
            
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->start_time) ? $hh['second']->start_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->start_time) ? $hh['third']->start_time : '') ?>">
                                            
                                        
                                    </td>

                                    <td>
                                            <input name="happyhours[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->end_time ? $hh['first']->end_time : '') ?>">
                                        
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->end_time )? $hh['second']->end_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->end_time )? $hh['third']->end_time : '') ?>">
                                            
                                    </td>
                               
                                </tr>
                            <?php endif ?>

                            <?php if ($hh['first']->day == 6): ?>
                                    <tr>
                                        <td>Friday</td>
                                    <td>
                                    <input name="happyhours[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->start_time ? $hh['first']->start_time : '') ?>">
                                        
            
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->start_time) ? $hh['second']->start_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->start_time) ? $hh['third']->start_time : '') ?>">
                                            
                                        
                                    </td>

                                    <td>
                                    <input name="happyhours[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->end_time ? $hh['first']->end_time : '') ?>">
                                        
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->end_time )? $hh['second']->end_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->end_time )? $hh['third']->end_time : '') ?>">
                                            
                                    </td>
                               
                                </tr>
                            <?php endif ?>

                            <?php if ($hh['first']->day == 7): ?>
                                    <tr>
                                        <td>Saturday</td>
                                    <td>
                                        <input name="happyhours[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->start_time ? $hh['first']->start_time : '') ?>">
                                        
            
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->start_time) ? $hh['second']->start_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][start]" type="time" class="form-control time start_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->start_time) ? $hh['third']->start_time : '') ?>">
                                            
                                        
                                    </td>

                                    <td>
                                    <input name="happyhours[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time"
                                           data-time-format="H:i" value="<?php echo($hh['first']->end_time ? $hh['first']->end_time : '') ?>">
                                        
                                            <br/>
                                            <input name="happyhours1[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time1"
                                           data-time-format="H:i" value="<?php echo(isset($hh['second']->end_time )? $hh['second']->end_time : '') ?>">
                                           <br/>
                                            <input name="happyhours2[<?php echo($hh['first']->day) ?>][end]" type="time" class="form-control time end_time2"
                                           data-time-format="H:i" value="<?php echo(isset($hh['third']->end_time )? $hh['third']->end_time : '') ?>">
                                            
                                    </td>
                               
                                </tr>
                            <?php endif ?>


                        <?php endforeach ?>

                    <?php else: ?>
                             <?php foreach ($days as $day): ?>

                            <tr>
                                <td><?php switch ($day) {
                                        case '1':
                                            echo("sunday");
                                            break;
                                        case '2':
                                            echo("Monday");
                                            break;
                                        case '3':
                                            echo("Tuesday");
                                            break;
                                        case '4':
                                            echo('Wednesday');
                                            break;
                                        case '5':
                                            echo('Thursday');
                                            break;
                                        case '6':
                                            echo('Friday');
                                            break;
                                        case '7':
                                            echo('Saturday');
                                            break;
                                    } ?>
                                </td>
                                <td>
                                <input name="happyhours[<?php echo($day) ?>][start]" type="time" class="form-control time start_time"
                                       data-time-format="H:i"  >
                                    
        
                                        <br/>
                                        <input name="happyhours1[<?php echo($day) ?>][start]" type="time" class="form-control time start_time1"
                                       data-time-format="H:i" >
                                       <br/>
                                        <input name="happyhours2[<?php echo($day) ?>][start]" type="time" class="form-control time start_time2"
                                       data-time-format="H:i" >
                                        
                                    
                                </td>

                                <td>
                                <input name="happyhours[<?php echo($day) ?>][end]" type="time" class="form-control time end_time"
                                       data-time-format="H:i" >
                                    
                                        <br/>
                                        <input name="happyhours1[<?php echo ($day) ?>][end]" type="time" class="form-control time end_time1"
                                       data-time-format="H:i">
                                       <br/>
                                        <input name="happyhours2[<?php echo ($day) ?>][end]" type="time" class="form-control time end_time2"
                                       data-time-format="H:i">
                                        
                                </td>
                            </tr>


                        <?php endforeach ?>
                    <?php endif ?>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btn-happyHoursUpdate" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <?php echo(form_close()) ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-editCostTopic">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cost</h4>
            </div>
            <?php echo(form_open('cost_topic/update/'.$this->uri->segment(3))) ?>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <?php foreach ($res_costs as $topic) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $topic->topic ?>
                            </td>
                            <td>
                                <input type="number" name="estimate_cost_topic[<?php echo $topic->topic_id ?>]"
                                       class="estimate_cost_topic form-control" value="<?php echo($topic->cost) ?>">
                            </td>
                        </tr>
                        <?php

                    } ?>
                </table>
            </div>
            <div class="modal-footer">
                 <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <?php echo(form_close()); ?>
        </div>
    </div>
</div>

<script>

    parking_check();

    $(document).ready(function () {

        $('#btn-updateParking').click(function() {
            $(this).text('Updating.......');
            $(this).prop('disabled',true);
            var res_p=$()
            $.ajax({
                url: '<?php echo site_url("parking/update/".$this->uri->segment(3)) ?>',
                type: 'POST',
                data: $('#form-updateParking').serialize()
            })
            .done(function(data) {

                $('#btn-updateParking').text('Update Successfully !');
                setTimeout(function () {
                    $('#btn-updateParking').text('Update');
                }, 1000);
                 $('#btn-updateParking').prop('disabled',false);
                console.log("success");
            })
            .fail(function(data) {
                console.log("error");
            })
            .always(function() {
                
               
                console.log("complete");
            });
            
        });
        $('.parking').change(function() {

            $('#btn-updateParking').show();
        });

        $('#btn-ownerAddNew').click(function () {
            $(this).prop('disabled', true);
            $(this).text('Please Wait....');
            $.ajax({
                url: '<?php echo(site_url("owner/add")) ?>',
                type: 'POST',
                dataType: 'json',
                data: $('#form-addNewOwner').serialize()
            })
                .done(function (data) {
                    console.log(data);
                    if (data.status == true) {
                        $("html, body").animate({scrollTop: 0}, "slow");
                        location.reload();

                    } else {
                        $('#btn-ownerAddNew').prop('disabled', false);
                        $('#btn-ownerAddNew').text('Save');
                        $.each(data, function (index, val) {
                            $('#form-addNewOwner' + ' #' + val.error_string).next().html(val.input_error);
                            $('#form-addNewOwner' + ' #' + val.error_string).parent().addClass('has-error');
                        });


                    }
                    console.log("success");
                })
                .fail(function () {
                    $('#btn-ownerAddNew').prop('disabled', true);
                    $('#btn-ownerAddNew').text('Save');
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });

        });
        /*==============================================================*/
        $('#btn-addOwner').click(function () {
            $('#modal-addOwner').modal('show');
        });
        /* =================================================================*/
        var parking_2 = 0;
        var parking_4 = 0;

        $('.parking_options').change(function () {
            parking_status();
            var is_to = 0;
            if ($(this).is(':checked')) {
                is_to = 1;
            }

            $(this).prop('disabled', true);
            $('#msg-parkingWait').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Updating.....');
            $('#msg-parkingWait').show();
            $.ajax({
                url: '<?php echo(site_url("restaurants/update_parking")) ?>/' + '<?php echo $this->uri->segment(3); ?>/' + is_to + '/' + $(this).attr('name'),
                type: 'POST',
                data: {},
            })
                .done(function (data) {
                    $('#msg-parkingWait').html("Update Successfully");
                    setTimeout(function () {
                        $('#msg-parkingWait').hide();
                    }, 1000);
                    console.log("success");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    $('.parking_options').prop('disabled', false);
                    console.log("complete");
                });


        });

        /*=====================================================*/

        $('.parking').click(function () {
            parking_check();
        });

        var res_id = '<?php echo($this->uri->segment(3)) ?>';

        $('#btn-updateEstdLocation').click(function () {
            $(this).text('Updating..........');
            $(this).prop('disabled', true);
            $.ajax({
                url: '<?php echo(site_url("restaurants/update_estd_location")) ?>/' + res_id,
                type: 'POST',
                dataType: 'json',
                data: $('#form-estdLocation').serialize(),
            })
                .done(function (data) {

                    if (data.status == true) {
                        $("html, body").animate({scrollTop: 0}, "slow");
                        location.reload();

                    } else {

                        $.each(data, function (index, val) {
                            $('#btn-updateEstdLocation').text('Update');
                            $('#btn-updateEstdLocation').prop('disabled', false);
                            $('#form-estdLocation' + ' #' + val.error_string).next().html(val.input_error);
                            $('#form-estdLocation' + ' #' + val.error_string).parent().addClass('has-error');
                        });


                    }

                })
                .fail(function () {
                    $('#btn-updateEstdLocation').text('Update');
                    $('#btn-updateEstdLocation').prop('disabled', false);
                })
                .always(function () {
                    console.log("complete");
                });

        });
        /*========================================================================*/
        $('#btn-editEstablismentLocation').click(function () {
            $(this).text('Please wait.....');
            $.ajax({
                url: '<?php echo(site_url("restaurants/view_estdcontact")) ?>/' + res_id,
                dataType: 'json'

            })
                .done(function (data) {
                    $('#mdl-establishmentLocation').modal('show');
                    $('#est_city').val(data.city);
                    $('#est_area').val(data.area);
                    if (data.street) 
                        {
                            $('#est_street').val(data.street);
                        }
                    $('#est_landmark').val(data.landmark);
                    $('#est_other').val(data.other);

                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    $('#btn-editEstablismentLocation').text('Edit');
                });


        });
        /*=============================================================================*/
        $('#btn-updateMapCoordinate').click(function () {
            $(this).prop('disabled', true);
            $(this).text('Updating.........');

            $.ajax({
                url: '<?php echo(site_url("restaurants/update_coordinate")) ?>/' + res_id,
                type: 'POST',
                dataType: 'json',
                data: $('#form-mapCoordinates').serialize()
            })
                .done(function (data) {
                    if (data.status == true) {
                        $("html, body").animate({scrollTop: 0}, "slow");
                        location.reload();

                    } else {
                        $('#btn-updateMapCoordinate').prop('disabled', false);
                        $.each(data, function (index, val) {
                            $('#form-mapCoordinates' + ' #' + val.error_string).next().html(val.input_error);
                            $('#form-mapCoordinates' + ' #' + val.error_string).parent().addClass('has-error');
                        });


                    }
                })
                .fail(function () {
                    console.log("error");
                    $('#btn-updateMapCoordinate').prop('disabled', false);
                })
                .always(function () {

                });

        });
        /*==================================================================================*/
        $('#btn-updateOwnerManagerResNumber').click(function () {
            $(this).text('Updating.....');
            $(this).prop('disabled', true);
            $.ajax({
                url: '<?php echo(site_url("owner/update")) ?>/' + res_id,
                type: 'POST',
                dataType: 'json',
                data: $('#form-ownerManagerResNumber').serialize()
            })
                .done(function (data) {
                    if (data.status == true) {
                        $("html, body").animate({scrollTop: 0}, "slow");
                        location.reload();

                    } else {

                        $.each(data, function (index, val) {
                            $('#form-ownerManagerResNumber' + ' #' + val.error_string).next().html(val.input_error);
                            $('#form-ownerManagerResNumber' + ' #' + val.error_string).parent().addClass('has-error');
                        });


                    }
                })
                .fail(function () {
                    $('#btn-updateOwnerManagerResNumber').text('Update');
                    $('#btn-updateOwnerManagerResNumber').prop('disabled', false);
                    console.log("error");
                })
                .always(function () {
                    
                });


        });

        /* ==============================================================================*/
        $('#btn-updateEstdNumber').click(function () {
            $(this).text('Updating...........');
            $(this).prop('disabled', true);
            $.ajax({
                url: '<?php echo(site_url("restaurants/update_estd_contact")) ?>/' + res_id,
                type: 'POST',
                dataType: 'json',
                data: $('#form-establishment').serialize()
            })
                .done(function (data) {
                    if (data.status == true) {
                        $("html, body").animate({scrollTop: 0}, "slow");
                        location.reload();

                    } else {

                        $.each(data, function (index, val) {
                            $('#form-establishment' + ' #' + val.error_string).next().html(val.input_error);
                            $('#form-establishment' + ' #' + val.error_string).parent().addClass('has-error');
                        });


                    }
                })
                .always(function () {
                    $('#btn-updateEstdNumber').text('Update');
                    $('#btn-updateEstdNumber').prop('disabled', false);
                })
                .fail(function () {
                    console.log("error");
                });

        });
        /*=======================================================================================*/
        $('#btn-estdcontactedit').click(function () {
            $(this).text('please wait.......');
            $.ajax({
                url: '<?php echo(site_url("restaurants/view_estdcontact")) ?>/' + res_id,
                dataType: 'json'
            })
                .done(function (data) {
                    if (data) {
                        $('#mdl-estdcontact').modal('show');

                        $('#form-establishment #res_mobile1').val(data.mobile1);
                        $('#form-establishment #res_mobile2').val(data.mobile2);
                        $('#form-establishment #res_landline1').val(data.landline1);
                        $('#form-establishment #res_landline2').val(data.landline2);
                        $('#form-establishment #res_website').val(data.website);
                        $('#form-establishment #res_email').val(data.email);

                    }
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    $('#btn-estdcontactedit').text('Edit');
                });


        });

        /*====================================================================================*/
        /* restaurants manager edit contact model*/

        $('.btn-ownerEdit').click(function () {
            var partner_id = $(this).data('partnerid');

            $.ajax({
                url: '<?php echo(site_url("restaurants/view_owners")) ?>/' + res_id + '/' + partner_id,
                dataType: 'json'

            })
                .done(function (data) {

                    $('#mdl-mrnumber').modal('show');

                    $('#form-ownerManagerResNumber #owners_name').val(data.name);
                    $('#form-ownerManagerResNumber #owners_designation').val(data.designation);
                    $('#form-ownerManagerResNumber #owners_mobile1').val(data.mobile1);
                    $('#form-ownerManagerResNumber #owners_mobile2').val(data.mobile2);
                    $('#form-ownerManagerResNumber #owners_landline1').val(data.landline1);
                    $('#form-ownerManagerResNumber #owners_landline2').val(data.landline2);
                    $('#form-ownerManagerResNumber #partner_id').val(partner_id);
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {

                });


        });

        $('#btn-editmapcoordinate').click(function () {
            $(this).text('Please wait....');
            $.ajax({
                url: '<?php echo(site_url("restaurants/view_estdcontact")) ?>/' + res_id,
                dataType: 'json'

            })
                .done(function (data) {

                    $('#modal-mapcoordinate').modal('show');
                    $('#form-mapCoordinates #res_lat').val(data.lat);
                    $('#form-mapCoordinates #res_lon').val(data.lon);

                    if (data.google_map === '1') {
                        $('#form-mapCoordinates #map_yes').prop('checked', true);
                    }
                    else {
                        $('#form-mapCoordinates #map_no').prop('checked', true);
                    }
                })
                .fail(function () {
                    console.log(data);
                })
                .always(function () {
                    $('#btn-editmapcoordinate').text('Edit');
                });


        });
        /*===============================================================================*/
        $('body').on('change', '.pop_dishes', function () {

            if (!$(this).is(':checked')) {

                update_res_popdishes(res_id, $(this).val(), 0);
            }
            if ($(this).is(':checked')) {
                update_res_popdishes(res_id, $(this).val(), 1);
            }
        });

        $('body').on('change', '.foods', function () {

            if (!$(this).is(':checked')) {

                update_res_cousinbyfood(res_id, $(this).val(), 0);
            }
            if ($(this).is(':checked')) {
                update_res_cousinbyfood(res_id, $(this).val(), 1);
            }
        });
        $('body').on('change', '.cousins', function () {
            if (!$(this).is(':checked')) {

                update_res_cousin(res_id, $(this).val(), 0);
            }
            if ($(this).is(':checked')) {
                update_res_cousin(res_id, $(this).val(), 1);
            }
        });

        $('body').on('change', '.serves', function () {


            if (!$(this).is(':checked')) {

                update_res_serve(res_id, $(this).val(), 0);
            }
            if ($(this).is(':checked')) {
                update_res_serve(res_id, $(this).val(), 1);
            }
        });

        $('body').on('change', '.estd_type', function () {

            var res_id = '<?php echo($this->uri->segment(3)) ?>';
            if (!$(this).is(':checked')) {

                update_res_estd_type(res_id, $(this).val(), 0);
            }
            if ($(this).is(':checked')) {
                update_res_estd_type(res_id, $(this).val(), 1);
            }
        })

        $('body').on('change', '.facility', function () {

            var res_id = '<?php echo($this->uri->segment(3)) ?>';
            if (!$(this).is(':checked')) {
                update_res_facility(res_id, $(this).val(), 0);
            }
            if ($(this).is(':checked')) {
                update_res_facility(res_id, $(this).val(), 1);
            }
        })


        /*=======================================================================================
         */
        total();

        $('.estimate_cost_topic').keyup(function () {

            total();
        });

        $('#btn_servesave').click(function () {
            insertIntoServe('serve_form', 'btn_servesave', 'serve_checkbox');
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
        $('#btn_cuisineByFoodSave').click(function () {

            insertIntoCuisineByFood('form-cuisineByFood', 'btn_cuisineByFoodSave', 'btn_addCousinByFood');
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
    /*=============================================================================*/
    $('#start_time_all1').focusout(function () {
        $('.start_time1').val($(this).val());
    });
    $('#end_time_all1').focusout(function () {
        $('.end_time1').val($(this).val());
    });
    /*=============================================================================*/
    $('#start_time_all2').focusout(function () {
        $('.start_time2').val($(this).val());
    });
    $('#end_time_all2').focusout(function () {
        $('.end_time2').val($(this).val());
    });
    /*================================================================================*/
    function maxLengthCheck(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
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
                    temp_checkbox += '<input type="checkbox" name="serves[]" class="serves" value="' + data.data.serves_id + '">' + data.data.serves_name + '</label>';

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
                    temp_checkbox += '<input type="checkbox" name="establishment_type[]" class="estd_type" value="' + data.data.type_id + '">' + data.data.type + '</label>';

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
                    temp_checkbox += '<input type="checkbox" name="facility[]" class="facility" value="' + data.data.facilities_id + '">' + data.data.facility + '</label>';

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
                    temp_checkbox += '<input type="checkbox" name="cousins[]" class="cousins" value="' + data.data.cousin_id + '">' + data.data.cousin + '</label>';

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
                    temp_checkbox += '<input type="checkbox" name="cousins[]" class="foods" value="' + data.data.food_id + '">' + data.data.food + '</label>';

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
                    temp_checkbox += '<input type="checkbox" name="pop_dishes[]" class="pop_dishes" value="' + data.data.pop_dishes_id + '">' + data.data.pop_dishes + '</label>';

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


    function update_res_estd_type(res_id, estd_id, status) {
        $('.estd_type').prop('disabled', true);
        $('#msg-estdTypeWait').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Updating.....');
        $('#msg-estdTypeWait').show();
        $.ajax({
            url: '<?php echo(site_url("establishment_type/update_res_estdtype")) ?>/' + res_id + '/' + estd_id + '/' + status,
            type: 'POST',
            dataType: 'json'
        })
            .done(function (data) {
                $('#msg-estdTypeWait').html('Update Successfully !!');
                setTimeout(function () {
                    $('#msg-estdTypeWait').hide();
                    $('.estd_type').prop('disabled', false);
                }, 1000);
                console.log(data);
            })
            .always(function () {

            })
            .fail(function () {
                console.log("error");
            });

    }

    function update_res_serve(res_id, serve_id, status) {
        $('.serves').prop('disabled', true);
        $('#msg-serveswait').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Updating.....');
        $('#msg-serveswait').show();
        $.ajax({
            url: '<?php echo(site_url("serve/update_res_serves")) ?>/' + res_id + '/' + serve_id + '/' + status,
            type: 'POST',
            dataType: 'json'
        })
            .done(function (data) {

                $('#msg-serveswait').html('Update Successfully !!');

                setTimeout(function () {
                    $('#msg-serveswait').hide();
                    $('.serves').prop('disabled', false);
                }, 1000);

                console.log(data);
            })
            .fail(function () {
                console.log("error");
            });
    }

    function update_res_facility(res_id, facility_id, status) {
        $('.facility').prop('disabled', true);
        $('#msg-facilityWait').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Updating.....');
        $('#msg-facilityWait').show();
        $.ajax({
            url: '<?php echo(site_url("facility/update_res_facility")) ?>/' + res_id + '/' + facility_id + '/' + status,
            type: 'POST',
            dataType: 'json'
        })
            .done(function (data) {
                $('#msg-facilityWait').html('Update Successfully !!');

                setTimeout(function () {
                    $('#msg-facilityWait').hide();
                    $('.facility').prop('disabled', false);
                }, 1000);
                console.log(data);
            })
            .fail(function () {
                console.log("error");
            });
    }

    function update_res_cousin(res_id, cousin_id, status) {
        $('.cousins').prop('disabled', true);
        $('#msg-cousinByCountryWait').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Updating.....');
        $('#msg-cousinByCountryWait').show();
        $.ajax({
            url: '<?php echo(site_url("cousin/update_res_cousin")) ?>/' + res_id + '/' + cousin_id + '/' + status,
            type: 'POST',
            dataType: 'json'
        })
            .done(function (data) {
                $('#msg-cousinByCountryWait').html('Update Successfully !!');

                setTimeout(function () {
                    $('#msg-cousinByCountryWait').hide();
                    $('.cousins').prop('disabled', false);
                }, 1000);
                console.log(data);
            })
            .fail(function () {
                console.log("error");
            });
    }

    function update_res_cousinbyfood(res_id, cousin_id, status) {
        $('.foods').prop('disabled', true);
        $('#msg-cousinByFoodWait').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Updating.....');
        $('#msg-cousinByFoodWait').show();
        $.ajax({
            url: '<?php echo(site_url("cousin/update_res_cousinbyfood")) ?>/' + res_id + '/' + cousin_id + '/' + status,
            type: 'POST',
            dataType: 'json'
        })
            .done(function (data) {
                $('#msg-cousinByFoodWait').html('Update Successfully !!');

                setTimeout(function () {
                    $('#msg-cousinByFoodWait').hide();
                    $('.foods').prop('disabled', false);
                }, 1000);
                console.log(data);
            })
            .fail(function () {
                console.log("error");
            });
    }

    function update_res_popdishes(res_id, dish_id, status) {
        $('.pop_dishes').prop('disabled', true);
        $('#msg-popDishWait').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Updating.....');
        $('#msg-popDishWait').show();
        $.ajax({
            url: '<?php echo(site_url("pop_dish/update_res_popdish")) ?>/' + res_id + '/' + dish_id + '/' + status,
            type: 'POST',
            dataType: 'json'
        })
            .done(function (data) {
                $('#msg-popDishWait').html('Update Successfully !!');

                setTimeout(function () {
                    $('#msg-popDishWait').hide();
                    $('.pop_dishes').prop('disabled', false);
                }, 1000);
                console.log(data);
            })
            .fail(function () {
                console.log("error");
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

    function parking_status() {
        var count = ('.parking_options:checked').length;
        if (count < 1) {
            alert('hello' + count);
            $('.parking_options').parent('label').hide();
        }
        else {
            $('.parking_options').parent('label').show();
        }
    }


</script>
