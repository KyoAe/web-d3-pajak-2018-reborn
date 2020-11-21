<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="<?= $title ?> - Website D3 Pajak 2018" />
	
	<!-- OG -->
	<meta property="og:title" content="<?= $title ?> - Website D3 Pajak 2018" />
	<meta property="og:description" content="<?= $title ?> - Website D3 Pajak 2018" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="<?=base_url('public/'); ?>assets/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url('public/'); ?>assets/images/favicon.png" />
	
	<title><?= $title ?> - Website D3 Pajak 2018 </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/'); ?>assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/'); ?>assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/'); ?>assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/'); ?>assets/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="<?=base_url('public/'); ?>assets/css/color/color-1.css">
	
	<!-- REVOLUTION SLIDER CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/'); ?>assets/vendors/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/'); ?>assets/vendors/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/'); ?>assets/vendors/revolution/css/navigation.css">
	<!-- REVOLUTION SLIDER END -->	
</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-icon-bx"></div>
<!-- Header Top ==== -->
    <header class="header rs-nav">
		<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="topbar-left">
						<ul>
							<li><a href="faq-1.html"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
							<li><a href="javascript:;"><i class="fa fa-envelope-o"></i>Support@website.com</a></li>
						</ul>
					</div>
					<div class="topbar-right">
						<ul>
							<li>
								<select class="header-lang-bx">
									<option data-icon="flag flag-uk">English UK</option>
									<option data-icon="flag flag-us">English US</option>
								</select>
							</li>
							<li><a href="login.html">Login</a></li>
							<li><a href="register.html">Register</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
					<!-- Header Logo ==== -->
					<div class="menu-logo">
						<a href="<?= site_url(); ?>"><img src="<?=base_url('public/'); ?>assets/images/logo.png" alt=""></a>
					</div>
					<!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Author Nav ==== -->
                    <div class="secondary-menu">
                        <div class="secondary-inner">
                            <ul>
                            <li><a href="https://www.instagram.com/d3pajak2018" class="btn-link"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://line.me/ti/p/~@HHJ6080P" class="btn-link"><i class="fa fa-comments"></i></a></li>
								<!-- Search Button ==== -->
								<li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
							</ul>
						</div>
                    </div>
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div>
					<!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
						<div class="menu-logo">
							<a href=" <?=site_url(); ?>"><img src="<?=base_url('public/') ?>assets/images/logo.png" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">	
							<li class="active"><a href="<?= site_url(); ?>">Home</a></li>
							<li><a href="<?= site_url(); ?>announcements">Pengumuman</a></li>
							<li><a href="<?= site_url(); ?>events">Kegiatan</a></li>
							<li><a href="javascript:;">Layanan Mahasiswa<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li class="disable"><a href="https://bit.ly/SistemaKiTTA">KTTA</a></li>
									<li><a href="javascript:;">Study Kit <i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="https://bit.ly/D3Pajak2018">Drive Angkatan</a></li>
                                            <li><a href="https://bit.ly/SupplyUntukmu">Supply Untukmu</a></li>
                                            <li><a href="https://bit.ly/resumebyIR">Resume By IR</a></li>
										</ul>
									</li>
									<li><a href="javascript:;">Aspirasi</a></li>								
								</ul>
							</li>
							<li><a href="javascript:;">About <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="blog-classic-grid.html">Tentang Website</a></li>
									<li><a href="blog-classic-sidebar.html">Struktur SA</a></li>									
								</ul>
							</li>							
						</ul>
						<div class="nav-social-link">
                            <a href="https://www.instagram.com/d3pajak2018" class="btn-link"><i class="fa fa-instagram"></i></a>
                            <a href="https://line.me/ti/p/~@HHJ6080P" class="btn-link"><i class="fa fa-comments"></i></a>
                            <a href="javascript:;" class="btn-link">Login</a>
						</div>
                    </div>
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header Top END ==== -->