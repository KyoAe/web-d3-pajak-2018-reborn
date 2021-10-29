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
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Pilih Penempatan</a></li>                  
                </ul>                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- Tab Pengaturan Profil ========-->
                  <div class="active tab-pane" id="settings">
                    <a href="<?= site_url("dashboard/placement_survey/browse") ?>"><i class="fas fa-arrow-left"></i> kembali</a>
                    <br>
                    <!-- <form class="form-horizontal"> -->
                    <?php if($user_placement_filled): ?>
                      <p>
                        Survei pemilihan penempatan berhasil diisi. Tolong kembali ke halaman sebelumnya
                      </p>
                    <?php else: ?>
                    <?= form_open("dashboard/placement_survey/form/{$survey_id}", ['class' => 'form-horizontal']); ?>
                      <!-- Bagian Profil Umum -->
                      <div class="form-group">
                        <p>
                        Anda hanya bisa mengisi survei ini sekali saja. Pilihan 1, 2, dan 3 tidak boleh ada yang sama.
                        </p>
                        <p>
                        Survei ini tidak berpengaruh terhadap pooling penempatan yang dilakukan oleh Biro SDM.</strong>
                        </p>
                        <p>
                          <strong>Survei 1</strong>: Data dirangkum dari pemaparan pada acara MGTPS. <strong> Perhatikan </strong> bahwa K/L/P bertanda asterik "(*)" adalah instansi yg telah mengonfirmasi rincian penerimaan lulusan dari D3 pajak
                        </p>
                        <p>
                          <strong>Survei 2</strong>: Daftar instansi diambil dari pooling penempatan Biro SDM untuk D3 Pajak
                        </p>
                        <p>
                          Notula MGTPS jika ingin baca-baca lagi: <a href="https://staner.id/notulamgtpsxklpfest21" target="_blank">staner.id/notulamgtpsxklpfest21</a>
                        </p>
                      </div>
                      <!-- Bagian Kontak -->
                      <!-- Looping pilihan ke berapa -->
                      <?php for($i=1;  $i<=3; $i++): ?>
                      <div class="form-group row">
                        <label for="inputPlacement_<?= $i ?>" class="col-sm-2 col-form-label">Pilihan <?= $i ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                          <select name="placement_id_<?= $i ?>" class="form-control select2 select2-yellow" id="inputPlacement_<?= $i ?>" data-dropdown-css-class="select2-yellow" style="width: 100%;" required>
                            <option value="" disabled selected hidden>Pilihan <?= $i ?></option>
                            <?php foreach($placements as $placement): ?>
                            <option value="<?= html_escape($placement->id) ?>" >
                              <?= html_escape($placement->location) ?> <?= ($placement->acc_tax)? ' (*)' : '' ?>
                            </option>
                            <?php endforeach; ?>
                          </select>
                          <?= form_error("placement_id_".$i) ?>
                        </div>
                      </div>
                      <?php endfor; ?>         
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input name="confirm" type="checkbox" required> Saya menyatakan data yang saya kirimkan adalah benar
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button name="submit" type="submit" class="btn btn-warning" value="lock">Submit</button>
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