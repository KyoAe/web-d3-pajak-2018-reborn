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
          <h3 class="card-title"><strong>Upload Pengguna dalam Formal XLXS</strong></h3>
          <br>
          <a href="<?= site_url("dashboard/users/manage") ?>"><i class="fas fa-arrow-left"></i> kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          Download Format: Hubungi admin. Tapi hanya admin yang bisa lihat halaman ini :)
          <?= form_open_multipart($form_destination, ['class' => 'form-horizontal']); ?>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input name="userfile" type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button type="submit" class="btn btn-warning">Upload</button>
                </div>
              </div>
            </div>
          </form>
          <hr>
          <small class="text-danger">
            <?php
            if(isset($upload_error))
            {
              if (is_array($upload_error))
                foreach($upload_error as $error) echo $error . "<br>";
              else
                echo $upload_error;
            }
            ?>
          </small>
          <?php if(isset($upload_data))print_r($upload_data); ?>
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