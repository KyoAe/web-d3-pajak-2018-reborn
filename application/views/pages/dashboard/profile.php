<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?= $this->load->view('layouts/dashboard_header', NULL, true) ?>

<!-- ============================================================ 
    First Row -- Kartu Mahasiswa dan Informasi Email dan Password
================================================================= -->
<div class="row">
    <!-- Kartu Mahasiswa ===-->
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-8 col-md-8">
                        <div class="numbers">
                            <p class="card-category"><b><?= (!empty($mahasiswa->nama_lengkap)) ? $mahasiswa->nama_lengkap : ''; ?></b></p>
                            <p class="card-title text-warning"><?= (!empty($mahasiswa->npm)) ? $mahasiswa->npm : ''; ?></p>
                        </div>
                    </div>
                    <div class="col-4 col-md-4">
                        <?php if ($mahasiswa->foto) : ?>
                            <img class="avatar border-gray" style="width:100%; height:auto;" src="<?= base_url('public/images/profile/' . $mahasiswa->foto); ?>" alt="<?= (!empty($mahasiswa->nama_lengkap)) ? $mahasiswa->nama_lengkap : ''; ?>">
                        <?php else : ?>
                            <img class="avatar border-gray" style="width:100%; height:auto;" src="<?= base_url('public/admine/img'); ?>/default-avatar.png" alt="<?= (!empty($mahasiswa->nama_lengkap)) ? $mahasiswa->nama_lengkap : ''; ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <div class="stats">
                    <?= (!empty($mahasiswa->jabatan)) ? $mahasiswa->jabatan : ''; ?>
                    <br>
                    DIII PAJAK 2018
                </div>
                <svg id="barcode"></svg>
            </div>
        </div>
    </div>
    <!-- Kartu Mahasiswa End ===-->
    <!-- Informasi Mahasiswa ===-->
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-title">Akun</h5>
                <p class="card-description">Informasi Akun</p>
                <!-- Flash Success Message Here -->
                <!-- TODO: PUT form_error here -->                
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Email</th>
                            <td><?= (!empty($mahasiswa->email)) ? $mahasiswa->email : ''; ?></td>
                        </tr>
                        <tr>
                            <th>Kata Sandi</th>
                            <td>********</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col text-left">
                        <button data-toggle="modal" data-target="#Akun" class="btn btn-round btn-warning btn-fill"><i class="fa fw fa-edit"></i> Ubah</button>
                    </div>
                    <div class="col text-right">
                        <a href="#" class="btn btn-warning btn-round"><i class="fa fw fa-magnet"></i> Token</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Informasi Mahasiswa End ===-->
</div>
<!-- ============================================================ 
    First Row -- Kartu Mahasiswa dan Informasi Email dan Password END
================================================================= -->


<!-- ============================================================ 
    Second Row -- Profil Mahasiswa
================================================================= -->
<div class="row">
    <div id='profil' class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-title">Profil Mahasiswa</h5>
                <p class="card-description">Biodata Umum Milik Mahasiswa</p>
                <!-- TODO: PUT Form Success and Error Here -->
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= (!empty($mahasiswa->nama_lengkap)) ? $mahasiswa->nama_lengkap : ''; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Panggilan</th>
                            <td><?= (!empty($mahasiswa->nama_panggilan)) ? $mahasiswa->nama_panggilan : ''; ?></td>
                        </tr>
                        <tr>
                            <th>Tempat, Tanggal Lahir</th>
                            <td><?= (!empty($mahasiswa->tempat_lahir)) ? $mahasiswa->tempat_lahir : ''; ?>, <?= (!empty($mahasiswa->tanggal_lahir)) ? $mahasiswa->tanggal_lahir : ''; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td><?= (!empty($mahasiswa->agama)) ? $mahasiswa->agama : ''; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Kos</th>
                            <td><?= (!empty($mahasiswa->daerah_kos)) ? $mahasiswa->daerah_kos : ''; ?>, <?= (!empty($mahasiswa->alamat_kos)) ? $mahasiswa->alamat_kos : ''; ?></td>
                        </tr>
                    </tbody>
                </table>
                <button data-toggle="modal" data-target="#Profil" class="btn btn-round btn-warning btn-fill"><i class="fa fw fa-edit"></i> Ubah</button>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================ 
    Second Row -- Profil Mahasiswa END
================================================================= -->


<!-- ============================================================ 
    Third Row -- Pendidikan & Organisasi & Kontak
