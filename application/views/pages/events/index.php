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
    
    <!-- contact area -->
    <div class="content-block">
        <!-- Portfolio  -->
        <div class="section-area section-sp1 gallery-bx">
            <div class="container text-center">
                <!-- <p>Untuk menambahkan kalender ini ke kalender Anda, tekan tombol "Add to Google Calendar" yang ada di bawah kanan</p> -->
                <!-- Embed Google Calendar untuk web angkatan tidak resmi. Kalender milik Gio -->
                <div class="mx-auto">
                    <h2>COMING SOON</h2>
                </div>                
            </div>
        </div>
    </div>
    <!-- contact area END -->
</div>
<!-- Content END-->

<?= $this->load->view('layouts/welcome_footer', NULL, true); ?>