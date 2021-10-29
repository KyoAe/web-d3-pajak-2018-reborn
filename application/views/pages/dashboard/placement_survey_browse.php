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
          <h3 class="card-title">Daftar Survei</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Waktu Mulai</th>
              <th>waktu Selesai</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($surveys as $survey): ?>
            <tr>            
              <td><?= html_escape($survey->name) ?></td>
              <td><?= html_escape($survey->start_date) ?? 'TBA' ?></td>
              <td><?= html_escape($survey->end_date) ?? 'TBA' ?></td>
              <td class="text-center">
                <?php if ($survey->placement_id_1): ?>
                  <a href="<?= site_url('dashboard/placement_survey/view/') . $survey->id?>" class="badge badge-info">Lihat</i> </a>              
                <?php else: ?>
                  <a href="<?= site_url('dashboard/placement_survey/form/') . $survey->id?>" class="badge badge-info">Isi</i> </a>
                <?php endif; ?>
                <?php if ($this->aauth->is_admin()): ?>
                <a href="<?= site_url('dashboard/faqs/update/') . $faq->id ?>" class="badge badge-warning"><i class="far fa-edit"></i> </a>
                <a href="<?= site_url('dashboard/faqs/delete/') . $faq->id ?>" class="badge badge-danger" onclick="return delete_confirmation()"><i class="fas fa-trash"></i> </a>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Nama</th>
              <th>Waktu Mulai</th>
              <th>waktu Selesai</th>
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