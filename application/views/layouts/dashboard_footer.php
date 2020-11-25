<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

  </div>
  <!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>&copy; 2020 D III Pajak 2018</strong>
    - <a href="https://instagram.com/gio_kyo" target="_blank">GA</a>
    <div class="float-right d-none d-sm-inline-block">
      Template by <a href="http://adminlte.io">AdminLTE.io</a>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>public/adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>public/adminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>public/adminLTE/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>public/adminLTE/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="public/adminLTE/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="public/adminLTE/dist/js/demo.js"></script> -->
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask yyyy-mm-dd
    $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    $('[data-mask]').inputmask()

    //Confirmation
    $('.confirmation').on('click', function () {
      return confirm('Are you sure?');
    });
  });
</script>
  
</body>
</html>
