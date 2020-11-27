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
          <h3 class="card-title">DataTable with minimal features & hover style</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table1" class="table table-bordered table-hover text-center">
            <thead>
            <tr>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Deskripsi Singkat</th>
              <th>Tanggal</th>
              <th>Penulis</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td class="align-middle"><img src="<?= base_url(); ?>public/images/background/bg2.jpg" alt="" style="max-width:100px"></td>
              <td class="align-middle">Sesuatu di Jogja
              </td>
              <td class="align-middle">Ini adalah deskripsi singkat</td>
              <td class="align-middle">2020-11-26 11:25</td>
              <td class="align-middle">Gio</td>
              <td class="align-middle">
                <a href="#" class="badge badge-info"><i class="fas fa-eye"></i> </a>
                <a href="#" class="badge badge-warning"><i class="far fa-edit"></i> </a>
                <a href="#" class="badge badge-danger"><i class="fas fa-trash"></i> </a>
              </td>
            </tr>            
            </tbody>
            <tfoot>
            <tr>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Deskripsi Singkat</th>
              <th>Tanggal</th>
              <th>Penulis</th>
              <th>Aksi</th>
            </tr>
            </tfoot>
          </table>
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