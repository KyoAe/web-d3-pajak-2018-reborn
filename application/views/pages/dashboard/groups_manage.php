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
          <h3 class="card-title">Grup yang sudah ada</h3>
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
            <?php foreach($groups as $group): ?>
            <tr>            
              <td><?= html_escape($group->name) ?></td>
              <td><?= html_escape($group->definition) ?></td>
              <td class="text-center">
                <?php if ($group->name !== 'Admin' or $this->aauth->is_admin()): ?>
                <a href="<?= site_url('dashboard/groups/manage_members/') . $group->id?>" class="badge badge-info"><i class="fas fa-eye"></i> </a>
                <a href="<?= site_url('dashboard/groups/update/') . $group->id ?>" class="badge badge-warning"><i class="far fa-edit"></i> </a>
                <a href="<?= site_url('dashboard/groups/delete/') . $group->id ?>" class="badge badge-danger" onclick="return delete_confirmation()"><i class="fas fa-trash"></i> </a>
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