<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class="text-success"><?php echo($res_name) ?></h1>
		<hr/>
	</div>
</div>
<?php if ($this->session->flashdata('success')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong><?php echo($this->session->flashdata('success')) ?></strong>
	</div>
<?php endif ?>
<div class="row">
	<div class="col-md-12 col-lg-12">
		<div id="images">
		
		</div>
		<div class="dropzone" style="margin-top: 0px;">
			<div class="dz-message" s>
				<h3> Drag and Drop your files here Or Click here to upload</h3>
			</div>
		</div>
	</div>
</div>
<h1></h1>
<div class="row">
	<div class="col-md-12 col-lg-12" id="thumbnail_images">
		<div class="loader center-block"></div>
	</div>
</div>


<script type="text/javascript">
		refresh_image();

		
		Dropzone.autoDiscover = false;
		var file= new Dropzone(".dropzone",{
			url: "<?php echo site_url('restaurant_image_upload/upload_files/'.$this->uri->segment(3)) ?>",
			// maxFilesize: 2,  // maximum size to uplaod 
			method:"post",
			acceptedFiles:"image/*", // allow only images
			paramName:"userfile",
			dictInvalidFileType:"Image files only allowed", // error message for other files on image only restriction 
			addRemoveLinks:true,
			init: function() {
		        this.on("success", function(file, responseText) {
		            refresh_image();
		        });
		    }
		});


//Upload file onchange 

file.on("sending",function(a,b,c){
	a.token=Math.random();
	c.append("token",a.token); //Random Token generated for every files 
});


// delete on upload 

file.on("removedfile",function(a){
	var token=a.token;
	$.ajax({
		type:"post",
		data:{token:token},
		url:"<?php echo base_url('restaurant_image_upload/delete') ?>",
		cache:false
	})
	.done(function() {
		refresh_image();
	});
});

function refresh_image() 
{
	$.ajax({
			url: '<?php echo(site_url('Restaurant_image_upload/load_image/'.$this->uri->segment(3))) ?>'
		})
		.done(function(data) {
			$('#thumbnail_images').html(data);
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
}


</script>