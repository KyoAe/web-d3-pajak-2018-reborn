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
          <h3 class="card-title">Pengumuman yang sedang mengudara</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table1" class="table table-bordered table-hover text-center">
            <thead>
            <tr>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Deskripsi Singkat</th>
              <th>Tanggal</th>
              <th>Penulis</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($announcements as $announcement): ?>
            <tr>
              <td class="align-middle"><img src="<?= ($announcement->image!==null) ? html_escape($announcement->image) : base_url('public/images/blog/default/thum2.jpg'); ?>" alt="" style="max-width:100px"></td>
              <td class="align-middle"><?= html_escape($announcement->title) ?></td>
              <td class="align-middle"><?= html_escape($announcement->excerpt) ?></td>
              <td class="align-middle"><?= html_escape($announcement->created_at) ?></td>
              <td class="align-middle"><?= html_escape($announcement->email) ?></td>
              <td class="align-middle">
                <a href="<?= site_url('dashboard/announcements/view/') . $announcement->id?>" class="badge badge-info"><i class="fas fa-eye"></i> </a>
                <a href="<?= site_url('dashboard/announcements/update/') . $announcement->id ?>" class="badge badge-warning"><i class="far fa-edit"></i> </a>
                <a href="<?= site_url('dashboard/announcements/delete/') . $announcement->id ?>" class="badge badge-danger confirmation"><i class="fas fa-trash"></i> </a>
              </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Deskripsi Singkat</th>
              <th>Tanggal</th>
              <th>Penulis</th>
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