<?= $this->load->view('layouts/dashboard_header', NULL, true) ?>

<div class="row">
  <div class="col d-flex justify-content-center">
    <div class="card card-warning card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="semester1-tab" data-toggle="pill" href="#semester1" role="tab" aria-controls="semester1" aria-selected="true">Semester 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="semester2-tab" data-toggle="pill" href="#semester2" role="tab" aria-controls="semester2" aria-selected="false">Semester 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="semester3-tab" data-toggle="pill" href="#semester3" role="tab" aria-controls="semester3" aria-selected="false">Semester 3</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="semester4-tab" data-toggle="pill" href="#semester4" role="tab" aria-controls="semester4" aria-selected="false">Semester 4</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="semester5-tab" data-toggle="pill" href="#semester5" role="tab" aria-controls="semester5" aria-selected="false">Semester 5</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="semester6-tab" data-toggle="pill" href="#semester6" role="tab" aria-controls="semester6" aria-selected="false">Semester 6</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="rekap-tab" data-toggle="pill" href="#rekap" role="tab" aria-controls="rekap" aria-selected="false">Peringkat</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <?php for($semester=1; $semester<=6; $semester++): ?>
          <div class="tab-pane fade show <?= ($semester == 1) ? "active" : ""?>" id="semester<?= $semester ?>" role="tabpanel" aria-labelledby="semester<?=$semester?>-tab">
            <?php if (empty($grades[$semester])): ?>
              <h3>Maaf, data anda tidak ditemukan. Tolong menghubungi <a href="mailto:pendidikansa@gmail.com"><i class="fa fa-envelope-o"></i>pendidikansa@gmail.com</a></h3>
            <?php else: ?>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                  <th scope="col">Nama Mata Kuliah</th>
                  <th scope="col">SKS</th>
                  <th scope="col">Angka</th>
                  <th scope="col">Huruf</th>
                  <th scope="col">Indeks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php 
                      $total_credits = 0;
                      foreach($grades[$semester] as $matkul)
                      {
                        $total_credits += $matkul->credits;
                        echo "<tr>";
                        echo "<th>".html_escape($matkul->name)."</th>";
                        echo "<th>".html_escape($matkul->credits)."</th>";
                        echo "<th>".html_escape($matkul->percentage)."</th>";
                        echo "<th>".html_escape($matkul->letter)."</th>";
                        echo "<th>".html_escape(($matkul->fp_scale))."</th>";
                        echo "</tr>";
                      }
                    ?>
                  </tr>
                </tbody>
              </table>
            </div>
            <h6 style="text-align:right; font-weight:bold">Total SKS : <?= html_escape($total_credits) ?></h6>
            <h6 style="text-align:right; font-weight:bold">IP Semester : <?= number_format((float)(html_escape($gpas[$semester])), 2, '.', '') ?></h6>
            <!-- <h6 style="margin-top: 30px; font-weight:bold"><b>NB : Dalam hal terjadi ketidaksesuaian data, tolong menghubungi <a href="mailto:pendidikansa@gmail.com"><i class="fa fa-envelope-o"></i>pendidikansa@gmail.com</a></b></h6> -->
            <?php endif; ?>
          </div>
          <?php endfor; ?>
          
          <div class="tab-pane fade" id="rekap" role="tabpanel" aria-labelledby="rekap-tab">
            <?php if(!$user_is_locked || $user_rank == -1): ?>
              <p>Sebelum mengikuti rank angkatan, mohon diperiksa kembali dan lakukan perubahan nilai jika diperlukan. Teman-teman diharapkan:
                <ol>
                  <li> Untuk membaca petunjuk pengisian terlebih dahulu </li>
                  <li> Melakukan pengecekan nilai & SKD (dan melakukan perubahan mandiri apabila terdapat perbedaan data) </li>
                  <li> Apabila sudah yakin centang <b>Saya menyatakan data yang saya kirimkan adalah benar</b> </li>
                  <li> Lakukan screening terakhir, kemudian klik "Kunci" </li>
                </ol>
              </p>

              <p>
                Setelah Konfirmasi dan Kunci Nilai, Teman-teman akan diarahkan kembali ke halaman ini. <br>
                Dan, Rank angkatan akan terbuka. <br>
                Apabila ada pertanyaan, kritik, saran, dan laporan silahkan menghubungi <br>
                WA Gio: <a href="https://wa.me/62895803661039">wa.me/62895803661039</a> <br>
              </p>
              <a href="<?= site_url(); ?>dashboard/confirm_score">
                <button class="btn-warning">
                  Cek dan Ubah Nilai Saya
                </button>
              </a>
            <?php else: ?>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-6">
                    <h3><?= html_escape($user_fullname) ?></h3>
                    <p>IPK: <?= html_escape($user_ipk) ?></p>
                    <p>Nilai SKD: <?= html_escape($user_skd) ?></p>
                    <p>IPK dan SKD: <?= html_escape($user_total) ?></p>
                  </div>
                </div>
              </div>
              <div class="alert alert-warning" role="alert">
                <b> Rumus Perhitungan IPK dan SKD = [ (IPK/4) x 60 ] + [ (SKD/500) x 40] </b>
              </div>
              <div class="alert alert-info" role="alert">
                Peringkat dengan pilihan penempatan dan statistik survei telah dipindah ke halaman Survei
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Rank</span>
                      <span class="info-box-number user-rank"><?= $user_rank . '/' . $total_users?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-flag"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Rata2 IPK</span>
                      <span class="info-box-number average-ipk"></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Rata2 SKD</span>
                      <span class="info-box-number average-skd"></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-star"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Rata2 IPK & SKD</span>
                      <span class="info-box-number average-ipk-skd"></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-sm-3">
                  Search:
                  <input type="text" placeholder="search" id="search">
                </div>
              </div>
              <button type="button" class="btn btn-warning float-right mt-2 text-centre" id="jump-to-me">Jump to My Rank</button>
              <div class="container mt-5">
                <div style="overflow:hidden; overflow-x:scroll">
                  <table id="rank-table" class="table table-bordered table-hover text-center">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>IPK</th>
                        <th>SKD</th>
                        <th>IPK & SKD</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; ?>
                      <?php foreach($ranks as $rank): ?>
                      <tr class="<?= ($user_npm == $rank->npm) ? 'bg-warning' : ''?>">                    
                        <td id="<?= ($user_npm == $rank->npm) ? 'user-rank' : ''?>"></td>
                        <td><?= (($user_is_visible && $rank->is_visible) || $user_has_permission) ? html_escape($rank->fullname): '***' ?></td>
                        <td><?= html_escape($rank->ipk) ?></td>
                        <td><?= html_escape($rank->skd_score) ?></td>
                        <td><?= number_format((float)html_escape($rank->total), 2, '.', '') ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <h6 style='text-align:right'>  Catatan: Ranking dapat berubah sewaktu-waktu. Mohon selalu dicek </h6>
                <!-- Button trigger modal --> 
                <button type="button" class="btn btn-primary float-right mt-5" data-toggle="modal" data-target="<?= ($user_is_visible) ? '' : '#exampleModalCenter' ?>">
                <?= ($user_is_visible) ? 'Namamu Bisa Dilihat Publik' : 'Perlihatkan Nama Ke Publik' ?>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Perlihatkan Nama ke Publik?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Pilihan "Perlihatkan Nama ke Publik" ini akan menjadikan:
                        <ol>
                        <li>Apabila tekan <strong>Yakin</strong>, maka namamu akan dapat dilihat oleh teman-teman yang memilih <strong>Yakin</strong> juga. Kamu juga bisa melihat teman-teman yang memilih Yakin juga</li>
                        <li>Apabila tekan <strong>Tidak</strong>, maka namamu tidak akan disampaikan kepada publik namun nama teman-teman akan disamarkan juga</li>                      
                        </ol>
                        <b>Anda tidak bisa mengubah pilihan anda ketika telah memilih Yakin</b>
                        <br>
                        PS: Data perangkingan ini diolah dari data yang teman-teman sampaikan kepada Sukarelawan Angkatan dan akan digunakan untuk kepentingan bersama di kalangan angkatan D3 Pajak 2018 saja. Tolong jangan disebarkan ke yang lain

                        #PenempatanCihuy
                        #D3PajakBentarLagiKerja
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <a href="<?= site_url(); ?>dashboard/study_report/make_visible">
                        <button type="button" class="btn btn-primary">Yakin</button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
          
    </div>
    <!-- /.card -->
  </div>
</div>

<?= $this->load->view('layouts/dashboard_footer', NULL, true) ?>