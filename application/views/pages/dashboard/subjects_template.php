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
          <h3 class="card-title">Isi data terkait matkul</h3>
          <br>
          <a href="<?= site_url("dashboard/subjects/manage") ?>"><i class="fas fa-arrow-left"></i> kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <!-- Tab Pengaturan Profil ========-->
            <div class="active tab-pane" id="settings">
              <!-- <form class="form-horizontal"> -->
              <?= form_open($form_destination, ['class' => 'form-horizontal']); ?>
              <div class="form-group row">
                <label for="inputSemester" class="col-sm-2 col-form-label">Semester <span class="text-red">*</span></label>
                <div class="col-sm-10">
                  <input name="semester" required type="number" class="form-control" id="inputSemester" placeholder="Mis. '1'" value="<?= html_escape($subject->semester ?? '') ?>">
                  <?php echo form_error('semester'); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-2">
                  <label for="inputNama" class="col-form-label">Nama Matkul<span class="text-red">*</span></label>
                </div>
                <div class="col-sm-10">
                  <input name="name" required type="text" class="form-control count-letter" id="inputNama" placeholder="Mis. 'Pengantar Akuntansi 1'" value="<?= html_escape($subject->name ?? '') ?>">
                  <?php echo form_error('name'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCode" class="col-sm-2 col-form-label">Kode Matkul <span class="text-red">*</span></label>
                <div class="col-sm-10">
                  <input name="code" required type="text" class="form-control" id="inputCode" placeholder="Mis. 'PGA1'" value="<?= html_escape($subject->code ?? '') ?>">
                  <?php echo form_error('code'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCredits" class="col-sm-2 col-form-label">SKS <span class="text-red">*</span></label>
                <div class="col-sm-10">
                  <input name="credits" required type="number" class="form-control" id="inputCredits" placeholder="mis. '3'" value="<?= html_escape($subject->credits ?? '') ?>">
                  <?php echo form_error('credits'); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-warning">Submit</button>
                </div>
              </div>
              </form>
            </div>
            <!-- Tab Pengaturan Profil END ========-->
            <!-- /.tab-pane -->
          </div>
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