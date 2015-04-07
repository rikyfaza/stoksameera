			
		<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://sameerahijabstore.com">Sameera Hijab Store</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url().'bootstrap/js/bootstrap.min.js'; ?>" type="text/javascript"></script>    
	
		<!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url().'plugins/datatables/jquery.dataTables.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'plugins/datatables/dataTables.bootstrap.js'; ?>" type="text/javascript"></script>
		<script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
	
		<!-- user defined jquery function -->
		<script src="<?php echo base_url().'dist/js/custom.js'; ?>" type="text/javascript"></script>
	
    <!-- Slimscroll -->
    <script src="<?php echo base_url().'plugins/slimScroll/jquery.slimscroll.min.js'; ?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'plugins/fastclick/fastclick.min.js'; ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'dist/js/app.min.js'; ?>" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url().'dist/js/demo.js'; ?>" type="text/javascript"></script>
	
  </body>
</html>