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
          <h3 class="card-title"></h3>
          <br>
          <a href="<?= site_url("dashboard/grades/manage") ?>"><i class="fas fa-arrow-left"></i> kembali</a>        
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Rank</th>
              <th>Nama</th>
              <th>NPM</th>
              <?php foreach ($subjects as $subject): ?>
                <th><?= html_escape($subject->code) ?></th>
              <?php endforeach;?>
              <th>IPK</th>
            </tr>
            </thead>
            <tbody>
            <?php $rank=0; foreach ($grades as $grade): ?>
            <tr>            
              <td><?= html_escape(++$rank) ?></td>
              <td><?= html_escape($grade->fullname) ?></td>
              <td><?= html_escape($grade->npm) ?></td>
              <?php foreach ($subjects as $subject): ?>
                <th><?= html_escape($grade->{$subject->code}) ?></th>
              <?php endforeach;?>
              <td><?= number_format(html_escape($grade->gpa), 6) ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Rank</th>
              <th>Nama</th>
              <th>NPM</th>
              <?php foreach ($subjects as $subject): ?>
                <th><?= html_escape($subject->code) ?></th>
              <?php endforeach;?>
              <th>IPK</th>
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