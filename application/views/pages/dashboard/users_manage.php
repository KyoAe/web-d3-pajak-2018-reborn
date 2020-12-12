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
          <h3 class="card-title">Mahasiswa yang sudah ada</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Definisi</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user): ?>
            <tr>            
              <td><?= html_escape($user->fullname) ?></td>
              <td><?= html_escape($user->email) ?></td>
              <td class="text-center">
                <?php if (!$this->aauth->is_member('Admin', $user->id) or $this->aauth->is_admin()): ?>
                <a href="<?= site_url('dashboard/users/manage_members/') . $user->id?>" class="badge badge-info"><i class="fas fa-eye"></i> </a>
                <a href="<?= site_url('dashboard/users/update/') . $user->id ?>" class="badge badge-warning"><i class="far fa-edit"></i> </a>
                <?php if (!$this->aauth->is_member('Admin', $user->id)): ?>
                <a href="<?= site_url('dashboard/users/delete/') . $user->id ?>" class="badge badge-danger" onclick="return delete_confirmation()"><i class="fas fa-trash"></i> </a>
                <?php endif; ?>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Nama</th>
              <th>Definisi</th>
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