<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1>Facilities</h1>
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
				<button type="button" id="btn-addPopDish" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp&nbspAdd New</button>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hover" id="table-datatable">
					<thead>
						<tr>
							<th>Sn.</th>
							<th>Facility Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $count=1; ?>
						<?php foreach ($pop_dishes as $dish): ?>
							<tr>
								<td>
									<?php echo($count); $count++; ?>
								</td>
								<td>
									<?php echo($dish->pop_dishes); ?>
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
	                                        	<a href="#" class="delete" data-fid="<?php echo($dish->pop_dishes_id) ?>"><label class="text-warning"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;Delete</label></a>
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

<div class="modal fade" id="modal-addPopDish">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Popular Dish</h4>
			</div>
			 <div class="modal-body">
                <form action="" method="POST" role="" id="popDish_form">
                    
                    <div class="form-group">
                        <label for="">Pop Dish</label>
                        <input type="text" name="dish_name" id="dish_name" class="form-control" id="" placeholder="Input Popular Dish">
                        <span></span>
                    </div>
        
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-popDishSave" class="btn btn-primary">Save</button>
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

		$('body').on('click','.delete',function() {
			var fid=$(this).data('fid');
			var url='<?php echo(site_url()) ?>/pop_dish/delete/'+fid;
			$('#btn-delete').attr('href',url);
			$('#modal-delete').modal('show');
		});

		$('#btn-addPopDish').click(function() {
			$('#modal-addPopDish').modal('show');
		});

		$('#btn-popDishSave').click(function() 
       	{
          insertIntoPopDish('popDish_form','btn-popDishSave','btn_facilities')
       	});

		function insertIntoPopDish(form_id,button_id,facility_id)
	    {
	        disable_button(button_id,'Saving');

	        $.ajax({
	            url: '<?php echo(site_url("pop_dish/add")) ?>',
	            dataType:'json',
	            type:'post',
	            data:$('#'+form_id).serialize(),
	            success:function(data)
	            {
	                console.log(data);
	                if (data.status==true) 
	                {

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

		
	});
</script>