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
                            <h1><?php echo($restaurants->res_name) ?></h1>
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
                            <th colspan="2">Establishment's Contact Number 
                            <div class="pull-right">
                                <button type="button" class="btn btn-xs btn-primary">Edit</button>
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
                                <?php echo($restaurants->landline1) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Land line2
                            </td>
                            <td>
                                <?php echo($restaurants->landline2) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Website
                            </td>
                            <td>
                                <?php echo($restaurants->website) ?>
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
                                <button type="button" class="btn btn-xs btn-primary">Edit</button>
                            </div>
                        </th>
                        <tr>
                            <td>
                                Latitude
                            </td>
                            <td>
                                <?php echo($restaurants->lat) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Longitude
                            </td>
                            <td>
                                <?php echo($restaurants->lon) ?>
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
                        <th colspan="2">Owner's or manager Restaurant Number
                            <div class="pull-right">
                                <button type="button" class="btn btn-xs btn-primary">Edit</button>
                            </div>
                        </th>
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                <?php echo($owners[0]->name) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Designation
                            </td>
                            <td>
                                <?php echo($owners[0]->designation) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mobile 1
                            </td>
                            <td>
                                <?php echo($owners[0]->mobile1) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mobile 2
                            </td>
                            <td>
                                <?php echo($owners[0]->mobile2) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Land line1
                            </td>
                            <td>
                                <?php echo($owners[0]->landline1) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Land line2
                            </td>
                            <td>
                                <?php echo($owners[0]->landline2) ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="well-sm well">
                    <table class="table table-bordered">
                        <th colspan="2">Establishment Location
                            <div class="pull-right">
                                <button type="button" class="btn btn-xs btn-primary">Edit</button>
                            </div>
                        </th>
                        <tr>
                            <td>
                                City
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Area
                            </td>
                            <td>
                                <?php echo($restaurants->area) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Street
                            </td>
                            <td>
                                <?php echo($restaurants->street) ?>
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
                <div class="well-sm well">
                    <b>Serves: </b><button type="button" id="btn_addServe" class="btn btn-sm btn-info pull-right"><i class="fa fa-plus fa"></i>   Add New</button>
                    <div id="serve_checkbox">
                        <?php foreach ($serves as $ser) {
                            ?>
                            <label class="checkbox-inline">
                                <!-- <input type="checkbox" name="serves[]"
                                       value="<?php echo $ser->serves_id ?>"><?php echo $ser->serves_name ?> -->
                                      <?php 
                                      $data = array(
                                        'name'        => 'serves[]',
                                        'class'          => 'serves',
                                        'value'       => $ser->serves_id,
                                        'checked'     => $ser->res_id?TRUE:FALSE
                                        );

                                       ?>
                                       <?php echo form_checkbox($data); ?><?php echo $ser->serves_name ?>

                            </label>
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
                        
                        <?php foreach ($service_time as $st): ?>
                            <?php if ($st->day==1): ?>
                                <tr>
                                    <td>Sunday</td>
                                    <td><?php echo($st->opening_time?$st->opening_time:'-- -- --') ?></td>
                                    <td><?php echo($st->closing_time?$st->closing_time:'-- -- --') ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($st->day==2): ?>
                                <tr>
                                    <td>Monday</td>
                                    <td><?php echo($st->opening_time?$st->opening_time:'-- -- --') ?></td>
                                    <td><?php echo($st->closing_time?$st->closing_time:'-- -- --') ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($st->day==2): ?>
                                <tr>
                                    <td>Tuesday</td>
                                    <td><?php echo($st->opening_time?$st->opening_time:'-- -- --') ?></td>
                                    <td><?php echo($st->closing_time?$st->closing_time:'-- -- --') ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($st->day==2): ?>
                                <tr>
                                    <td>Wednesday</td>
                                    <td><?php echo($st->opening_time?$st->opening_time:'-- -- --') ?></td>
                                    <td><?php echo($st->closing_time?$st->closing_time:'-- -- --') ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($st->day==2): ?>
                                <tr>
                                    <td>Thursday</td>
                                    <td><?php echo($st->opening_time?$st->opening_time:'-- -- --') ?></td>
                                    <td><?php echo($st->closing_time?$st->closing_time:'-- -- --') ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($st->day==2): ?>
                                <tr>
                                    <td>Friday</td>
                                    <td><?php echo($st->opening_time?$st->opening_time:'-- -- --') ?></td>
                                    <td><?php echo($st->closing_time?$st->closing_time:'-- -- --') ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($st->day==2): ?>
                                <tr>
                                    <td>Saturday</td>
                                    <td><?php echo($st->opening_time?$st->opening_time:'-- -- --') ?></td>
                                    <td><?php echo($st->closing_time?$st->closing_time:'-- -- --') ?></td>
                                </tr>
                            <?php endif ?>
                        <?php endforeach ?>
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
                        <?php foreach ($res_costs as $topic) {
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

                        } ?>
                        <!-- <tr>
                            <td>
                                <b>Total</b>
                            </td>
                            <td>
                               <input type="number" class="form-control" disabled="" name="total" id="total" value="0">
                            </td>
                        </tr> -->
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
                <div class="well-sm well" id="estd_checkbox">
                    <b> Establishment Type:</b> <span class="pull-right"><button type="button" id="btn_establishmentType" class="btn btn-sm btn-info"> Add New</button></span>
                    <hr/>
                    <?php foreach ($est_type as $est): ?>
                        <label class="checkbox-inline">
                         <?php 
                            $data = array(
                                'name'        => 'establishment_type[]',
                                'class'          => 'estd_type',
                                'value'       =>$est->type_id ,
                                'checked'     => $est->res_id?TRUE:FALSE
                                );

                               ?>
                            <?php echo form_checkbox($data); ?><?php echo $est->type ?>
                            </label>
                    <?php endforeach ?>
                   
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well" id="facility_checkbox">
                    <b> Facilities :</b><span class="pull-right"><button type="button" id="btn_facilities" class="btn btn-sm btn-info"> Add New</button></span>
                    <hr/>

                    <?php foreach ($facilities as $fac): ?>
                        <label class="checkbox-inline">
                         <?php 
                            $data = array(
                                'name'        => 'facilities[]',
                                'class'          => 'facility',
                                'value'       =>$fac->facilities_id ,
                                'checked'     => $fac->res_id?TRUE:FALSE
                                );

                               ?>
                            <?php echo form_checkbox($data); ?><?php echo $fac->facility ?>
                            </label>
                    <?php endforeach ?>
                   
                    
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
                       
                         <?php foreach ($happy_hours as $hh): ?>
                            
                                <tr>
                                    <td><?php switch ($hh->day) {
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
                                    <td><?php echo($hh->start_time?$hh->start_time:'-- -- --') ?></td>
                                    <td><?php echo($hh->end_time?$hh->end_time:'-- -- --') ?></td>
                                </tr>
                          
                            
                            
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well" id="cousin_checkbox">
                    <b> Cousins by Country :</b><span class="pull-right"><button type="button" id="btn_addCousin" class="btn btn-sm btn-info "><i class="fa fa-plus fa"></i> Add New</button></span>
                    <hr/>
                    <?php foreach ($cousins as $Cousin): ?>
                        <label class="checkbox-inline">
                         <?php 
                            $data = array(
                                'name'        => 'cousins[]',
                                'class'          => 'cousins',
                                'value'       =>$Cousin->cousin_id ,
                                'checked'     => $Cousin->res_id?TRUE:FALSE
                                );

                               ?>
                            <?php echo form_checkbox($data); ?><?php echo $Cousin->cousin ?>
                            </label>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well">
                    <b> Cousins by Food :</b>
                    <hr/>
                     <?php foreach ($foods as $food): ?>
                        <label class="checkbox-inline">
                         <?php 
                            $data = array(
                                'name'        => 'foods[]',
                                'class'          => 'foods',
                                'value'       =>$food->food_id  ,
                                'checked'     => $food->res_id?TRUE:FALSE
                                );

                               ?>
                            <?php echo form_checkbox($data); ?><?php echo $food->food ?>
                            </label>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="well-sm well" id="populardish_checkbox">
                    <b> Popular Dish:</b><span class="pull-right"> <button type="button" id="btn_addPopDish" class="btn btn-sm btn-info"><i class="fa fa-plus fa"></i> Add New</button></span>
                    <hr/>
                     <?php foreach ($pop_dishes as $pop): ?>
                        <label class="checkbox-inline">
                         <?php 
                            $data = array(
                                'name'        => 'pop_dishes[]',
                                'class'          => 'pop_dishes',
                                'value'       =>$pop->pop_dishes_id ,
                                'checked'     => $pop->res_id?TRUE:FALSE
                                );

                               ?>
                            <?php echo form_checkbox($data); ?><?php echo $pop->pop_dishes ?>
                            </label>
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
                <h4 class="modal-title">Add Serve</h4>
            </div>
            <div class="modal-body">
                <form action="" id="serve_form">

                    <div class="form-group">
                        <label for="">label</label>
                        <input type="text" name="serve_name" id="serve_name" class="form-control" placeholder="Input Serve Type">
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
                <form action="" method="POST"  id="estd_typeform">
                    <div class="form-group">
                        <label for="">Establishment Type</label>
                        <input type="text" name="estd_type" id="estd_type" class="form-control" placeholder="Input Establishment Type">
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
                        <input type="text" name="facility_name" id="facility_name" class="form-control" id="" placeholder="Input Facility">
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
                        <input type="text" name="cousin_name" class="form-control" id="cousin_name" placeholder="Cousin Name">
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

<script>
    $(document).ready(function() {

        $('body').on('change','.serves',function() {

            var res_id='<?php echo($this->uri->segment(3)) ?>';
           if (!$(this).is(':checked')) 
           {
                
                update_res_serve(res_id,$(this).val(),0);
            }
            if ($(this).is(':checked')) 
            {
                update_res_serve(res_id,$(this).val(),1);
            }
        });

        $('body').on('change','.estd_type',function(){

           var res_id='<?php echo($this->uri->segment(3)) ?>';
           if (!$(this).is(':checked')) 
           {
                
                update_res_estd_type(res_id,$(this).val(),0);
            }
            if ($(this).is(':checked')) 
            {
                update_res_estd_type(res_id,$(this).val(),1);
            }
        })

        $('body').on('change','.facility',function(){
            
           var res_id='<?php echo($this->uri->segment(3)) ?>';
           if (!$(this).is(':checked')) 
           {
                update_res_facility(res_id,$(this).val(),0);
            }
            if ($(this).is(':checked')) 
            {
                update_res_facility(res_id,$(this).val(),1);
            }
        })


/*=======================================================================================
*/        total();

       $('.estimate_cost_topic').keyup(function() {

          total();
       });

       $('#btn_servesave').click(function() {
          insertIntoServe('serve_form','btn_servesave','serve_checkbox');
       });

       $('#btn_estdtypesave').click(function() {
           insertIntoEstType('estd_typeform','btn_estdtypesave','btn_establishmentType')
       });

       $('#btn_facilitysave').click(function() 
       {
          insertIntoFacilitis('facility_form','btn_facilitysave','btn_facilities')
       });

       $('#btn_cousinsave').click(function() {

          insertIntoCousins('cousin_form','btn_cousinsave','btn_addCousin');
       });

       $('#btn_popDishSave').click(function() 
       {
           insertIntoPopularDish('popdishform','btn_popDishSave','btn_addPopDish')
       });
/*==============================================================*/

        $('#btn_addPopDish').click(function() {

            $('#mdl_populardish').modal('show');
        });

        $('#btn_addCousin').click(function() 
        {
            $('#mdl_cousin').modal('show');
        });

        $('#btn_facilities').click(function() 
        {
            $('#mdl_facility').modal('show');
        });

       $('#btn_establishmentType').click(function() {

           $('#mdl_establishmentType').modal('show');
       });
        
        $('#btn_addServe').click(function() {
            $('#mdl-addserve').modal('show');
        });    
/*=================================================================================*/
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
/*=============================================================================*/
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
/*================================================================================*/
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
            type:'post',
            data:$('#'+form_id).serialize(),
            success:function(data)
            {
                console.log(data);
                if(data.status===true)
                {
                    enable_button(button_id,'Save');
                    var temp_checkbox='<label class="checkbox-inline">';
                        temp_checkbox+='<input type="checkbox" name="serves[]" value="'+data.data.serves_id+'">'+data.data.serves_name+'</label>';
                        
                    $('#serve_checkbox').append(temp_checkbox);
                    $('#'+form_id)[0].reset();
                    $('#mdl-addserve').modal('hide');

                }
                else
                {
                        $.each(data, function(index, val) {
                             $('#'+form_id+' #'+val.error_string).next().html(val.input_error);
                            $('#'+form_id+' #'+val.error_string).parent().parent().addClass('has-error');
                        });

                    enable_button(button_id,'Save');
                }     
            }
        })
        
        .fail(function() {

            enable_button(button_id,'Save');
        });
    }

    function insertIntoEstType(form_id,button_id,estd_typeid)
    {
        disable_button(button_id,'Saving');

        $.ajax({
            url: '<?php echo(site_url("establishment_type/add")) ?>',
            dataType:'json',
            type:'post',
            data:$('#'+form_id).serialize(),
            success:function(data)
            {
                console.log(data);
                if (data.status==true) 
                {
                    enable_button(button_id,'Save');

                    var temp_checkbox='<label class="checkbox-inline">';
                        temp_checkbox+='<input type="checkbox" name="establishment_type[]" value="'+data.data.type_id+'">'+data.data.type+'</label>';
                    
                    $('#estd_checkbox').append(temp_checkbox);
                    $('#'+form_id)[0].reset();
                    $('#mdl_establishmentType').modal('hide');
                    
                }
                else
                {
                     $.each(data, function(index, val) {
                             $('#'+form_id+' #'+val.error_string).next().html(val.input_error);
                            $('#'+form_id+' #'+val.error_string).parent().parent().addClass('has-error');
                        });

                    enable_button(button_id,'Save');
                }
                
            }
        })
        
        .fail(function() {

            enable_button(button_id,'Save');
        });
    }

    function insertIntoFacilitis(form_id,button_id,facility_id)
    {
        disable_button(button_id,'Saving');

        $.ajax({
            url: '<?php echo(site_url("facility/add")) ?>',
            dataType:'json',
            type:'post',
            data:$('#'+form_id).serialize(),
            success:function(data)
            {
                console.log(data);
                if (data.status==true) 
                {

                    enable_button(button_id,'Save');

                    var temp_checkbox='<label class="checkbox-inline">';
                        temp_checkbox+='<input type="checkbox" name="facility[]" value="'+data.data.facilities_id+'">'+data.data.facility+'</label>';
                  
                    $('#facility_checkbox').append(temp_checkbox);
                    $('#'+form_id)[0].reset();
                    $('#mdl_facility').modal('hide');
                    
                }
                else
                {
                     $.each(data, function(index, val) {
                             $('#'+form_id+' #'+val.error_string).next().html(val.input_error);
                            $('#'+form_id+' #'+val.error_string).parent().parent().addClass('has-error');
                        });

                    enable_button(button_id,'Save');
                }
            }
        })
        
        .fail(function() {

            enable_button(button_id,'Save');
        });
    }

    function insertIntoCousins(form_id,button_id,cousin_id)
    {
        disable_button(button_id,'Saving');

        $.ajax({
            url: '<?php echo(site_url("Cousin/add")) ?>',
            dataType:'json',
            type:'post',
            data:$('#'+form_id).serialize(),
            success:function(data)
            {
                console.log(data);
                if (data.status==true)
                {
                    enable_button(button_id,'Save');
                    var temp_checkbox='<label class="checkbox-inline">';
                        temp_checkbox+='<input type="checkbox" name="cousins[]" value="'+data.data.cousin_id+'">'+data.data.cousin+'</label>';
                    
                    $('#cousin_checkbox').append(temp_checkbox);
                     $('#'+form_id)[0].reset();
                    $('#mdl_cousin').modal('hide');
                   
                }
                else
                {
                    $.each(data, function(index, val) {
                             $('#'+form_id+' #'+val.error_string).next().html(val.input_error);
                            $('#'+form_id+' #'+val.error_string).parent().parent().addClass('has-error');
                        });

                    enable_button(button_id,'Save');
                }
               
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
            url: '<?php echo(site_url("pop_dish/add")) ?>',
            dataType:'json',
            type:'post',
            data:$('#'+form_id).serialize(),
            success:function(data)
            {
               if (data.status==true)
                {
                    enable_button(button_id,'Save');

                    var temp_checkbox='<label class="checkbox-inline">';
                        temp_checkbox+='<input type="checkbox" name="pop_dishes[]" value="'+data.data.pop_dishes_id+'">'+data.data.pop_dishes+'</label>';
                    
                    $('#populardish_checkbox').append(temp_checkbox);
                    $('#'+form_id)[0].reset();
                    $('#mdl_populardish').modal('hide');
                }
                else
                {
                     $.each(data, function(index, val) {
                             $('#'+form_id+' #'+val.error_string).next().html(val.input_error);
                            $('#'+form_id+' #'+val.error_string).parent().parent().addClass('has-error');
                        });

                    enable_button(button_id,'Save');
                }
                
                    
            }
        })
        
        .fail(function() {

            enable_button(button_id,'Save');
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


    function update_res_estd_type (res_id,estd_id,status) 
    {
        
        $.ajax({
            url: '<?php echo(site_url("establishment_type/update_res_estdtype")) ?>/'+res_id+'/'+estd_id+'/'+status,
            type: 'POST',
            dataType: 'json'
        })
        .done(function(data) {
            console.log(data);
        })
        .fail(function() {
            console.log("error");
        });
        
    }

    function update_res_serve (res_id,serve_id,status) 
    {
         $.ajax({
            url: '<?php echo(site_url("serve/update_res_serves")) ?>/'+res_id+'/'+serve_id+'/'+status,
            type: 'POST',
            dataType: 'json'
        })
        .done(function(data) {
            console.log(data);
        })
        .fail(function() {
            console.log("error");
        });
    }

    function update_res_facility (res_id,facility_id,status) 
    {
         $.ajax({
            url: '<?php echo(site_url("facility/update_res_facility")) ?>/'+res_id+'/'+facility_id+'/'+status,
            type: 'POST',
            dataType: 'json'
        })
        .done(function(data) {
            console.log(data);
        })
        .fail(function() {
            console.log("error");
        });
    }


</script>
