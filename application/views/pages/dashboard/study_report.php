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
                    <a class="nav-link" id="rekap-tab" data-toggle="pill" href="#rekap" role="tab" aria-controls="rekap" aria-selected="false">Rekapitulasi</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <?php for($semester=1; $semester<=6; $semester++): ?>
                  <div class="tab-pane fade show <?= ($semester == 1) ? "active" : ""?>" id="semester<?= $semester ?>" role="tabpanel" aria-labelledby="semester<?=$semester?>-tab">
                    <?php if (empty($grades[$semester])): ?>
                      <h1>Maaf, data nilai anda belum ada di kami!</h1>
                    <?php else: ?>
                    <table class="table table-striped table-responsive">
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
                    <h6 style="text-align:right; font-weight:bold">Total SKS : <?= html_escape($total_credits) ?></h6>
                    <h6 style="text-align:right; font-weight:bold">IP Semester : <?php echo(html_escape($gpas[$semester])) ?></h6>
                    <h6 style="text-align:right; font-weight:bold">Rangking <?php echo(html_escape($ranks[$semester])) ?> dari <?php echo(html_escape($student_counts[$semester])) ?> mahasiswa</h6>
                      <?php        
                      echo "<h6 style='text-align:right; margin-top:30px'> <b> IP Tertinggi : ". html_escape($statistics[$semester]->max)." </b> </h6>";
                      echo "<h6 style='text-align:right'> <b> IP Terendah : ". html_escape($statistics[$semester]->min)." </b> </h6>";
                      echo "<h6 style='text-align:right'> <b>  Rata-Rata IP : ". html_escape($statistics[$semester]->avg)." </b> </h6>";
                      ?>
                    <h6 style="margin-top: 30px; font-weight:bold"><b>NB : Dalam hal terjadi IPK sama, peringkat diurutkan berdasarkan abjad</b></h6>
                    <?php endif; ?>
                  </div>
                  <?php endfor; ?>
                  <div class="tab-pane fade" id="rekap" role="tabpanel" aria-labelledby="rekap-tab">
                    <h1>Coming Soon</h1>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>

<?= $this->load->view('layouts/dashboard_footer', NULL, true) ?>