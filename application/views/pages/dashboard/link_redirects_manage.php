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
          <h3 class="card-title">Pengalihan tautan yang ada</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">          
          <a href="<?= site_url("dashboard/link_redirects/create") ?>">
            <button class="btn btn-warning"><i class="fas fa-plus"></i> Tambah</button>
          </a>
          <hr>
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama</th>
              <th>URL</th>
              <th>Link</th>
              <th>Jumlah diakses</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($link_redirects as $link_redirect): ?>
            <tr>
              <td><?= html_escape($link_redirect->name)?></td>
              <td><?= $redirect_base_url . html_escape($link_redirect->url) ?></td>
              <td><?= html_escape($link_redirect->link) ?></td>
              <td><?= html_escape($link_redirect->number_of_access) ?></td>
              <td class="text-center">                                
                <a href="<?= $redirect_base_url . html_escape($link_redirect->url) ?>" class="badge badge-info" target="_blank"> view </a>
                <a href="<?= site_url("dashboard/link_redirects/update/{$link_redirect->id}") ?>" class="badge badge-warning"> update </a>
                <a href="<?= site_url("dashboard/link_redirects/delete/{$link_redirect->id}") ?>" class="badge badge-danger" onclick="return delete_confirmation()">remove </a>
              </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Nama</th>
              <th>URL</th>
              <th>Link</th>
              <th>Jumlah diakses</th>
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