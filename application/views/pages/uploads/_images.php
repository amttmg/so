<div class="panel panel-primary">
	<div class="panel-body">
	<?php if ($images): ?>
		<?php foreach ($images as $image): ?>
			<div class="col-sm-3">
			<a href="#" class="delete" data-imageid="<?php echo $image->id ?>">
				<i class="fa fa-trash delete_icon" aria-hidden="true"></i>
			</a>
			<a href="<?php echo(base_url('uploads/restaurants/'.$image->image_name)); ?>" class="image-link">
				<img src="<?php echo(base_url('uploads/restaurants/'.$image->image_name)); ?>" class="img-responsive img-thumbnail" alt="Cinque Terre" style="width:204px;height:auto;">
			</a>
		</div><?php endforeach ?>
	<?php else: ?>
		<h3 class="text-center text-warning">No image available</h3>
	<?php endif ?>

  </div>
</div>
<div class="modal fade" id="modal-delete">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top:100px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="text-align:center;">Are you sure to delete this Image ?</h4>
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
<script type="text/javascript">
	$(document).ready(function() {
	    $('body .image-link').magnificPopup({type:'image'});

	    $('body').on('click','.delete',function() {
			var image_id=$(this).data('imageid');
			var url='<?php echo(site_url()) ?>/Restaurant_image_upload/delete/'+image_id+'/'+'<?php echo $this->uri->segment(3) ?>';
			$('#btn-delete').attr('href',url);
			$('#modal-delete').modal('show');
		});
	});
	
</script>

