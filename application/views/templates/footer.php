<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?php echo(base_url('assets/templates')) ?>/bower_components/jquery/dist/jquery.min.js"></script>

<script src="<?php echo(base_url('assets/imageview/jquery.magnific-popup.js')) ?>"></script>

<script src="<?php echo(base_url('assets/imageview/jquery.magnific-popup.min.js')) ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo(base_url('assets/templates')) ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo(base_url('assets/templates')) ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?php echo(base_url('assets/templates')) ?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo(base_url('assets/templates')) ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
 
<!-- Custom Theme JavaScript -->
<script src="<?php echo(base_url('assets/templates')) ?>/dist/js/sb-admin-2.js"></script>

<script src="<?php echo base_url('assets/js/jquery.timepicker.min.js') ?>"></script>



<script>
    $("input").change(function () {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
        $('#message').empty();
    });
    $("textarea").change(function () {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
        $('#message').empty();
    });
    $("select").change(function () {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
        $('#message').empty();
    });

    $('.time').timepicker();
</script>

</body>

</html>
