<h1></h1>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Restaurant Detail</h3>
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
                                        <li><a href="<?php echo(site_url('restaurants/details/'.$restaurant->res_id)) ?>">Details</a>
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
