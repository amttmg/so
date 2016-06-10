
<script src="http://localhost:81/rb/template/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!--<script src="--><!--template/plugins/morris/morris.min.js"></script>-->
<!-- Sparkline -->
<script src="http://localhost:81/rb/template/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="http://localhost:81/rb/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="http://localhost:81/rb/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="http://localhost:81/rb/template/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="http://localhost:81/rb/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="http://localhost:81/rb/template/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="http://localhost:81/rb/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="http://localhost:81/rb/template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost:81/rb/template/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost:81/rb/template/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="--><!--template/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="http://localhost:81/rb/template/dist/js/demo.js"></script>
<script src="http://localhost:81/rb/template/plugins/imageview/jquery.magnific-popup.min.js"></script>
<!-- <script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
<script language="JavaScript" src="http://localhost:81/rb/template/plugins/cam/scriptcam.js"></script>

</body>
</html>
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
        
    $('.start_time').timepicker();
</script>