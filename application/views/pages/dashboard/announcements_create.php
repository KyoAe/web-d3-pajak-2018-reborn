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
          <h3 class="card-title">Isi data terkait pengumuman</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <!-- Tab Pengaturan Profil ========-->
            <div class="active tab-pane" id="settings">                    
              <!-- <form class="form-horizontal"> -->
              <?= form_open($form_destination, ['class' => 'form-horizontal']); ?>
                <div class="form-group row">
                  <label for="inputJudul" class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-10">
                    <input name="title" type="text" class="form-control" id="inputJudul" placeholder="Judul Pengumuman" value="<?= html_escape($announcement->title ?? '') ?>">
                    <?php echo form_error('title'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    <label for="inputDeskripsiSingkat" class="col-form-label">Deskripsi Singkat</label>
                    <span id="myLetterCount">0/100</span>
                  </div>                                  
                  <div class="col-sm-10">
                    <textarea name="excerpt" class="form-control count-letter" id="inputDeskripsiSingkat" placeholder="Deskripsi Singkat"><?= html_escape($announcement->excerpt ?? '') ?></textarea>
                    <?php echo form_error('excerpt'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputLinkFoto" class="col-sm-2 col-form-label">Link Foto</label>
                  <div class="col-sm-10">
                    <input name="image" type="text" class="form-control" id="inputLinkFoto" placeholder="Link Foto" value="<?= html_escape($announcement->image ?? '') ?>">
                    <?php echo form_error('image'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputIsiPengumuman" class="col-sm-2 col-form-label">Isi Pengumuman</label>
                  <div class="col-sm-10">
                    <textarea name="body" id="inputIsiPengumuman"><?= html_escape($announcement->body ?? '') ?></textarea>
                    <?php echo form_error('body'); ?>
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