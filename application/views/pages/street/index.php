<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1>Street</h1>
	</div>
</div>
<?php if ($this->session->flashdata('message')): ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong><?php echo($this->session->flashdata('message')) ?></strong>
			</div>
		</div>
	</div>
<?php endif ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<button type="button" id="btn_addStreet" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp&nbspAdd New</button>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hover" id="table-datatable">
					<thead>
						<tr>
							<th>Sn.</th>
							<th>Area</th>
							<th>Street</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $count=1; ?>
						<?php foreach ($streets as $s): ?>
							<tr>
								<td>
									<?php echo($count); $count++; ?>
								</td>
								<td>
									<?php echo($s->area) ?>
								</td>
								<td>
									<?php echo($s->name); ?>
								</td>
								<td width="30px">
									<div class="btn-group">
	                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	                                        Action
	                                        <span class="caret"></span>
	                                    </button>
	                                    <ul class="dropdown-menu pull-right" role="menu">
	                                        <li>
	                                        	<a href="#" class="btn-edit" data-areaid="<?php echo($s->area_id) ?>" data-streetid="<?php echo($s->id) ?>"><label class="text-success"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</label></a>
	                                        </li>
	                                        <li>
	                                        	<a href="#" class="delete" data-fid="<?php echo($s->id) ?>"><label class="text-warning"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;Delete</label></a>
	                                        </li>
	                                    </ul>
	                                </div>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal-update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Update Street</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" id="update-street_form">
                    <div class="form-group">
                    	<label>Area Name <span class="text-danger">*</span></label>
                        <select name="area" id="area" class="form-control" required="required">
                        	<option value="0">Select Area</option>
                        	<?php foreach ($areas as $a): ?>
                        		<option value="<?php echo($a->area_id) ?>"><?php echo($a->area) ?></option>
                        	<?php endforeach ?>
                        </select>
                        <span></span>
                    </div>
                    <div class="form-group">
                    	<label>Street Name <span class="text-danger">*</span></label>
                    	<input type="text" name="street" id="street" class="form-control" placeholder="Street Name" >
                    	<span></span>
                    </div>
                  
                </form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btn-update" class="btn btn-primary">Update</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-delete">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top:100px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="" id="btn-delete" class="btn btn-danger" id="delete_link">Delete</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
            </div>
		</div>
	</div>
</div>

<div class="modal fade" id="mdl_city">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Street</h4>
			</div>
			 <div class="modal-body">
                <form action="" method="POST" id="street_form">
                    <div class="form-group">
                    	<label>Area Name <span class="text-danger">*</span></label>
                        <select name="area" id="area" class="form-control" required="required">
                        	<option value="0">Select Area</option>
                        	<?php foreach ($areas as $a): ?>
                        		<option value="<?php echo($a->area_id) ?>"><?php echo($a->area) ?></option>
                        	<?php endforeach ?>
                        </select>
                        <span></span>
                    </div>
                    <div class="form-group">
                    	<label>Street Name <span class="text-danger">*</span></label>
                    	<input type="text" name="street" id="street" class="form-control" placeholder="Street Name" >
                    	<span></span>
                    </div>
                  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_streetSave" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var street_id='';
		$('#table-datatable').DataTable({
	        "responsive": true
	    });

	    $('body').on('click','.btn-edit',function() 
		{
			street_id=$(this).data('streetid');
			$('#update-street_form #area').val($(this).data('areaid'));
			$('#update-street_form #street').val($.trim($(this).closest('tr').find('td:eq(2)').text()));
			$('#modal-update').modal('show');
		});

		$('#btn-update').click(function() {
			$(this).text('Updating.......');
			$(this).prop('disabled',true);
			$.ajax({
				url: '<?php echo(site_url("street/update")) ?>/'+street_id,
				type: 'POST',
				dataType: 'json',
				data: $('#update-street_form').serialize()
			})
			.done(function(data) {
				console.log("success");
				if (data.status==true)
	                {
	                    $("html, body").animate({ scrollTop: 0 }, "slow");
	                    location.reload(true);
	                   
	                }
	                else
	                {
	                    $.each(data, function(index, val) {
	                             $('#update-street_form'+' #'+val.error_string).next().html(val.input_error);
	                            $('#update-street_form'+' #'+val.error_string).parent().parent().addClass('has-error');
	                        });

	                    $(this).text('Update');
						$(this).prop('disabled',false);
	                }
			})
			.fail(function() {
				alert('Something went wrong !');
				$(this).text('Update');
			    $(this).prop('disabled',false);
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});

		$('body').on('click','.delete',function() {
			var fid=$(this).data('fid');
			var url='<?php echo(site_url()) ?>/street/delete/'+fid;
			$('#btn-delete').attr('href',url);
			$('#modal-delete').modal('show');
		});

		 $('#btn_addStreet').click(function() 
	      {
	            $('#mdl_city').modal('show');
	      });

		 $('#btn_streetSave').click(function() {
          	insertIntoStreet('street_form','btn_streetSave','btn_addStreet');
       	});

		function insertIntoStreet(form_id,button_id,cousin_id)
	    {
	        disable_button(button_id,'Saving');

	        $.ajax({
	            url: '<?php echo(site_url("street/add")) ?>',
	            dataType:'json',
	            type:'post',
	            data:$('#'+form_id).serialize(),
	            success:function(data)
	            {
	                console.log(data);
	                if (data.status==true)
	                {
	                    $("html, body").animate({ scrollTop: 0 }, "slow");
	                    location.reload(true);
	                   
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

		
	});
</script>