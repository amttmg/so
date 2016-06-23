<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1>Area</h1>
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
				<button type="button" id="btn_addArea" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp&nbspAdd New</button>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hover" id="table-datatable">
					<thead>
						<tr>
							<th>Sn.</th>
							<th>City</th>
							<th>Area</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $count=1; ?>
						<?php foreach ($area as $a): ?>
							<tr>
								<td>
									<?php echo($count); $count++; ?>
								</td>
								<td>
									<?php echo($a->city); ?>
								</td>
								<td>
									<?php echo($a->area) ?>
								</td>
								<td width="30px">
									<div class="btn-group">
	                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	                                        Action
	                                        <span class="caret"></span>
	                                    </button>
	                                    <ul class="dropdown-menu pull-right" role="menu">
	                                        <li>
	                                        	<a href="#"><label class="text-success"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</label></a>
	                                        </li>
	                                        <li>
	                                        	<a href="#" class="delete" data-fid="<?php echo($a->area_id) ?>"><label class="text-warning"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;Delete</label></a>
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

<div class="modal fade" id="mdl_area">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Area</h4>
			</div>
			 <div class="modal-body">
                <form action="" method="POST" id="area_form">
                    <div class="form-group">
                    	<label>City</label>
                    	<select name="city" id="city" class="form-control" required="required">
	                    	<option value="0">Please select city</option>
	                    	<?php foreach ($cities as $city): ?>
	                    		<option value="<?php echo($city->id) ?>"><?php echo($city->name) ?></option>
	                    	<?php endforeach ?>
	                    </select>
	                    <span></span>
                    </div>
                    <div class="form-group">
                        <label for="">Area Name</label>
                        <input type="text" name="area" id="area" class="form-control" placeholder="Area Name" value="">
                        <span></span>
                    </div>

                  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_areaSave" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		$('#table-datatable').DataTable({
	        "responsive": true
	    });

		$('.delete').click(function() {
			var fid=$(this).data('fid');
			var url='<?php echo(site_url()) ?>/area/delete/'+fid;
			$('#btn-delete').attr('href',url);
			$('#modal-delete').modal('show');
		});

		 $('#btn_addArea').click(function() 
	      {
	            $('#mdl_area').modal('show');
	      });

		 $('#btn_areaSave').click(function() {
          	insertIntoArea('area_form','btn_areaSave','btn_addArea');
       	});

		function insertIntoArea(form_id,button_id,cousin_id)
	    {
	        disable_button(button_id,'Saving');

	        $.ajax({
	            url: '<?php echo(site_url("area/add")) ?>',
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