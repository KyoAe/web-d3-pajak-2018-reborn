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
          <h3 class="card-title">Pertanyaan dan jawaban dari FAQ <strong><?= html_escape(strtoupper($faq->name)) ?></strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">          
          <a href="<?= site_url("dashboard/faqs/add_item/{$faq->id}") ?>">
            <button class="btn btn-warning"><i class="fas fa-plus"></i> Tambah</button>
          </a>
          <hr>
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Question</th>
              <th>Answer</th>
              <th>Tanggal Ditambahkan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($faq_items as $faq_item): ?>
            <tr>
              <td><?= html_escape($faq_item->question)?></td>
              <td><?= html_escape($faq_item->answer) ?></td>
              <td><?= html_escape($faq_item->created_at) ?></td>
              <td class="text-center">                                
              <a href="<?= site_url("dashboard/faqs/update_item/{$faq->id}/{$faq_item->id}") ?>" class="badge badge-warning"> edit </a>
                <a href="<?= site_url("dashboard/faqs/remove_item/{$faq->id}/{$faq_item->id}") ?>" class="badge badge-danger" onclick="return delete_confirmation()">remove </a>
              </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Question</th>
              <th>Answer</th>
              <th>Tanggal Ditambahkan</th>
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