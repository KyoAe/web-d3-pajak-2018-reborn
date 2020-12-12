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
          <h3 class="card-title">Isi data terkait user</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <!-- Tab Pengaturan Profil ========-->
            <div class="active tab-pane" id="settings">
              <!-- <form class="form-horizontal"> -->
              <?= form_open($form_destination, ['class' => 'form-horizontal']); ?>
              <div class="form-group row">
                <div class="col-sm-2">
                  <label for="inputNama" class="col-form-label">Nama lengkap user <span class="text-red">*</span></label>
                </div>
                <div class="col-sm-10">
                  <input name="fullname" required type="text" class="form-control count-letter" id="inputNama" placeholder="Nama user" value="<?= html_escape($user->fullname ?? '') ?>">
                  <?php echo form_error('fullname'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email user <span class="text-red">*</span></label>
                <div class="col-sm-10">
                  <input name="email" required type="text" class="form-control" id="inputEmail" placeholder="johndoe@gmail.com" value="<?= html_escape($user->email ?? '') ?>">
                  <?php echo form_error('email'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputNPM" class="col-sm-2 col-form-label">NPM user <span class="text-red">*</span></label>
                <div class="col-sm-10">
                  <input name="npm" required type="text" class="form-control" id="inputNPM" placeholder="2301180399" value="<?= html_escape($user->npm ?? '') ?>">
                  <?php echo form_error('npm'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputGender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <select name="gender" class="form-control select2 select2-yellow"  id="inputGender" data-dropdown-css-class="select2-yellow" style="width: 100%;">
                    <option value="" disabled selected hidden>Pilih Gender</option>
                    <option value="M" <?= (isset($user->gender) && $user->gender == 'M')  ? 'selected' : ''?> >Laki-Laki</option>
                    <option value="F" <?= (isset($user->gender) && $user->gender == 'F')  ? 'selected' : ''?> >Perempuan</option>
                  </select>
                  <?php echo form_error('gender'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPass" class="col-sm-2 col-form-label">Password user <span class="text-red">*</span></label>
                <div class="col-sm-10">
                  <input name="pass" type="password" class="form-control" id="inputPass" placeholder="******">
                  <?php echo form_error('pass'); ?>
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