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
<!-- DataTables -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>public/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>public/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url(); ?>public/adminLTE/plugins/toastr/toastr.min.js"></script>
<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/8xix5vjkai81lv94b54e9usaqkks3v6ee7ox2nbmc589prgg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>public/adminLTE/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="public/adminLTE/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="public/adminLTE/dist/js/demo.js"></script> -->
<?php print_r($this->session->flashdata('alert')); ?>
<script>
  function delete_confirmation() {   
    return confirm('Are you sure to delete this item ?');
  }

  $(function() {
    // Initialize Select2 Elements
    $('.select2').select2()

    // Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    // Datemask yyyy-mm-dd
    $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    $('[data-mask]').inputmask()

    // Add Confirmation on item using 'confirmation' class
    $('.confirmation').on('click', function (event) {      
      return confirm('Are you sure?');
    });

    // Initialize DataTables
    $('#table1').DataTable({
      "paging": true,
      // "lengthChange": false,
      // "ordering": true,
      "order": [],
      "info": true,
      "autoWidth": false,
      // "scrollX": true,
      "responsive": true,
    });

    // Set Word Count
    var content;
    $('.count-letter').on('keyup', function(){
        var letters = $(this).val().length;
        $('#myLetterCount').text(letters+"/100");
        // limit message
        if(letters>=101){
            $(this).val(content);
            alert('Tolong jangan lebih dari 100 karakter plis :)');
        } else {    
            content = $(this).val();
        }
    });

    // Start TinyMCE
    tinymce.init({
      selector: '#inputIsiPengumuman',
      height: 300,
      plugins: [
        'advlist autolink link image lists hr',
        'searchreplace wordcount visualblocks visualchars fullscreen insertdatetime',
        'table paste help'
      ],
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | fullpage | ' +
        'forecolor backcolor | help',
      menubar: 'favs file edit view insert format tools table help',
      relative_urls : false,
      remove_script_host : false,
      convert_urls : true
    });

    // Add Toast Message if flashdata available
    <?php if (! empty($this->session->flashdata('alert'))): ?>
    $(document).Toasts('create', {
      class: '<?= $this->session->flashdata('alert')['class'] ?>', 
      title: 'A message',
      body: '<?= $this->session->flashdata('alert')['msg'] ?>'
    })
    <?php endif; ?>
    
    	// Add active class based on current page
    $(function() {
      first_half = location.protocol + '//' + location.hostname + ((location.port != '') ? ':' + location.port : '');
      url = '';
      levels = location.pathname.split('/');
      for (i = 1; i < levels.length; i++)
      {
        url += '/' + levels[i];
        $('nav a[href="' + first_half + url + '"]').addClass('active');
      }
      // $('nav a[href="' + location.href + '"]').parent().addClass('active');
    });
  });
</script>
  
</body>
</html>
