<h1></h1>
<?php if ($this->session->flashdata('message')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo($this->session->flashdata('message')) ?>
	</div>
<?php endif ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Restaurants Detail</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover" id="table-datatable">
					<thead>
						<tr>
							<th>Sn.</th>
							<th>Restaurant Name</th>
							<th>Area</th>
							<th>Street</th>
							<th>Landmark</th>
							<th>Entered By</th>
							<th>Entry date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
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
                    <a href="" id="btn-delete" class="btn btn-danger" id="delete_link">delete</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('body').on('click','.delete',function() {
		var res_id=$(this).data('resid');
		var url='<?php echo(site_url()) ?>/restaurants/delete/'+res_id;
		$('#btn-delete').attr('href',url);
		$('#modal-delete').modal('show');
	});

	$(document).ready(function() {
		
		

		   $('#table-datatable').DataTable({

		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [], //Initial no order.
		        // Load data for the table's content from an Ajax source
		        "ajax": {
		            "url": "<?php echo site_url('restaurants/datatables')?>",
		            "type": "POST"
		        },
		        //Set column definition initialisation properties.
		        "columnDefs": [
		            {
		                "targets": [-1, -2], //last column
		                "orderable": false, //set not orderable
		            },
		        ],


	    });
	});
</script>
