<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

</head>
<body>
<div class="container">
	<div class="row">
		<h1></h1>
		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong><?php echo($this->session->flashdata('success')) ?></strong>
			</div>
		<?php elseif($this->session->flashdata('error')): ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong><?php echo($this->session->flashdata('error')) ?></strong>
			</div>
		<?php endif ?>
	</div>
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Auto Crud Generator</h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Sn.</th>
								<th>Table Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $count=1; ?>
							<?php foreach ($tables as $table): ?>
								<tr>
									
										<td><?php echo $count++; ?></td>
										<td><?php echo($table) ?></td>
										<td>
											<?php echo(form_open('crud_generator/generate/'.$table)); ?>
											<?php if (read_file(APPPATH.'models/M_'.$table.'.php')): ?>
												<button type="submit" class="btn btn-primary">Generate</button>
												<i class="fa fa-check text-success"></i>
											<?php else: ?>
												<button type="submit" class="btn btn-primary">Generate</button>
											<?php endif ?>
											<?php echo(form_close()); ?>
										</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>	
		</div>
	</div>
	<?php 

	 ?>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/1.3.3/ui-bootstrap.min.js"></script>
</html>