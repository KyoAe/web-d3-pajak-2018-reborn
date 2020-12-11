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
          <h3 class="card-title">Isi data terkait wewenang</h3>
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
                    <label for="inputNama" class="col-form-label">Nama wewenang <span class="text-red">*</span></label>
                    <br>
                    <span id="myLetterCount">0/100</span>
                  </div>
                  <div class="col-sm-10">
                    <input name="name" required type="text" class="form-control count-letter" id="inputNama" placeholder="Nama Wewenang" value="<?= html_escape($permission->name ?? '') ?>">
                    <?php echo form_error('name'); ?>
                  </div>
                </div>                
                <div class="form-group row">
                  <label for="inputDefinisi" class="col-sm-2 col-form-label">Defnisi Wewenang <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input name="definition" required type="text" class="form-control" id="inputDefinisi" placeholder="Deskripsi" value="<?= html_escape($permission->definition ?? '') ?>">
                    <?php echo form_error('definition'); ?>
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