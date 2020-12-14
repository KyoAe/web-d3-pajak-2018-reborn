<?= $this->load->view('layouts/welcome_header', NULL, true); ?>

<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url(); ?>public/images/banner/banner2.jpg);">
      <div class="container">
        <div class="page-banner-entry">
          <h1 class="text-white"><?= $title ?></h1>
        </div>
      </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
      <div class="container">
        <ul class="list-inline">
          <li><a href="<?= site_url(); ?>">Home</a></li>
          <li><?= $title ?></li>
        </ul>
      </div>
    </div>
    <!-- Breadcrumb row END -->
    <div class="content-block">
      <div class="section-area section-sp1">
        <div class="container">
          <div class="row">
            <!-- Left part start -->
            <div class="col-lg-8 col-xl-8 shadow-sm">
              <!-- blog start -->
              <div class="recent-news blog-lg">
                <div class="action-box blog-lg">
                  <?php if ($announcement->image !== null): ?>
                  <img src="<?= html_escape($announcement->image) ?>" width="200" height="143" alt=""> 
                  <?php else: ?>
                  <img src="<?= base_url('public/images/announcements/default.jpg');  ?>" width="200" height="143" alt=""> 
                  <div class="text-center"><a href="http://www.freepik.com">Designed by Freepik</a></div>
                  <?php endif; ?>                  
                </div>
                <div class="info-bx">
                  <ul class="media-post">
                    <li><a href="#"><i class="fa fa-calendar"></i><?= html_escape($announcement->created_at) ?></a></li>
                    <li><a href="#"><i class="fa fa-user"></i><?= html_escape($announcement->author_name) ?></a></li>
                    <li><a href="#"><i class="fa fa-folder-open"></i><?= html_escape($announcement->category_name); ?></a></li>
                  </ul>
                  <h5 class="post-title"><a href="#"><?= html_escape($announcement->title) ?></a></h5>
                  <div class="post-body">
                    <?= $announcement->body ?>
                  </div>
                  <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                </div>
              </div>
              <!-- blog END -->
            </div>
            <!-- Left part END -->
            <!-- Side bar start -->
            <div class="col-lg-4 col-xl-4">
              <aside  class="side-bar sticky-top">
                <div class="widget recent-posts-entry">
                  <h6 class="widget-title">Recent Posts</h6>
                  <?php foreach ($announcements as $announcement): ?>
                  <div class="widget-post-bx">
                    <div class="widget-post clearfix">
                      <div class="ttr-post-media"> 
                        <img src="<?= ($announcement->image !== null) ? html_escape($announcement->image) : base_url('public/images/announcements/default.jpg'); ?>" alt="">
                      </div>
                      <div class="ttr-post-info">
                        <div class="ttr-post-header">
                          <h6 class="post-title"><a href="<?= site_url('announcements/show/') . $announcement->slug; ?>"><?php echo html_escape($announcement->title); ?></a></h6>
                        </div>
                        <ul class="media-post">
                          <li><a href="#"><i class="fa fa-calendar"></i><?php echo explode(' ', html_escape($announcement->created_at))[0]; ?></a></li>
                          <li><a href="#"><i class="fa fa-user"></i><?php echo html_escape($announcement->author_name); ?></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
              </aside>
            </div>
            <!-- Side bar END -->
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Content END-->

<?= $this->load->view('layouts/welcome_footer', NULL, true); ?>