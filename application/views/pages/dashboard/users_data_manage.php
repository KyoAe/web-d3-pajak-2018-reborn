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
          <h3 class="card-title">Pengguna yang sudah ada</h3>          
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>NPM</th>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user): ?>
            <tr>            
              <td><?= html_escape($user->npm) ?></td>
              <td><?= html_escape($user->fullname) ?></td>
              <td class="text-center">
                <?php if (!$this->aauth->is_member('Admin', $user->id) or $this->aauth->is_admin()): ?>
                <a href="<?= site_url('dashboard/users_data/update/') . $user->npm?>" class="badge badge-info">Lihat</i> </a>
                <?php endif; ?>                
              </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>NPM</th>
              <th>Nama</th>
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