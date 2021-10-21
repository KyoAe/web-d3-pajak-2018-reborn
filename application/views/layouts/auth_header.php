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
	
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/toastr/toastr.min.css">
    
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
	
    <style>
        .toast {
            opacity: 1 !important;
        }
    </style>
</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>