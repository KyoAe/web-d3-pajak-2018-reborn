<?= $this->load->view('layouts/welcome_header', NULL, true); ?>

<!-- Inner Content Box ==== -->
<div class="page-content">
    <!-- Page Heading Box ==== -->
    <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url(); ?>public/images/banner/banner2.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Tentang Angkatan</h1>
                </div>
        </div>
    </div>
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="<?= site_url(); ?>">Home</a></li>
                <li>Tentang Angkatan</li>
            </ul>
        </div>
    </div>
    <!-- Page Heading Box END ==== -->
    <!-- Page Content Box ==== -->
    <div class="content-block">       
        <!-- Our Story ==== -->
        <div class="section-area bg-gray section-sp1 our-story">
            <div class="container">
                <div class="row align-items-center d-flex flex-row-reverse">
                    <div class="col-lg-5 col-md-12 heading-bx">
                        <h2 class="m-b10">Tentang D III Pajak 2018</h2>                        
                        <p>Angkatan D3 Pajak 2018 adalah program studi Diploma III Pajak penerimaan tahun 2018 di Politeknik Keuangan Negara STAN. Angkatan ini memiliki visi yaitu "meningkatkan kualitas diri serta sinergi dalam bentuk silaturahmi demi kontribusi terbaik pada negeri".</p>
						<p>Angkatan D3 Pajak 2018 memiliki 939 pasukan siap tempur menjadi pengemban amanah pengelola keuangan negara saat setelah lulus dari pendidikan di Kampus Ali Wardhana pada tahun 2021.</p>
                    </div>
                    <div class="col-lg-7 col-md-12 heading-bx p-lr">
                        <div class="video-bx">
                            <img src="<?= base_url(); ?>public/images/about/figur-angkatan.png" alt="" style="max-height:500px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Story END ==== -->       
        <!-- Visi Misi ==== -->
        <div class="section-area section-sp2 bg-fix ovbl-dark join-bx text-center" style="background-image:url(<?= base_url(); ?>public/images/background/bg1.jpg); background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="join-content-bx text-white">
                            <h2>Visi</h2>
                            <h3>Meningkatkan kualitas diri serta sinergi dalam bentuk silaturahmi demi kontribusi terbaik pada negeri.</h3>
                            <h2>Misi</h2>
                            <ol>
								<li>Memantaskan angkatan D III Pajak 2018 dengan sebutan "Keluarga" di awal penyebutannya.</li>
								<li>Menggalakkan bentuk cerdas kegiatan preventif demi mewujudkan budaya ZERO DO.</li>
								<li>Mencapai eksistensi terbaik angkatan D III Pajak 2018 dalam segala sektor baik akademik maupun non akademik demi kemanfaatan bersama.</li>
							</ol>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Visi Misi END ==== -->
        <!-- Logo Angkatan ==== -->
        <div class="section-area bg-gray section-sp1 our-story">
            <div class="container">
                <div class="row align-items-center d-flex flex-row-reverse">
                    <div class="col-lg-5 col-md-12 heading-bx">
                        <h2 class="m-b10">Logo Angkatan</h2>                        
                        <p>
                            <ul>
                                <li><b class="text-dark">Warna Kuning</b>
                                    <br>Melambangkan optimisme, kebahagiaan, perdamaian, dan keceriaan.</li>
                                <li><b class="text-dark">Burung Garuda</b>
                                    <br>Melambangkan angkatan yang termasuk Generasi Garuda siap menjadi generasi yang menerjang segala rintangan dan menjadi punggawa keuangan negara yang bertekad kuat dalam memajukan negeri.</li>
                                <li><b class="text-dark">Lima Helai Bulu pada Sayap</b>
                                    <br>Mencerminkan nilai-nilai Kementerian Keuangan, yaitu Integritas, Profesionalisme, Sinergi, Pelayanan, dan Kesempurnaan.</li>
                                <li><b class="text-dark">Timbangan dengan Keadaan Seimbang</b>
                                    <br>Melambangkan angkatan DIII Pajak 2018 mampu menyeimbangkan antara prestasi akademis dengan prestasi non-akademis.</li>
                            </ul>
                        </p>
                    </div>
                    <div class="col-lg-7 col-md-12 heading-bx p-lr">
                        <div class="video-bx">
                            <img src="<?= base_url(); ?>public/images/about/logo-angkatan.png" alt="" style="max-height:500px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Logo Angkatan END ==== -->        
    </div>
    <!-- Page Content Box END ==== -->
</div>
<!-- Inner Content Box END ==== -->

<?= $this->load->view('layouts/welcome_footer', NULL, true); ?>
