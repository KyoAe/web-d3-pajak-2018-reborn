<?= $this->load->view('layouts/welcome_header', NULL, true); ?>

<div class="page-content">
    <!-- Page Heading Box ==== -->
    <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url(); ?>public/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Aspirasi Angkatan</h1>
                </div>
        </div>
    </div>
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="<?= site_url(); ?>">Home</a></li>
                <li>Aspirasi Angkatan</li>
            </ul>
        </div>
    </div>
    <!-- Page Heading Box END ==== -->
    <!-- Page Content Box ==== -->
    <div class="content-block">
        <div class="section-area section-sp2">
            <div class="d-flex justify-content-center">
                <!-- Form START==== -->
                <h2>COMING SOON</h2>
                <!-- Form END ==== -->   
            </div>       
        </div>
    </div>
    <!-- Page Content Box END ==== -->  
</div>

<?= $this->load->view('layouts/welcome_footer', NULL, true); ?>