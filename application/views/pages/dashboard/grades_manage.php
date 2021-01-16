<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?= $this->load->view('layouts/dashboard_header', NULL, true) ?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Pilih Semester</h3>          
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?= site_url("dashboard/grades/upload") ?>">
            <button class="btn btn-warning"><i class="fas fa-upload"></i> Upload</button>
          </a>
          <hr>
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Semester</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php for($i=1; $i<=6; $i++): ?>
            <tr>            
              <td><?= "Semester {$i}" ?></td>
              <td class="text-center">
                <a href="<?= site_url("dashboard/grades/semester/{$i}") ?>" class="badge badge-warning">Lihat </a>
              </td>
            </tr>
            <?php endfor; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Semester</th>
              <th>Aksi</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<?= $this->load->view('layouts/dashboard_footer', NULL, true) ?>