<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?= $this->load->view('layouts/dashboard_header', NULL, true) ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-warning card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Ubah Nilai</a></li>                  
                </ul>                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- Tab Pengaturan Profil ========-->
                  <div class="active tab-pane" id="settings">
                    <a href="<?= site_url("dashboard/study_report") ?>"><i class="fas fa-arrow-left"></i> kembali</a>
                    <br>
                    <!-- <form class="form-horizontal"> -->
                    <?php if(isset($user_skd->is_locked) && $user_skd->is_locked): ?>
                      <p>
                        Anda sudah tidak dapat mengubah nilai lagi. Tolong kembali ke halaman hasil studi
                      </p>
                    <?php else: ?>
                    <?= form_open('dashboard/confirm_score', ['class' => 'form-horizontal']); ?>
                      <!-- Bagian Profil Umum -->
                      <div class="form-group">
                        <p>
                        Tolong perhatikan nilai anda yang terdapat di sistem. Lakukan perubahan sesuai yang diperlukan. Anda bertanggung jawab atas nilai yang anda inputkan.
                        Perubahan dapat dilakukan <strong>selama data belum dikunci.</strong>                         
                        </p>
                        <p>
                        Setelah dikunci, anda bisa melihat ranking angkatan dan <strong>tidak bisa mengubah lagi nilai anda.</strong>
                        </p>
                      </div>
                      <!-- Bagian Kontak -->
                      <!-- Set semester to 0 -->                  
                      <!-- Start loop through grades data -->
                      <?php for($semester=1;  $semester<=6; $semester++): ?>                        
                        <div class="form-group lead">Semester <?= $semester ?></div>
                        <?php foreach($grades[$semester] as $grade): ?>
                        <div class="form-group row">
                          <label for="subject_id_<?= html_escape($grade->id) ?>" class="col-sm-4 col-form-label"><?= html_escape($grade->name) ?> <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input name="subject_id_<?= html_escape($grade->id) ?>" type="number" class="form-control" id="subject_id_<?= html_escape($grade->id) ?>" placeholder="99.99" value="<?= html_escape($grade->percentage) ?? '' ?>" step=0.01 max=100 min=1 required onmousewheel="this.blur()">
                            <?= form_error("subject_id_{$grade->id}") ?>
                          </div>                        
                        </div>
                        <?php endforeach; ?>
                      <?php endfor; ?>
                      <div class="form-group lead"> SKD </div>
                        <div class="form-group row">
                          <label for="skd_score" class="col-sm-4 col-form-label">Nilai SKD <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input name="skd_score" type="number" class="form-control" id="skd_score" placeholder="499" value="<?= isset($user_skd->score) ? html_escape($user_skd->score) : '' ?>" min=1 max=500 required onmousewheel="this.blur()">
                            <?= form_error('skd_score') ?>
                          </div>                        
                        </div>
                      <div class="form-group row">
                        <div class="offset-sm-4 col-sm-8">
                          <div class="checkbox">
                            <label>
                              <input name="confirm" type="checkbox" required> Saya menyatakan data yang saya kirimkan adalah benar
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-4 col-sm-8">
                          <button name="submit" type="submit" class="btn btn-warning bg-white" value="save">Simpan</button>
                          <button name="submit" type="submit" class="btn btn-warning" value="lock">Kunci</button>
                        </div>                        
                      </div>                      
                    </form>
                    <?php endif; ?>
                  </div>
                  <!-- Tab Pengaturan Profil END ========-->
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?= $this->load->view('layouts/dashboard_footer', NULL, true) ?>