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
          <h3 class="card-title">Matkul yang sudah ada</h3>          
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="<?= site_url("dashboard/subjects/create") ?>">
            <button class="btn btn-warning"><i class="fas fa-plus"></i> Tambah</button>
          </a>
          <hr>
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Semester</th>
              <th>Nama Matkul</th>
              <th>Kode Matkul</th>
              <th>SKS</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($subjects as $subject): ?>
            <tr>            
              <td><?= html_escape($subject->semester) ?></td>
              <td><?= html_escape($subject->name) ?></td>
              <td><?= html_escape($subject->code) ?></td>
              <td><?= html_escape($subject->credits) ?></td>
              <td class="text-center">
                <a href="<?= site_url('dashboard/subjects/update/') . $subject->id ?>" class="badge badge-warning">update </a>
              </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Semester</th>
              <th>Nama Matkul</th>
              <th>Kode Matkul</th>
              <th>SKS</th>
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