================================================================= -->
<div class="row">
    <!-- Kartu Organisasi -->
    <div id="organisasi" class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-title">Pendidikan & Organisasi </h5>
                <p class="card-description">Riwayat Pendidikan dan Organisasi yang Diikuti</p>
                <!-- TODO: Add Success Message And Error Messages Here -->
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Asal Sekolah</th>
                            <td><?= (!empty($mahasiswa->asal_sma)) ? $mahasiswa->asal_sma : ''; ?></td>
                        </tr>
                        <tr>
                            <th>Organda</th>
                            <td><?= (!empty($mahasiswa->organda)) ? $mahasiswa->organda : ''; ?></td>
                        </tr>
                        <tr>
                            <th>Organisasi Kampus</th>
                            <td><?= (!empty($mahasiswa->organisasi)) ? $mahasiswa->organisasi : ''; ?></td>
                        </tr>
                        <tr>
                            <th>Elkam/UKM</th>
                            <td><?= (!empty($mahasiswa->ukm)) ? $mahasiswa->ukm : ''; ?></td>
                        </tr>
                        <tr>
                            <th>Jabatan di Angkatan</th>
                            <td><?= (!empty($mahasiswa->jabatan)) ? $mahasiswa->jabatan : ''; ?></td>
                        </tr>
                    </tbody>
                </table>
                <button data-toggle="modal" data-target="#Organisasi" class="btn btn-round btn-warning btn-fill"><i class="fa fw fa-edit"></i> Ubah</button>
            </div>
        </div>
    </div>
    <!-- Kartu Organisasi End -->
    <!-- Kartu Kontak -->
    <div id="kontakhe" class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-title">Kontak</h5>
                <p class="card-description">Informasi Kontak</p>
                <!-- TODO: Add Success Message And Error Messages Here -->
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>No. WhatsApp</th>
                            <td>0xxxxxxxxxx <a class="badge badge-warning text-white" href="https://api.whatsapp.com/send?phone=+62xxxx&text=" target="_blank"><i class="fa fa-external-link"></i></a></td>
                        </tr>
                        <tr>
                            <th>Instagram</th>
                            <td>hikigaya<a class="badge badge-warning text-white" href="https://instagram.com/hikigaya" target="_blank"><i class="fa fa-external-link"></a></td>
                        </tr>
                        <tr>
                            <th>ID Line</th>
                            <td>hikigaya<a class="badge badge-warning text-white" href="line://ti/p/~hikigaya" target="_blank"><i class="fa fa-external-link"></a></td>
                        </tr>
                    </tbody>
                </table>
                <button data-toggle="modal" data-target="#Kontak" class="btn btn-round btn-warning btn-fill"><i class="fa fw fa-edit"></i> Ubah</button>
            </div>
        </div>
    </div>
    <!-- Kartu Kontak End -->
</div>
<!-- ============================================================ 
    Third Row -- Pendidikan & Organisasi & Kontak END
================================================================= -->


<!-- ============================================================ 
    Modals -- Untuk Sunting Data
================================================================= -->
<!-- Modal Sunting Informasi Mahasiswa -->
<div class="modal fade" id="Akun" tabindex="-1" role="dialog" aria-labelledby="AkunLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AkunLabel">Pengaturan Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--php echo form_open('mahasiswa')  -->            
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
                    </div>
                    <input disabled type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" value="<?= (!empty($mahasiswa->email)) ? $mahasiswa->email : ''; ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-key"></i></span>
                    </div>
                    <input type="password" name="new_password1" id="new_password1" class="form-control" placeholder="Kata Sandi Baru" aria-label="Kata Sandi Baru" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-key"></i></span>
                    </div>
                    <input type="password" name="new_password2" id="new_password2" class="form-control" placeholder="Ulangi Kata Sandi Baru" aria-label="Ulangi Kata Sandi Baru" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                    <label for="old_password">Konfirmasi Kata Sandi</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-lock"></i></span>
                        </div>
                        <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Masukkan Kata Sandi Lama" aria-label="Masukkan Kata Sandi Lama" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Batal</button>
                <button type="submit" name="ubah_akun" class="btn btn-warning btn-round">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Sunting Informasi Mahasiswa End -->
