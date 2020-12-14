<?= $this->load->view('layouts/welcome_header', NULL, true); ?>

<!-- Content -->
<div class="page-content bg-white">
  <!-- Main Slider -->
  <div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url(public/images/background/bg1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center text-white">
          <h2>Website Angkatan Resmi</h2>
          <h5>Sesungguhnya, rasa simpati sudah ada di setiap kita. Namun, tidak banyak yang mengambil tindakan</h5>							
        </div>
      </div>
      <div class="mw800 m-auto">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="cours-search-bx m-b30">
              <div class="icon-box">
                <h3><i class="ti-user"></i><span class="counter">947</span>org</h3>
              </div>
              <span class="cours-search-text">Awal Masuk 2018</span>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="cours-search-bx m-b30">
              <div class="icon-box">
                <h3><i class="ti-user"></i><span class="counter">939</span>org</h3>
              </div>
              <span class="cours-search-text">Per 14 November 2020</span>
            </div>
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
  <!-- Main Slider -->
  <div class="content-block">
    <!-- Pengumuman Terbaru -->
    <div id="pengumuman" class="section-area section-sp2">
      <div class="container">
        <div class="row">
          <div class="col-md-12 heading-bx left">
            <h2 class="title-head">Pengumuman <span>Angkatan</span></h2>
            <p>Sudah merupakan fakta bahwa jarkoman yang disebarkan sering dilupakan. Kami merampungnya untuk anda</p>
          </div>
        </div>
        <div class="recent-news-carousel owl-carousel owl-btn-1 col-12 p-lr0 m-b30">
          <?php foreach ($announcements as $announcement): ?>
          <div class="item">
            <div class="recent-news">
              <div class="action-box">
                <?php
                  // php function to get date difference between current and post
                  $today = strtotime(date('Y-m-d H:i:s'));
                  if (ceil($today - strtotime($announcement->created_at)) / 86400 <= 4):
                ?>
                <div class="ribbon-wrapper ribbon-lg">
                  <div class="ribbon bg-white">
                    New
                  </div>
                </div>
                <?php endif; ?>
                <img src="<?= ($announcement->image !== null) ? html_escape($announcement->image) : base_url('public/images/announcements/default.jpg'); ?>" style="height:300px;object-fit:cover">
              </div>
              <div class="info-bx">
                <ul class="media-post">
                  <li><a href="#"><i class="fa fa-calendar"></i><?php echo explode(' ', html_escape($announcement->created_at))[0]; ?></a></li>
                  <li><a href="#"><i class="fa fa-user"></i><?php echo html_escape($announcement->author_name); ?></a></li>
                  <li><a href="#"><i class="fa fa-folder-open"></i><?php echo html_escape($announcement->category_name); ?></a></li>
                </ul>
                <h5 class="post-title"><a href="<?= site_url('announcements/show/') . $announcement->slug; ?>"><?php echo html_escape($announcement->title); ?></a></h5>
                <p><?php echo html_escape($announcement->excerpt); ?></p>
                <div class="text-center">
                  <hr>
                  <a href="<?= site_url('announcements/show/') . $announcement->slug; ?>" class="btn-link">READ MORE</a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="text-center">
          <a href="<?= site_url(); ?>announcements" class="btn">Lihat Semua Pengumuman</a>
        </div>
      </div>
    </div>
    <!-- Pengumuman Terbaru End -->
    <!-- Upcoming Events -->
    <div class="section-area section-sp2">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center heading-bx">
            <h2 class="title-head m-b0">Kalender <span>Angkatan</span></h2>
            <p class="m-b0">Sering bingung kegiatan apa yang terjadi di angkatan? Mari lihat kalender angkatan</p>
          </div>
        </div>
        <div class="row">
          
        </div>
        <div class="text-center">
          <a href="<?= site_url(); ?>events" class="btn">Lihat Kalender Angkatan</a>
        </div>
      </div>
    </div>
    <!-- Upcoming Events End-->
    <!-- Form END -->
    <!-- Layanan Mahasiswa -->
    <div class="section-area section-sp1">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 m-b30">
            <h2 class="title-head ">Layanan Mahasiswa<br> <span class="text-primary">untuk Anda</span></h2>
            <h4>Ada <span class="counter">4</span> untuk saat ini</h4>
            <p>Karena sesungguhnya membuat web tidaklah mudah, apalagi sendiri. Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></p>
            <!-- <a href="#" class="btn button-md">Join Now</a> -->
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
                <div class="feature-container">
                  <div class="feature-md text-white m-b20">
                    <a href="https://bit.ly/D3Pajak2018" class="icon-cell"><img src="<?= base_url(); ?>public/images/icon/google-drive.png" alt=""></a> 
                  </div>
                  <div class="icon-content">
                    <h5 class="ttr-tilte">Drive Angkatan</h5>
                    <p>Menemani kamu di saat belajar.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
                <div class="feature-container">
                  <div class="feature-md text-white m-b20">
                    <a href="<?= site_url(); ?>events" class="icon-cell"><img src="<?= base_url(); ?>public/images/icon/calendar.png" alt=""></a> 
                  </div>
                  <div class="icon-content">
                    <h5 class="ttr-tilte">Kalender Angkatan</h5>
                    <p>Agar kamu tidak ketinggalan kegiatan di angkatan.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
                <div class="feature-container">
                  <div class="feature-md text-white m-b20">
                    <a href="<?= site_url(); ?>announcements" class="icon-cell"><img src="<?= base_url(); ?>public/images/icon/chat.png" alt=""></a> 
                  </div>
                  <div class="icon-content">
                    <h5 class="ttr-tilte">Pengumuman Angkatan</h5>
                    <p>Pengumuman dan berita terbaru.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
                <div class="feature-container">
                  <div class="feature-md text-white m-b20">
                    <a href="<?= site_url(); ?>about/struktur_sa" class="icon-cell"><img src="<?= base_url(); ?>public/images/icon/icon4.png" alt=""></a> 
                  </div>
                  <div class="icon-content">
                    <h5 class="ttr-tilte">Struktur SA</h5>
                    <p>Kuy kenalan sama Sukarelawan Angkatan.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Layanan Mahasiswa End -->			
    <!-- Kutipan Motivasi ==== -->
    <div class="section-area section-sp2">
      <div class="container">
        <div class="row">
          <div class="col-md-12 heading-bx left">
            <h2 class="title-head text-uppercase">Kata-Kata <span>Motivasi</span></h2>
            <p>"People often say that motivation doesn't last. Well, neither does bathing, that's why we recommend it daily." -Zig Ziglar</p>
          </div>
        </div>
        <div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
          <div class="item">
            <div class="testimonial-bx">
              <div class="testimonial-thumb">
                <img src="data:image/jpeg;base64,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" alt="">
              </div>
              <div class="testimonial-info">
                <h5 class="name">Zig Ziglar</h5>
                <p>-American author, salesman, and motivational speaker</p>
              </div>
              <div class="testimonial-content">
                <p>Don't let the mistakes and disappointments of the past control and direct your future.</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-bx">
              <div class="testimonial-thumb">
                <img src="https://yt3.ggpht.com/ytc/AAUvwngjaqLexsc0kcJpMo-zejRgqueSGvTUgCvpTJ4biw=s900-c-k-c0x00ffffff-no-rj" alt="">
              </div>
              <div class="testimonial-info">
                <h5 class="name">Grant Cardone</h5>
                <p>-Founder and CEO of Cardone Enterprises</p>
              </div>
              <div class="testimonial-content">
                <p>Courage isn't the absence of fear, but an urgent impulse to do something despite fear.</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-bx">
              <div class="testimonial-thumb">
                <img 
                  src="https://d30womf5coomej.cloudfront.net/ua/74/5d/53/3d/46c6de37cf7248b088698dc11b604215.jpg" 
                  alt=""
                >
              </div>
              <div class="testimonial-info">
                <h5 class="name">Stephen McCranie</h5>
                <p>-Writer and illustrator</p>
              </div>
              <div class="testimonial-content">
                <p>The master has failed more times than the beginner has even tried.</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-bx">
              <div class="testimonial-thumb">
                <img 
                  src="https://www.biography.com/.image/t_share/MTE5NDg0MDU1MTUzNTA5OTAz/mark-twain-9512564-1-402.jpg" 
                  alt=""
                >
              </div>
              <div class="testimonial-info">
                <h5 class="name">Mark Twain</h5>
                <p>-American writer</p>
              </div>
              <div class="testimonial-content">
                <p>I have had lots of troubles in my life, most of which never happened.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Kutipan Motivasi END ==== -->
  </div>
  <!-- contact area END -->
</div>
<!-- Content END-->

<?= $this->load->view('layouts/welcome_footer', NULL, true); ?>