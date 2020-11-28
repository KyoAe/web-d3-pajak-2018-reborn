<?= $this->load->view('layouts/welcome_header', NULL, true); ?>

<!-- Content -->
<div class="page-content bg-white">
  <!-- Main Slider -->
  <div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url(public/images/background/bg1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center text-white">
          <h2>Website Angkatan Tidak Resmi</h2>
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
                  <div class="ribbon bg-yellow">
                    New
                  </div>
                </div>
                <?php endif; ?>
                <img src="<?= ($announcement->image !== '') ? html_escape($announcement->image) : base_url('public/images/announcement/default.jpg'); ?>" style="height:300px;object-fit:cover">
              </div>
              <div class="info-bx">
                <ul class="media-post">
                  <li><a href="#"><i class="fa fa-calendar"></i><?php echo explode(' ', html_escape($announcement->created_at))[0]; ?></a></li>
                  <li><a href="#"><i class="fa fa-user"></i><?php echo html_escape($announcement->author_name); ?></a></li>
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
            <h2 class="title-head m-b0">Kegiatan <span>Angkatan</span></h2>
            <p class="m-b0">Sering lupa kegiatan apa yang terjadi di angkatan? Kami merampungnya untuk Anda.</p>
          </div>
        </div>
        <div class="row">
        <div class="upcoming-event-carousel owl-carousel owl-btn-center-lr owl-btn-1 col-12 p-lr0  m-b30 bg-white">
          <div class="item">
            <div class="event-bx">
              <div class="action-box">
                <img src="<?= base_url(); ?>public/images/event/pic4.jpg" alt="">
              </div>
              <div class="info-bx d-flex">
                <div>
                  <div class="event-time">
                    <div class="event-date">29</div>
                    <div class="event-month">October</div>
                  </div>
                </div>
                <div class="event-info">
                  <h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
                  <ul class="media-post">
                    <li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
                  </ul>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="event-bx">
              <div class="action-box">
                <img src="<?= base_url(); ?>public/images/event/pic3.jpg" alt="">
              </div>
              <div class="info-bx d-flex">
                <div>
                  <div class="event-time">
                    <div class="event-date">29</div>
                    <div class="event-month">October</div>
                  </div>
                </div>
                <div class="event-info">
                  <h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
                  <ul class="media-post">
                    <li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
                  </ul>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="event-bx">
              <div class="action-box">
                <img src="<?= base_url(); ?>public/images/event/pic2.jpg" alt="">
              </div>
              <div class="info-bx d-flex">
                <div>
                  <div class="event-time">
                    <div class="event-date">29</div>
                    <div class="event-month">October</div>
                  </div>
                </div>
                <div class="event-info">
                  <h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
                  <ul class="media-post">
                    <li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
                  </ul>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="text-center">
          <a href="<?= site_url(); ?>events" class="btn">Lihat Semua Kegiatan</a>
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
                    <h5 class="ttr-tilte">Kegiatan Angkatan</h5>
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
            <h2 class="title-head text-uppercase">Kata-Kata <span>Realita</span></h2>
            <p>Karena kenyataan itu memanglah pahit.</p>
          </div>
        </div>
        <div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
          <div class="item">
            <div class="testimonial-bx">
              <div class="testimonial-thumb">
                <img src="<?= base_url(); ?>public/images/testimonials/hikigaya.jpg" alt="">
              </div>
              <div class="testimonial-info">
                <h5 class="name">Hikigaya Hachiman</h5>
                <p>-Ore ga Iru</p>
              </div>
              <div class="testimonial-content">
                <p>Hard work betrays none, but dreams betray many. Working hard alone doesn't assure you that you'll achieve your dreams. Actually there are more cases where you don't. Even so, working hard and achieving something is some consolation at least.</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-bx">
              <div class="testimonial-thumb">
                <img src="<?= base_url(); ?>public/images/testimonials/hikigaya.jpg" alt="">
              </div>
              <div class="testimonial-info">
                <h5 class="name">Hikigaya Hachiman</h5>
                <p>-Ore ga Iru</p>
              </div>
              <div class="testimonial-content">
                <p>If to be truthful is to be cruel, then lying must surely be an act of kindness. And so, kindness is a lie.</p>
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