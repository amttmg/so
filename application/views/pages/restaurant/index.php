<h1></h1>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Restaurants Detail</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Sn.</th>
							<th>Restauran Name</th>
							<th>Area</th>
							<th>Street</th>
							<th>Landmark</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $count=1 ?>
						<?php foreach ($restaurants as $restaurant): ?>
							<tr>
							<td><?php echo($count); $count++; ?></td>
							<td><?php echo($restaurant->res_name) ?></td>
							<td><?php echo($restaurant->area) ?></td>
							<td><?php echo($restaurant->street) ?></td>
							<td><?php echo($restaurant->landmark) ?></td>
							<td>
								<div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                        	<a href="<?php echo(site_url('restaurants/details/'.$restaurant->res_id)) ?>"><label class="text-success"><i class="glyphicon glyphicon-edit"></i>&nbsp&nbspEdit</label></a>
                                        </li>
                                        <li>
                                        	<a href="#" class="delete" data-resid="<?php echo $restaurant->res_id ?>"><label class="text-warning"><i class="glyphicon glyphicon-trash"></i>&nbsp&nbspDelete</label></a>
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
                    <a href="" id="btn-delete" class="btn btn-danger" id="delete_link">delete</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.delete').click(function() {
		var res_id=$(this).data('resid');
		var url='<?php echo(site_url()) ?>/restaurants/delete/'+res_id;
		$('#btn-delete').attr('href',url);
		$('#modal-delete').modal('show');
	});
</script>
