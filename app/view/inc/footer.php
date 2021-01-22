<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Versión Beta
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://geniorama.site/">Geniorama</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- jquery-validation -->
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>/admin-lte/plugins/jquery-validation/additional-methods.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo ROUTE_URL; ?>/admin-lte/dist/js/adminlte.min.js"></script>

<script src="<?php echo ROUTE_URL; ?>/js/main.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>