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
          <h3 class="card-title">Isi data terkait tautan</h3>
          <br>
          <a href="<?= site_url("dashboard/link_redirects/manage") ?>"><i class="fas fa-arrow-left"></i> kembali</a>
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
                    <label for="inputNama" class="col-form-label">Nama <span class="text-red">*</span></label>
                    <br>
                  </div>
                  <div class="col-sm-10">
                    <input name="name" required type="text" class="form-control" id="inputNama" placeholder="Nama Link" value="<?= html_escape($link_redirect->name ?? '') ?>">
                    <?php echo form_error('name'); ?>
                  </div>
                </div>                
                <div class="form-group row">
                  <label for="inputURL" class="col-sm-2 col-form-label">URL <span class="text-red">*</span></label>                                      
                  <div class="col-sm-10">
                    <?= $redirect_base_url ?>
                    <input name="url" class="form-control" id="inputURL" placeholder="sebuah-linkLuarBiasa" required value="<?= html_escape($link_redirect->url ?? '') ?>">
                    <?php echo form_error('url'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputLink" class="col-sm-2 col-form-label">Link <span class="text-red">*</span></label>                                      
                  <div class="col-sm-10">
                    <input name="link" class="form-control" id="inputLink" placeholder="https://google.com" required value="<?= html_escape($link_redirect->link ?? '') ?>">
                    <?php echo form_error('link'); ?>
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