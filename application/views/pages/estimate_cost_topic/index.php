
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1>Cost for two</h1>
            </div>
        </div>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><?php echo($this->session->flashdata('success')) ?></strong>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <button type="button" id="btn_addnew_estimate_cost_topic" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp&nbspAdd</button>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-responsive" id="table_estimate_cost_topic">
                            <thead>
                            <tr><th>SN.</th><th>topic</th><td>Action</td></tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            $('#btn_addnew_estimate_cost_topic').click(function(){
                $('#modal_estimate_cost_topic').modal('show');

            });
        </script>
        
        <div class="modal fade" id="modal_estimate_cost_topic">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add new cost for two</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo(form_open('estimate_cost_topic/add',array('id'=>'form_estimate_cost_topic'))) ?><div class="form-group">
                                    <label for="">topic</label>
                                    <input type="text" name="topic" class="form-control" id="topic" placeholder="Input field">
                                    <span></span>
                                </div>
                        <?php echo(form_close()); ?>
                    </div>
                    <div class="modal-footer" >
                        <button type="submit" id="btn_save_estimate_cost_topic" class="btn btn-primary">Save</button>
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-editestimate_cost_topic">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Update cost for two</h4>
                    </div>
                    <div class="modal-body">
                        <div class="loader col-md-4 col-md-offset-4 clearfix"></div>
                        <form id="form_update_estimate_cost_topic"><div class="form-group">
                                    <label for="">topic</label>
                                    <input type="text" name="topic" class="form-control" id="topic" placeholder="Input field">
                                    <span></span>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_update_estimate_cost_topic" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                var update_id='';
                $('body').on('click','.btn_editestimate_cost_topic',function(){
                    $('#modal-editestimate_cost_topic').modal('show');
                    update_id=$(this).data('estimate_cost_topic');
                    get_estimate_cost_topic_updatedata($(this).data('estimate_cost_topic'));
                });
                $('#btn_save_estimate_cost_topic').click(function(event) {
                    event.preventDefault();
                    $('#btn_save_estimate_cost_topic').prop('disabled',true);
                    $('#btn_save_estimate_cost_topic').text('Saving.....');
                    $.ajax({
                        url: '<?php echo(site_url("estimate_cost_topic/add")) ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: $('#form_estimate_cost_topic').serialize(),
                    })
                    .done(function(data) {
                        if(data.status==true)
                        {
                            location.reload();
                        }
                        else
                        {
                            $('#btn_save_estimate_cost_topic').prop('disabled',false);
                            $('#btn_save_estimate_cost_topic').text('Save');
                            $.each(data, function(index, val) {
                                 $('#form_estimate_cost_topic #'+val.error_string).next().html(val.input_error);
                                $('#form_estimate_cost_topic #'+val.error_string).parent().parent().addClass('has-error');
                            });
                        }
                        console.log("success");
                    })
                    .fail(function() {
                        alert('something went wrong !');
                        $('#btn_save_estimate_cost_topic').prop('disabled',false);
                        $('#btn_save_estimate_cost_topic').text('Save');
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                });
                

            $('#btn_update_estimate_cost_topic').click(function(event) {
                    event.preventDefault();
                    $('#btn_update_estimate_cost_topic').prop('disabled',false);
                    $('#btn_update_estimate_cost_topic').text('Updating....');
                    $.ajax({
                        url: '<?php echo(site_url("estimate_cost_topic/update")) ?>/'+update_id,
                        type: 'POST',
                        dataType: 'json',
                        data: $('#form_update_estimate_cost_topic').serialize(),
                    })
                    .done(function(data) {
                        if(data.status==true)
                        {
                            location.reload();
                        }
                        else
                        {
                            $('#btn_update_estimate_cost_topic').prop('disabled',false);
                            $('#btn_update_estimate_cost_topic').text('Update');
                            $.each(data, function(index, val) {
                                 $('#form_update_estimate_cost_topic #'+val.error_string).next().html(val.input_error);
                                $('#form_update_estimate_cost_topic #'+val.error_string).parent().parent().addClass('has-error');
                            });
                        }
                        console.log("success");
                    })
                    .fail(function() {
                        alert('something went wrong !');
                        $('#btn_update_estimate_cost_topic').prop('disabled',false);
                        $('#btn_update_estimate_cost_topic').text('Update');
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                });
                $('#table_estimate_cost_topic').DataTable({ 

                        'processing': true, //Feature control the processing indicator.
                        'serverSide': true, //Feature control DataTables' server-side processing mode.
                        'order': [], //Initial no order.
                        // Load data for the table's content from an Ajax source
                        'ajax': {
                            'url': '<?php echo(site_url("estimate_cost_topic/datatable")) ?>',
                            'type': 'POST'
                        },
                        //Set column definition initialisation properties.
                        'columnDefs': [
                        { 
                            'targets': [ 0,-1], //last column
                            'orderable': false, //set not orderable
                        },
                        ],
                    });

                
            });

            function get_estimate_cost_topic_updatedata(id)
            {
                $('.loader').show();
                $('#form_update_estimate_cost_topic').hide();
                $('.modal-footer').find('button').hide();
                $.ajax({
                        url: '<?php echo(site_url("estimate_cost_topic/get_update_data")) ?>/'+id,
                        type: 'POST',
                        dataType: 'json'
                    })
                    .done(function(data) {
                        $('.loader').hide();
                        $('#form_update_estimate_cost_topic').show();
                        $('.modal-footer').find('button').show();
                        $('#form_update_estimate_cost_topic #topic').val(data.topic);
                        $('#form_update_estimate_cost_topic #status').val(data.status);
                        $('#form_update_estimate_cost_topic #order_by').val(data.order_by);

                    })
                    .fail(function(data){
                        console.log(data);
                        alert('Something went wrong ! '+data);
                    });
            }
        </script>
        
        