<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?> - D III Pajak 2018</title>

  <!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="<?=base_url(); ?>public/images/favicon.png" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="<?=base_url(); ?>public/images/favicon.png" />
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/jqvmap/jqvmap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/toastr/toastr.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/adminLTE/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-yellow navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url(); ?>dashboard" class="nav-link">Home</a>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm">
          <a href="<?= site_url(); ?>auth/logout" class="dropdown-item text-center confirmation">
            Keluar
          </a>         
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-yellow elevation-4">
    <!-- Brand Logo -->
    <a href="<?= site_url(); ?>" class="brand-link navbar-warning">
      <img src="<?= base_url(); ?>public/images/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">D III Pajak 2018</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url(); ?>public/images/profile/hikigaya.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Giovanni Octa Anggoman</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library  -->
        <?php
          $menus = $this->menus->get_by_name('dashboard');
          $this->multi_menu->set_items($menus);
  
          $config = $this->config->item('menu_styles')['dashboard'];
          $this->multi_menu->initialize($config);

          echo $this->multi_menu->render();
        ?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url(); ?>dashboard/">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->