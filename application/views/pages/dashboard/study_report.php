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
                  <div class="tab-pane fade show active" id="semester1" role="tabpanel" aria-labelledby="semester1-tab">
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
                                        foreach($grades[1] as $matkul)
                                        {
                                            echo "<tr>";
                                            echo "<th> $matkul->name </th>";
                                            echo "<th> $matkul->credits </th>";
                                            echo "<th> $matkul->percentage </th>";
                                            echo "<th> $matkul->letter </th>";
                                            echo "<th>" .($matkul->fp_scale). "</th>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tr>
                            </tbody>
                    </table>
                    <h6 style="text-align:right; font-weight:bold">Total SKS : 20</h6>
                    <h6 style="text-align:right; font-weight:bold">IPK Semester : <?php echo($gpas[1]) ?></h6>
                    <h6 style="text-align:right; font-weight:bold">Rangking <?php echo($ranks[1]) ?> dari <?php echo($student_counts[1]) ?> mahasiswa</h6>
                    <h6 style="margin-top: 50px; font-weight:bold"><b>NB : Dalam hal terjadi IPK sama, peringkat diurutkan berdasarkan abjad</b></h6>
                  </div>
                  <div class="tab-pane fade" id="semester2" role="tabpanel" aria-labelledby="semester2-tab">
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
                                        foreach($grades[2] as $matkul)
                                        {
                                            echo "<tr>";
                                            echo "<th> $matkul->name </th>";
                                            echo "<th> $matkul->credits </th>";
                                            echo "<th> $matkul->percentage </th>";
                                            echo "<th> $matkul->letter </th>";
                                            echo "<th>" .($matkul->fp_scale). "</th>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tr>
                            </tbody>
                    </table>
                    <h6 style="text-align:right; font-weight:bold">Total SKS : 21</h6>
                    <h6 style="text-align:right; font-weight:bold">IPK Semester : <?php echo($gpas[2]) ?></h6>
                    <h6 style="text-align:right; font-weight:bold">Rangking <?php echo($ranks[2]) ?> dari <?php echo($student_counts[1]) ?> mahasiswa</h6>
                    <h6 style="margin-top: 50px; font-weight:bold"><b>NB : Dalam hal terjadi IPK sama, peringkat diurutkan berdasarkan abjad</b></h6>
                  </div>
                  <div class="tab-pane fade" id="semester3" role="tabpanel" aria-labelledby="semester3-tab">
                    <h1>NILAINYA KUMPULIN GAN!</h1>
                  </div>
                  <div class="tab-pane fade" id="semester4" role="tabpanel" aria-labelledby="semester4-tab">
                    <h1>NILAINYA KUMPULIN GAN!</h1>
                  </div>
                  <div class="tab-pane fade" id="semester5" role="tabpanel" aria-labelledby="semester5-tab">
                    <h1>NILAINYA KUMPULIN GAN!</h1>
                  </div>
                  <div class="tab-pane fade" id="semester6" role="tabpanel" aria-labelledby="semester6-tab">
                    <h1>NILAINYA KUMPULIN GAN!</h1>
                  </div>
                  <div class="tab-pane fade" id="rekap" role="tabpanel" aria-labelledby="rekap-tab">
                    <h1>NILAINYA KUMPULIN GAN!</h1>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>

<?= $this->load->view('layouts/dashboard_footer', NULL, true) ?>