<?= $this->load->view('layouts/dashboard_header', NULL, true) ?>

<?php if ($user_skd == 9999): ?>
  <h1 class="text-center">    
    Nilai SKD Anda tidak ditemukan di sistem
  </h1>  
<?php else: ?>
<div class="row">
  <div class="col d-flex justify-content-center">
    <div class="card card-warning card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">          
          <li class="nav-item">
            <a class="nav-link active" id="rekap-tab" data-toggle="pill" href="#rekap" role="tab" aria-controls="rekap" aria-selected="true">Peringkat</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">          
          <div class="tab-pane fade show active" id="rekap" role="tabpanel" aria-labelledby="rekap-tab">
              <div class="container">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                      <div class="card-header bg-success"><b>Nilai SKD Pengguna </b></div>
                        <div class="card-body">
                          <p class="card-title"><b>SKD: <?= $user_skd ?> </b></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                      <div class="card-header bg-primary"><b>Peringkat Angkatan</b></div>
                        <div class="card-body">
                        <p><b>Peringkat: <?= $user_rank ?> dari <?= $statistics->cnt ?> Mahasiswa</b></p>
                      </div>
                    </div>
                    <?php        
                      echo "<h6 style='margin-top:30px'> <b> SKD Tertinggi : ". html_escape($statistics->max)." </b> </h6>";
                      echo "<h6 style='text-align:left'> <b> SKD Terendah : ". html_escape($statistics->min)." </b> </h6>";
                      echo "<h6 style='text-align:left'> <b>  Rata-Rata SKD : ". html_escape($statistics->avg)." </b> </h6>";
                    ?>
                  </div>                  
                  <div class="col-sm-12">                    
                    <table id="table1" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Nilai SKD</th>
                        <th>Banyak Org</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($skds as $skd): ?>
                      <tr>            
                        <td><?= $i++ ?></td>
                        <td><?= html_escape($skd->score) ?></td>
                        <td><?= html_escape($skd->cnt) ?></td>                        
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Nilai SKD</th>
                        <th>Banyak Org</th>
                      </tr>
                      </tfoot>
                    </table>                    
                  </div>
                </div>
              </div>            
            <p>Metode perankingan dapat dilihat di sini: <a href="https://d3pajak2018.org/metodeRanking" target="_blank">https://d3pajak2018.org/metodeRanking</a></p>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
<?php endif; ?>
<?= $this->load->view('layouts/dashboard_footer', NULL, true) ?>