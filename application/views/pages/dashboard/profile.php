<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?= $this->load->view('layouts/dashboard_header', NULL, true) ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-yellow card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url(); ?>public/adminLTE/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Giovanni Octa Anggoman</h3>

                <p class="text-muted text-center">Anggota Angkatan</p>

                <hr>

                <b>NPM</b> <a class="float-right">2301180399</a>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">KTTA</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Bidang KTTA</strong>

                <p class="text-muted">
                  Ketentuan Umum dan Tata Cara Perpajakan (KUP)
                </p>

                <hr>

                <strong><i class="fas fa-user mr-1"></i> Dosen Pembimbing</strong>

                <p class="text-muted">Pak Seseorang</p>               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-warning card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- Tab Pengaturan Profil ========-->
                  <div class="active tab-pane" id="settings">                    
                    <form class="form-horizontal">
                      <!-- Bagian Profil Umum -->
                      <div class="form-group">Profil Umum</div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputNamaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputNamaLengkap" placeholder="Nama Lengkap" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputNamaPanggilan" class="col-sm-2 col-form-label">Nama Panggilan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputNamaPanggilan" placeholder="Nama Panggilan" value="Gio" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputProvinsiLahir" class="col-sm-2 col-form-label">Provinsi Lahir</label>
                        <div class="col-sm-10">
                          <select class="form-control select2 select2-yellow" style="width: 100%;" data-dropdown-css-class="select2-yellow" id="inputProvinsiLahir">
                            <option value="" disabled selected hidden>Pilih Provinsi Lahir</option>
                            <option>Sulawesi Utara</option>
                            <option>Sumatera Utara</option>
                            <option>Jawa Barat</option>
                          </select>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputKotaLahir" class="col-sm-2 col-form-label">Kota Lahir</label>
                        <div class="col-sm-10">
                          <select class="form-control select2 select2-yellow" id="inputKotaLahir" style="width: 100%;" data-dropdown-css-class="select2-yellow">
                            <option value="" disabled selected hidden>Pilih Kota Lahir</option>
                            <option>Manado</option>
                            <option>Medan</option>
                            <option>Bandung</option>
                          </select>
                        </div>
                      </div>     
                      <div class="form-group row">
                        <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>      
                        <div class="input-group col-sm-10">
                          <input type="text" class="form-control" id="inputTanggalLahir" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->                                       
                      <div class="form-group row">
                        <label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputJenisKelamin" placeholder="Jenis Kelamin" value="" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputAgama" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                          <select class="form-control select2 select2-yellow" id="inputAgama" data-dropdown-css-class="select2-yellow" style="width: 100%;" >
                            <option value="" disabled selected hidden>Pilih Agama</option>
                            <option>Kristen</option>
                          </select>
                        </div>
                      </div>
                      <!-- Bagian Organisasi -->
                      <div class="form-group">Organisasi</div>              
                      <div class="form-group row">
                        <label for="inputUKM" class="col-sm-2 col-form-label">Elkam/UKM</label>
                        <div class="select2-yellow col-sm-10">
                          <select class="select2" id="inputUKM" multiple="multiple" data-placeholder="Pilih UKM" data-dropdown-css-class="select2-yellow" style="width: 100%;">
                            <option>STAN IC</option>
                            <option>Aliwardana Development Forum</option>
                            <option>KSR</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputOrganisasi" class="col-sm-2 col-form-label">Organisasi Kampus</label>
                        <div class="select2-yellow col-sm-10">
                          <select class="select2"  id="inputOrganisasi" multiple="multiple" data-placeholder="Pilih Organisasi" data-dropdown-css-class="select2-yellow" style="width: 100%;">
                            <option>KMP</option>
                            <option>BLM</option>
                            <option>BEM</option>
                          </select>
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <label for="inputOrganda" class="col-sm-2 col-form-label">Organda</label>
                        <div class="col-sm-10">
                          <select class="form-control select2 select2-yellow"  id="inputOrganda" data-dropdown-css-class="select2-yellow" style="width: 100%;" id="inputOrganda">
                            <option value="" disabled selected hidden>Pilih Organda</option>
                            <option>Ikatan Mahasiswa Angin Mamiri (IMAM)</option>
                            <option>KAMY</option>
                          </select>
                        </div>
                      </div>
                      <!-- Bagian Kontak -->
                      <div class="form-group">Kontak</div>
                      <div class="form-group row">
                        <label for="inputNomorWhatsapp" class="col-sm-2 col-form-label">No. Whatsapp</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputNomorWhatsapp" placeholder="Nomor Whatsapp">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputInstagram" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputInstagram" placeholder="Instagram">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputIDLine" class="col-sm-2 col-form-label">ID Line</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputIDLine" placeholder="ID Line">
                        </div>
                      </div>
                      <div class="form-group">Password Baru (kosongkan apabila tidak ingin mengganti) </div>
                      <div class="form-group row">
                        <label for="inputPasswordBaru" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPasswordBaru" placeholder="Password Baru">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputKonfirmasiPasswordBaru" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputKonfirmasiPasswordBaru" placeholder="Konfirmasi Password Baru">
                        </div>
                      </div>
                      <div class="form-group">Password Lama perlu diisi untuk mengonfirmasi perubahan</div>
                      <div class="form-group row">
                        <label for="inputPasswordLama" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPasswordLama" placeholder="Password Lama" required>
                        </div>
                      </div>                 
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required> Saya menyatakan data yang saya kirimkan adalah benar
                            </label>
                          </div>
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