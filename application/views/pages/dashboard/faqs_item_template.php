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
          <h3 class="card-title">Isi Pertanyaan dan jawaban terkait FAQ</h3>
          <br>
          <a href="<?= site_url("dashboard/faqs/manage_items/{$faq->id}") ?>"><i class="fas fa-arrow-left"></i> kembali</a>
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
                    <label for="inputPertanyaan" class="col-form-label">Pertanyaan <span class="text-red">*</span></label>
                    <br>
                  </div>
                  <div class="col-sm-10">
                    <input name="question" required type="text" class="form-control" id="inputPertanyaan" placeholder="Pertanyaan" value="<?= html_escape($faq_item->question ?? '') ?>">
                    <?php echo form_error('question'); ?>
                  </div>
                </div>                
                <div class="form-group row">
                  <label for="inputJawaban" class="col-sm-2 col-form-label">Jawaban <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <textarea name="answer" class="form-control" id="inputJawaban" placeholder="Jawaban" required><?= html_escape($faq_item->answer ?? '') ?></textarea>
                    <?php echo form_error('answer'); ?>
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