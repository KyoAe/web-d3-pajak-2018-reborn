<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
	<meta name="description" content="D III Pajak 2018" />
	
	<!-- OG -->
	<meta property="og:title" content="D III Pajak 2018" />
	<meta property="og:description" content="D III Pajak 2018" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="<?= base_url(); ?>public/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>public/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title><?= $title ?> - D III Pajak 2018 </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="<?= base_url(); ?>public/js/html5shiv.min.js"></script>
	<script src="<?= base_url(); ?>public/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/color/color-1.css">
	
</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="mt-5">
		<div class="text-center my-5">
			<a href="<?= site_url(); ?>"><img src="<?= base_url(); ?>public/images/logo-white.png" alt="" width="211px"></a>
		</div>
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Login to your <span>Account</span></h2>
					<!-- <p>Don't have an account? <a href="register.html">Create one here</a></p> -->
				</div>	
				<form class="contact-bx" method="post">
					<small class="text-danger"><?php echo $this->aauth->print_errors() ?></small>
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<?php echo form_error('email') ?>
								<div class="input-group">									
									<label>Email</label>
									<input name="email" type="text" required="" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<?php echo form_error('pass') ?>
								<div class="input-group"> 
									<label>Password</label>
									<input name="pass" type="password" class="form-control" required="">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group form-forget">
								<a href="<?= site_url(); ?>auth/forgot_password" class="ml-auto">Forgot Password?</a>
							</div>
						</div>
						<div class="col-lg-12 m-b30 text-center">
							<button name="submit" type="submit" value="Submit" class="btn button-md">Login</button>
						</div>
					</div>
                </form>
            </div>            
		</div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    D III Pajak 2018 PKN STAN
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <a target="_blank" href="https://instagram.com/walidsaja">WSJ</a>
                    -
                    <a target="_blank" href="https://instagram.com/gio_kyo">GA</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- External JavaScripts -->
<script src="<?= base_url(); ?>public/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>public/vendors/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url(); ?>public/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>public/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?= base_url(); ?>public/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="<?= base_url(); ?>public/vendors/magnific-popup/magnific-popup.js"></script>
<script src="<?= base_url(); ?>public/vendors/counter/waypoints-min.js"></script>
<script src="<?= base_url(); ?>public/vendors/counter/counterup.min.js"></script>
<script src="<?= base_url(); ?>public/vendors/imagesloaded/imagesloaded.js"></script>
<script src="<?= base_url(); ?>public/vendors/masonry/masonry.js"></script>
<script src="<?= base_url(); ?>public/vendors/masonry/filter.js"></script>
<script src="<?= base_url(); ?>public/vendors/owl-carousel/owl.carousel.js"></script>
<script src="<?= base_url(); ?>public/js/functions.js"></script>
<script src="<?= base_url(); ?>public/js/contact.js"></script>
</body>
</html>
