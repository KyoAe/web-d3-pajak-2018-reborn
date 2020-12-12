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
          <h3 class="card-title">FAQ yang sudah ada</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($faqs as $faq): ?>
            <tr>            
              <td><?= html_escape($faq->name) ?></td>
              <td class="text-center">
                <?php if ($this->aauth->is_member($faq->group_id) or $this->aauth->is_admin()): ?>
                <a href="<?= site_url('dashboard/faqs/manage_items/') . $faq->id?>" class="badge badge-info"><i class="fas fa-eye"></i> </a>                
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