<?= $this->load->view('layouts/dashboard_header', NULL, true) ?>

<?php if (!isset($rank)): ?>
  <h1 class="text-center">    
    Anda tidak mengikuti pemeringkatan IPK.  
  </h1>  
<?php else: ?>
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
              <h1>Maaf, data anda tidak ditemukan. Tolong menghubungi admin</h1>
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
            <h6 style="text-align:right; font-weight:bold">IP Semester : <?php echo(html_escape($gpas[$semester])) ?></h6>                                  
            <h6 style="margin-top: 30px; font-weight:bold"><b>NB : Dalam hal terjadi ketidaksesuaian data, tolong menghubungi admin</b></h6>
            <?php endif; ?>
          </div>
          <?php endfor; ?>
          <div class="alert alert-info" role="alert">
          <b> Rumus Perhitungan IPK dan SKD = [ (IPK/4) x 60% ] + [ (SKD/500) x 40%] </b>
          </div>
          <div class="tab-pane fade" id="rekap" role="tabpanel" aria-labelledby="rekap-tab">
          <!-- Button trigger modal -->
             
              <div class="container" style="margin-top: 20px">
              <table id="table1" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>IPK</th>
                        <th>SKD</th>
                        <th>IPK + SKD</th>
                        <th>Pilihan 1</th>
                        <th>Pilihan 2</th>
                        <th>Pilihan 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Uwawawa Huhuhu</td>
                        <td>4.0</td>
                        <td>500</td>
                        <td>100</td>
                        <td>Pil 1</td>
                        <td>Pil 2</td>
                        <td>Pil 3</td>
                    </tr>
                </tbody>
              </table>
              
              <?php        
              echo "<h6 style='text-align:right; margin-top:30px'> <b> IPK + SKD Tertinggi : ". html_escape($statistics->max)." </b> </h6>";
              echo "<h6 style='text-align:right'> <b> IPK + SKD Terendah : ". html_escape($statistics->min)." </b> </h6>";
              echo "<h6 style='text-align:right'> <b>  Rata-Rata IPK + SKD : ". html_escape($statistics->avg)." </b> </h6>";
            ?>

              <button type="button" class="btn btn-primary float-right mt-5" data-toggle="modal" data-target="#exampleModalCenter">
                  Ubah Data Ke Publik
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data Ke Publik?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      Dengan memilih "Ubah Data Ke Publik" ini, kamu dengan sepenuh hati dan dengan sadar memberikan data ke pada teman-teman anglatan untuk dan akan digunakan sebagai kepentingan bersama.

                      #PenempatanCihuy
                      #D3PajakBentarLagiKerja
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-primary">Yakin</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
<?php endif; ?>
<?= $this->load->view('layouts/dashboard_footer', NULL, true) ?>