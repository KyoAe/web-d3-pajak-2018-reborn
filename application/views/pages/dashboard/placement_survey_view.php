<?= $this->load->view('layouts/dashboard_header', NULL, true) ?>

<div class="row">  
  <div class="col d-flex justify-content-center">    
    <div class="card card-warning card-tabs">    
      <div class="card-header p-0 pt-1">
        <a href="<?= site_url("dashboard/placement_survey/browse") ?>"><i class="fas fa-arrow-left"></i> kembali</a>
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="rekap-tab" data-toggle="pill" href="#rekap" role="tab" aria-controls="rekap" aria-selected="false">Peringkat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="stats-pie-tab" data-toggle="pill" href="#stats-pie" role="tab" aria-controls="stats-pie" aria-selected="false">Pie Chart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="stats-table-tab" data-toggle="pill" href="#stats-table" role="tab" aria-controls="stats-table" aria-selected="false">Tabel Instansi</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">                    
          <div class="tab-pane fade show active" id="rekap" role="tabpanel" aria-labelledby="rekap-tab">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <h3><?= html_escape($user_fullname) ?></h3>
                  <p>IPK: <?= html_escape($user_ipk) ?></p>
                  <p>Nilai SKD: <?= html_escape($user_skd) ?></p>
                  <p>IPK dan SKD: <?= html_escape($user_total) ?></p>
                </div>
                <div class="col-sm-6">                    
                  <p>Pilihan 1: <?= html_escape($user_locs[0]) ?></p>
                  <p>Pilihan 2: <?= html_escape($user_locs[1]) ?></p>
                  <p>Pilihan 3: <?= html_escape($user_locs[2]) ?></p>
                </div>
              </div>
            </div>
            <div class="alert alert-warning" role="alert">
              <b> Rumus Perhitungan IPK dan SKD = [ (IPK/4) x 60 ] + [ (SKD/500) x 40] </b>
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
              <div class="col-sm-3">
                Pil. 1:
                <input type="text" placeholder="pilihan 1" id="choice-1">
              </div>
              <div class="col-sm-3">
                Pil. 2:
                <input type="text" placeholder="pilihan 2" id="choice-2">
              </div>
              <div class="col-sm-3">
                Pil. 3:
                <input type="text" placeholder="pilihan 3" id="choice-3">
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
                      <th>Pilihan 1</th>
                      <th>Pilihan 2</th>
                      <th>Pilihan 3</th>
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
                      <td><?= ($user_locs[0] != NULL) ? html_escape($rank->loc1) : '' ?></td>
                      <td><?= ($user_locs[1] != NULL) ? html_escape($rank->loc2) : '' ?></td>
                      <td><?= ($user_locs[2] != NULL) ? html_escape($rank->loc3) : '' ?></td>
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
          </div>

          <!-- div statistics of placements survey -->
          <div class="tab-pane fade" id="stats-pie" role="tabpanel" aria-labelledby="stats-pie-tab">
              <p>Tab ini hanya berisi statistik banyaknya peminat instansi berdasarkan pilihan 1, 2, dan 3.</p>
              <p>Untuk statistik yang lebih lengkap seperti rata-rata IPK maupun SKD per pilihan, teman-teman bisa lihat di tab peringkat ya.
                Gunakan filter untuk mencari instansi yang teman-teman inginkan. Urutkan data berdasarkan IPK, SKD, maupun IPK dan SKD untuk mencari nilai tertinggi dan terendah.
                Rata2 nilai berdasarkan filter langsung dikomputasi di sebelah kiri bawah tabel.
              </p>
              <p>Statistik <strong>akan diupdate secara berkala</strong> seiring survei diisi oleh teman-teman. Sering-sering cek lagi ya.
              </p>
              <p>Ingat, ini hanya merupakan survey dan <b>tidak memiliki pengaruh</b> langsung terhadap penempatan akhir teman-teman.
              </p>
              <div class="row">
                <!-- PIE CHART 1 -->
                <div class="col-sm-6">
                  <div class="card card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Pilihan Pertama (<?= $placement_statistics->count_answered ?>/934)</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>                    
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="choice_1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <!-- /.card -->
                <!-- PIE CHART 2 -->
                <div class="col-sm-6">
                  <div class="card card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Pilihan Kedua (<?= $placement_statistics->count_answered ?>/934)</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>                    
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="choice_2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <div class="row">
                <!-- PIE CHART 3 -->
                <div class="col-sm-6">
                  <div class="card card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Pilihan Ketiga (<?= $placement_statistics->count_answered ?>/934)</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>                    
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="choice_3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <!-- /.card -->
                <div class="col-sm-6">
                  <div class="card card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Keterangan Label dan Rincian Jumlah Peminat</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>                    
                      </div>
                    </div>
                    <div class="card-body">
                      Warna keterangan label selalu berubah karena warnanya dirandom.
                      Format nama: [nama instansi](jumlah yg milih sebagai pil. 1, jumlah yg milih sebagai pil. 2, jumlah yg milih sebagai pil. 3)
                      <ul id="rank-stats-label"></ul>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
              </div>
              

          </div>
          <div class="tab-pane fade" id="stats-table" role="tabpanel" aria-labelledby="stats-table-tab">
            <div style="overflow:hidden; overflow-x:scroll">
              <table id="table2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Instansi</th>
                    <th>Jmlh Peminat Pil. 1</th>
                    <th>Jmlh Peminat Pil. 2</th>
                    <th>Jmlh Peminat Pil. 3</th>                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $labels = json_decode($placement_statistics->labels); 
                    $count_choice_1 = json_decode($placement_statistics->count_choice_1); 
                    $count_choice_2 = json_decode($placement_statistics->count_choice_2); 
                    $count_choice_3 = json_decode($placement_statistics->count_choice_3); 
                  ?>
                  <?php for($i=0; $i<count($labels); $i++): ?>
                  <tr>                    
                    <td class="labels-color"></td>
                    <td><?= html_escape($labels[$i])?></td>
                    <td class="text-center"><?= html_escape($count_choice_1[$i]) ?></td>
                    <td class="text-center"><?= html_escape($count_choice_2[$i]) ?></td>
                    <td class="text-center"><?= html_escape($count_choice_3[$i]) ?></td>
                  </tr>
                  <?php endfor; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
          
    </div>
    <!-- /.card -->
  </div>
</div>

<?= $this->load->view('layouts/dashboard_footer', NULL, true) ?>