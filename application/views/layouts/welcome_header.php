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
	<meta name="description" content="<?= $title ?> - D III Pajak 2018" />
	
	<!-- OG -->
	<meta property="og:title" content="<?= $title ?> - D III Pajak 2018" />
	<meta property="og:description" content="<?= $title ?> - D III Pajak 2018" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="<?=base_url(); ?>public/images/favicon.png" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url(); ?>public/images/favicon.png" />
	
	<title><?= $title ?> - D III Pajak 2018 </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="public/js/html5shiv.min.js"></script>
	<script src="public/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/css/assets.css">

	<!-- Animate CSS ================================================= -->
	<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  	/>
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/css/shortcodes/shortcodes.css">
	
	<!-- DATATABLES ============================================= -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/datatables.min.css"/>

	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/css/color/color-1.css">
	
	<!-- REVOLUTION SLIDER CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/vendors/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/vendors/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/vendors/revolution/css/navigation.css">
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
							<li><a href="javascript:;"><i class="fa fa-question-circle"></i>QnA</a></li>
							<li><a href="mailto:taxer2k18pknstan@gmail.com"><i class="fa fa-envelope-o"></i>taxer2k18pknstan@gmail.com</a></li>
						</ul>
					</div>
					<div class="topbar-right">
						<ul>
							<?php if(! $this->aauth->is_loggedin()): ?>
							<li><a href="<?= site_url(); ?>auth/login">Login</a></li>
							<?php else: ?>
							<li><a href="<?= site_url(); ?>dashboard/profile">My Dashboard</a></li>
							<li><a href="<?= site_url(); ?>auth/logout">Logout</a></li>
							<?php endif; ?>
							<!-- <li><a href="register.html">Register</a></li> -->
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
						<a href="<?= site_url(); ?>"><img src="<?=base_url(); ?>public/images/logo.png" alt=""></a>
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
                            	<li><a href="https://www.instagram.com/d3pajak2018" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://line.me/ti/p/~@HHJ6080P" target="_blank" class="btn-link"><i class="fa fa-comments"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCyPFirc_-09X7_kd_3X0w2g" target="_blank" class="btn-link"><i class="fa fa-youtube-play"></i></a></li>
								<!-- Search Button ==== 
								<li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li> -->
							</ul>
						</div>
                    </div>
					<!-- Search Box ==== 
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div> -->
					<!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
						<div class="menu-logo">
							<a href=" <?=site_url(); ?>"><img src="<?=base_url() ?>public/images/logo.png" alt=""></a>
						</div>
						<nav>
                        <ul class="nav navbar-nav">	
							<li><a href="<?= site_url(); ?>">Home</a></li>
							<li><a href="<?= site_url(); ?>announcements">Pengumuman</a></li>
							<li><a href="<?= site_url(); ?>events">Kalender</a></li>
							<li><a href="javascript:;">TPP <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="<?= site_url() ?>tpp/ktta">KTTA</a></li>
									<li><a href="<?= site_url() ?>tpp/pkl">PKL</a></li>									
								</ul>
							</li>
							<li><a href="javascript:;">Layanan Mahasiswa<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li class="disable"><a href="https://bit.ly/SistemaKiTTA">SistemaKiTTA</a></li>
									<li><a href="javascript:;">Study Kit <i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="https://bit.ly/D3Pajak2018">Drive Angkatan</a></li>
                                            <li><a href="https://bit.ly/SupplyUntukmu">Supply Untukmu</a></li>
                                            <li><a href="https://bit.ly/resumebyIR">Resume By IR</a></li>
										</ul>
									</li>
									<li><a href="<?= site_url(); ?>services/aspirasi_angkatan">Aspirasi</a></li>								
								</ul>
							</li>
							<li><a href="javascript:;">Tentang <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="<?= site_url() ?>about/tentang_angkatan">Tentang Angkatan</a></li>
									<li><a href="<?= site_url() ?>about/struktur_sa">Struktur SA</a></li>									
								</ul>
							</li>							
						</ul>
						</nav>
						<div class="nav-social-link">
							<?php if(! $this->aauth->is_loggedin()): ?>
							<a href="<?= site_url(); ?>auth/login" class="btn-link">Login</a>
							<?php else: ?>
							<a href="<?= site_url(); ?>dashboard/profile" class="btn-link">My Dashboard</a>
							<a href="<?= site_url(); ?>auth/logout" class="btn-link">Logout</a>
							<?php endif; ?>
						</div>
					</div>					
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header Top END ==== -->