<!-- Modal Sunting Profil Mahasiswa -->
<div class="modal fade" id="Profil" tabindex="-1" role="dialog" aria-labelledby="ProfilLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ProfilLabel">Ubah Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- TODO: Put Form Open Here -->
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                    </div>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="basic-addon1" value="<?= (!empty($mahasiswa->nama_lengkap)) ? $mahasiswa->nama_lengkap : ''; ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                    </div>
                    <input type="text" name="nama_panggilan" id="nama_panggilan" class="form-control" placeholder="Nama Panggilan" aria-label="Nama Panggilan" aria-describedby="basic-addon1" value="<?= (!empty($mahasiswa->nama_panggilan)) ? $mahasiswa->nama_panggilan : ''; ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-birthday-cake"></i></span>
                    </div>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" aria-label="Tempat Lahir" aria-describedby="basic-addon1" value="<?= (!empty($mahasiswa->tempat_lahir)) ? $mahasiswa->tempat_lahir : ''; ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-calendar"></i></span>
                    </div>
                    <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="1999-01-01" aria-label="1999-01-01" aria-describedby="basic-addon1" value="<?= (!empty($mahasiswa->tanggal_lahir)) ? $mahasiswa->tanggal_lahir : ''; ?>">
                </div>
                <div class="form-group">
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option selected disabled="">Pilih Jenis Kelamin...</option>
                        <?php if ($mahasiswa->jenis_kelamin == 1) : ?>
                            <option value="1" selected>Laki-laki</option>
                            <option value="0">Perempuan</option>
                        <?php elseif ($mahasiswa->jenis_kelamin == 0) : ?>
                            <option value="1">Laki-laki</option>
                            <option value="0" selected>Perempuan</option>
                        <?php else : ?>
                            <option value="1">Laki-laki</option>
                            <option value="0">Perempuan</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="agama" id="agama" class="form-control">
                        <option selected disabled="">Pilih Agama...</option>
                        <?php foreach ($agama as $ag) : ?>
                            <?php if ($mahasiswa->agama == $ag->agama) : ?>
                                <option value="<?= $ag->id; ?>" selected><?= $ag->agama; ?></option>
                            <?php else : ?>
                                <option value="<?= $ag->id; ?>"><?= $ag->agama; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-location-arrow"></i></span>
                    </div>
                    <input type="text" name="daerah_kos" id="daerah_kos" class="form-control" placeholder="Daerah Kos" aria-label="Daerah Kos" aria-describedby="basic-addon1" value="<?= (!empty($mahasiswa->daerah_kos)) ? $mahasiswa->daerah_kos : ''; ?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="alamat_kos" id="alamat_kos" rows="4" placeholder="Alamat Kos"><?= (!empty($mahasiswa->alamat_kos)) ? $mahasiswa->alamat_kos : ''; ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Batal</button>
                <button name="ubah_profil" type="submit" class="btn btn-warning btn-round">Ubah</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<!-- Modal Sunting Profil Mahasiswa End -->
<!-- Modal Sunting Organisasi -->
<div class="modal fade" id="Organisasi" tabindex="-1" role="dialog" aria-labelledby="OrganisasiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="OrganisasiLabel">Ubah Riwayat Pendidikan & Organisasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>                
            <!-- echo form_open('mahasiswa');  -->
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="asal_sma" name="asal_sma" placeholder="Asal Sekolah" value="<?= (!empty($mahasiswa->asal_sma)) ? $mahasiswa->asal_sma : ''; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="organda" name="organda" placeholder="Organda" value="<?= (!empty($mahasiswa->organda)) ? $mahasiswa->organda : ''; ?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="organisasi" id="organisasi" rows="4" placeholder="Organisasi (pisahkan dengan koma jika lebih dari satu)"><?= (!empty($mahasiswa->organisasi)) ? $mahasiswa->organisasi : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="ukm" id="ukm" rows="4" placeholder="Elkam/UKM (pisahkan dengan koma jika lebih dari satu)"><?= (!empty($mahasiswa->ukm)) ? $mahasiswa->ukm : ''; ?></textarea>
                </div>
                <input disabled type="text" class="form-control" placeholder="Jabatan" value="<?= (!empty($mahasiswa->jabatan)) ? $mahasiswa->jabatan : ''; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Batal</button>
                <button name="ubah_organisasi" type="submit" class="btn btn-warning btn-round">Ubah</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<!-- Modal Sunting Organisasi End -->
<!-- Modal Sunting Kontak -->
<div class="modal fade" id="Kontak" tabindex="-1" role="dialog" aria-labelledby="KontakLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="KontakLabel">Ubah Kontak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- echo form_open('mahasiswa') -->
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="No. WhatsApp" value="<?= (!empty($mahasiswa->whatsapp)) ? $mahasiswa->whatsapp : ''; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" value="<?= (!empty($mahasiswa->instagram)) ? $mahasiswa->instagram : ''; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="line" name="line" placeholder="ID Line" value="<?= (!empty($mahasiswa->line)) ? $mahasiswa->line : ''; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Batal</button>
                <button name="ubah_kontak" type="submit" class="btn btn-warning btn-round">Ubah</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<!-- Modal Sunting Kontak End -->
<!-- ============================================================ 
    Modals -- Untuk Sunting Data End
================================================================= -->

<?= $this->load->view('layouts/dashboard_footer', NULL, true) ?>