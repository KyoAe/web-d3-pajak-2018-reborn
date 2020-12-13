<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?= $this->load->view('layouts/welcome_header', NULL, true); ?>

<!-- Inner Content Box ==== -->
<div class="page-content bg-white">
  <div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url(public/images/background/bg1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center text-white">
          <h2>TPP PKL</h2>
          <h5>Temukan informasi mengenai PKL yang ingin kamu cari di sini</h5>							
        </div>
      </div>
      <div class="mw800 m-auto">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <a href="#" target="_blank">
              <div class="cours-search-bx m-b30">
                <div class="icon-box">
                  <h3><i class="ti-announcement"></i></h3>
                </div>
                <h4 class="cours-search-text text-white">Pengumuman Survei PKL (Soon)</h4>
              </div>      
            </a>
          </div>
          <div class="col-md-6 col-sm-6">
            <a href="#" target="_blank">
              <div class="cours-search-bx m-b30">
                <div class="icon-box">
                  <h3><i class="ti-email"></i></h3>
                </div>
                <h4 class="cours-search-text text-white">Surat Tugas PKL (Soon)</h4>
              </div>      
            </a>
          </div>
        </div>
      </div>
      <div class="text-center">
        <a href="#pengumuman">
          <button class="btn">Jelajahi</button> 
        </a>
      </div>
    </div>
  </div>

  <div class="breadcrumb-row">
    <div class="container">
      <ul class="list-inline">
        <li><a href="<?= site_url(); ?>">Home</a></li>
        <li>TPP PKL</li>
      </ul>
    </div>
  </div>
  <!-- Page Heading Box END ==== -->

  <!-- PENGUMUMAN PKL=== -->
  <div id="pengumuman" class="section-area section-sp1">
    <div class="container">
      <div class="row">
        <div class="col-md-12 heading-bx left">
          <h2 class="title-head">Pengumuman <span>PKL</span></h2>
          <p>Pengumuman seputar PKL</p>
        </div>
      </div>
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
        <?php foreach($announcements as $announcement): ?>
        <tr>
          <td class="align-middle"><img src="<?= ($announcement->image!==null) ? html_escape($announcement->image) : base_url('public/images/announcements/default.jpg'); ?>" alt="" style="max-width:100px"></td>
          <td class="align-middle judul"><?= html_escape($announcement->title) ?></td>
          <td class="align-middle"><?= html_escape($announcement->excerpt) ?></td>
          <td class="align-middle"><?= html_escape($announcement->created_at) ?></td>
          <td class="align-middle"><?= html_escape($announcement->author_name) ?></td>
          <td class="align-middle">
            <a href="<?= site_url('announcements/show/') . $announcement->slug?>" class="badge badge-info">Lihat</a>          
          </td>
        </tr>
        <?php endforeach; ?>
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
  </div>
  <!-- PENGUMUMAN PKL END=== -->

  <!-- Frequently Asked Questions=== -->
  <div class="section-area section-sp1">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12">
          <div class="heading-bx left">
            <h2 class="m-b10 title-head">FAQs</h2>
          </div>
          <p>Jawaban dari pertanyaan-pertanyaan yang sering ditanyakan terkait PKL. Dibaca dahulu sebelum mengajukan pertanyaan yang lain. Label "New" berarti belum lewat jangka waktu 4 hari sejak ditambahkan</p>
          <div class="ttr-accordion m-b30 faq-bx" id="accordion1">
            <!-- LOOPING START HERE===-->
            <?php 
            $array_length = count($faqs);
            for ($i = 0; $i < $array_length; $i++):
            ?>
            <div class="panel">
              <div class="acod-head">
                <h6 class="acod-title"> 
                  <a data-toggle="collapse" href="#faq<?= $i ?>" class="collapsed" data-parent="#faq<?= $i ?>">
                  <?= html_escape($faqs[$i]->question) ?>

                  <?php
                  // php function to get date difference between current and post
                  $today = strtotime(date('Y-m-d H:i:s'));
                  if (ceil($today - strtotime($faqs[$i]->created_at)) / 86400 <= 4):
                  ?>
                  <span class="btn button-sm red">NEW</span>
                  <?php endif;?>

                  </a> </h6>
              </div>
              <div id="faq<?= $i ?>" class="acod-body collapse">
                <div class="acod-content"><?= html_escape($faqs[$i]->answer) ?></div>
              </div>
            </div>
            <?php endfor; ?>
            <!-- LOOPING END HERE===-->
          </div>
        </div>
        <!-- Contact Person=== -->
        <div class="col-lg-4 col-md-12">
          <div class="bg-primary text-white contact-info-bx">
            <h2 class="m-b10 title-head">Contact <span>Person</span></h2>
            <p>Masih ada yang ingin ditanyakan? Coba kontak mereka</p>
            <div class="widget widget_getintuch">	
              <ul>
                <?php foreach ($cp_tpp_pkl as $title => $cps): ?>
                <li><strong><?= $title ?></strong></li>                
                  <?php foreach($cps as $cp): ?>
                  <li>
                    <i class="fa fa-whatsapp"></i>
                    +<?= $cp->nomor . ' (' . $cp->nama . ')' ?>
                    <br>
                    <a href="https://wa.me/<?= $cp->nomor ?>" target="_blank">
                      <span class="btn button-sm">Hubungi</span>
                    </a>
                  </li>
                  <?php endforeach; ?>
                <?php endforeach; ?>
              </ul>
            </div>
            <h5 class="m-t0 m-b20">Follow Us</h5>
            <ul class="list-inline contact-social-bx">
              <li><a href="https://www.instagram.com/timpedulipajak21/" class="btn outline radius-xl" target="_blank"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
        <!-- Contact Person END=== -->
      </div>					
    </div>
  </div>
  <!-- Frequently Asked Questions END=== -->

  <!-- Susunan Pengurus PKL=== -->
  <div class="section-area section-sp1">
    <div class="container">
      <div class="heading-bx left">
        <h2 class="m-b10 title-head">Koordinator PKL</h2>
      </div>
      <p>Susunan pengurus koordinator PKL</p> 
      <div class="table-responsive">
        <table class="table table-borderless" style="table-layout: fixed;">
          <thead class="bg-primary text-white">
            <tr>
              <th scope="col" class="text-white" style="max-width:50%">Bidang</th>
              <th scope="col" class="text-white">Nama Lengkap</th>
            </tr>
          </thead>
          <tbody>
            <!-- LOOP START HERE=== -->
            <?php 
            // This is about to get messy. But trust me, me and I can do this
            foreach ($tpp_pkl_members as $key => $tpp_pkl_member):
            ?>
            <tr>                            
              <th scope="row" class="bg-primary text-white" style="max-width:50%">
                <?php if($key == 0 || $tpp_pkl_member->field_name != $tpp_pkl_members[$key-1]->field_name)
                {
                  echo $tpp_pkl_member->field_name;
                }
                ?>
              </th>                            
              <td><?= $tpp_pkl_member->fullname ?></td>
            </tr>
            <?php endforeach; ?>
            <!-- LOOP END HERE=== -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Susunan Pengurus PKL END=== -->
</div>
<!-- Inner Content Box END ==== -->

<?= $this->load->view('layouts/welcome_footer', NULL, true); ?>