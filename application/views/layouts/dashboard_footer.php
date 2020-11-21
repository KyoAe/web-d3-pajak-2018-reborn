<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

</div>

<footer class="footer footer-black footer-white ">
    <div class="container-fluid">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    <li> <a href="https://instagram.com/d3pajak2018" target="_blank">Instagram</a> </li>
                    <li> <a href="https://line.me/ti/p/~@HHJ6080P" target="_blank">Line</a> </li>
                    <li> <a href="https://www.youtube.com/channel/UCyPFirc_-09X7_kd_3X0w2g" target="_blank">YouTube</a> </li>
                </ul>
            </nav>
            <div class="credits ml-auto"> <span class="copyright text-center"> &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> - Taxer Area DIII Pajak 2018
                <br>
                Termuat dalam <strong>{elapsed_time}</strong> detik. Dibuat dengan CodeIgniter <i class="fa fa-heart heart"></i>
                <a href="https://instagram.com/walidsaja" target="_blank" class="text-danger">WSJ</a>
                - <a href="https://instagram.com/yusufhabibihrp" target="_blank" class="text-danger">YH</a>
                - <a href="https://instagram.com/gio_kyo" target="_blank" class="text-danger">GA</a> </span> </div>
        </div>
    </div>
</footer>
</div>
</div>

<!--  Core JS Files  -->
<script src="<?= base_url('public/admine/js/core/jquery.min.js'); ?>"></script>
<script src="<?= base_url('public/admine/js/core/popper.min.js'); ?>"></script>
<script src="<?= base_url('public/admine/js/core/bootstrap.min.js'); ?>"></script><!-- <script src="<?= base_url('public/admine/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script> -->

<!-- Notifications Plugin -->
<script src="<?= base_url('public/admine/js/plugins/bootstrap-notify.js'); ?>"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script><!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('public/admine/js/paper-dashboard.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('public/admine/js/plugins/JsBarcode.all.min.js'); ?>"></script>

<!-- Custom Scripts -->
<script>
    $(document).ready(function() {
        JsBarcode("#barcode", "<?= "Hai"/*$mahasiswa->npm;*/ ?>", {
            width: 1.5,
            height: 25,
            margin: 0,
            displayValue: false
        });
    });
    $(document).ready(function() {
        $('#mahasiswa_table').DataTable();
        $('#mahasiswa_table1').DataTable();
        $('#mahasiswa_table2').DataTable();
        $('#mahasiswa_table3').DataTable();
        $('#mahasiswa_table4').DataTable();
        $('#mahasiswa_table5').DataTable();
        $('#mahasiswa_table6').DataTable();
    });
</script>
</body>

</html>