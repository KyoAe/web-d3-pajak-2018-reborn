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
          <h3 class="card-title">Isi data terkait FAQ</h3>
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
                    <label for="inputNama" class="col-form-label">Nama FAQ <span class="text-red">*</span></label>
                    <br>
                    <span id="myLetterCount">0/100</span>
                  </div>
                  <div class="col-sm-10">
                    <input name="name" required type="text" class="form-control count-letter" id="inputNama" placeholder="Nama FAQ" value="<?= html_escape($faq->name ?? '') ?>">
                    <?php echo form_error('name'); ?>
                  </div>
                </div>                
                <div class="form-group row">
                  <label for="inputGrup" class="col-sm-2 col-form-label">Grup yg bisa akses</label>
                  <div class="col-sm-10">
                    <select name="group_id" class="form-control select2 select2-yellow"  id="inputGrup" data-dropdown-css-class="select2-yellow" style="width: 100%;">
                      <option value="" disabled selected hidden>Pilih Grup</option>
                      <?php foreach ($groups as $group): ?>
                      <option value="<?= html_escape($group->id) ?>" <?= (isset($faq->group_id) && $faq->group_id == $group->id)  ? 'selected' : ''?> ><?= html_escape($group->name) ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?php echo form_error('group_id'); ?>
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