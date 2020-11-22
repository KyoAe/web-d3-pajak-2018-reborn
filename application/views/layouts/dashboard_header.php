<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?= $title; ?> - D III Pajak 2018</title>

    <link rel="icon" href="<?= base_url('public/images/favicon.png'); ?>" type="image/png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="<?= base_url('public/admine/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('public/admine/css/paper-dashboard.css'); ?>" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url('public/admine/demo/demo.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
</head>
<body class="">
    <div class="wrapper ">
        <!-- Sidebar -->
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="<?= base_url(); ?>" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="<?= base_url(); ?>public/images/logo-white.png" alt="" style="height: 30px">                       
                    </div>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <!-- Query Menu -->
                    <?php
                    $menu = ["Menu 1"];
                    ?>
                    <!-- Query Menu END-->
                    <!-- LOOPING MENU -->
                    <?php foreach ($menu as $m) : ?>
                        <!-- SIAPKAN SUBMENU SESUAI MENU -->
                        <?php                            
                        $submenu = (object) 
                            [
                                'name' => ["Administrator", "Profil", "Hasil Studi", "Data Mahasiswa", "Data Mata Kuliah", "Data Indeks Prestasi"],
                                'icon' => ["nc-bank", "nc-circle-10", "nc-paper", "nc-laptop", "nc-tag-content", "nc-sound-wave"]
                            ];

                        ?>

                        <?php for ($i = 0; $i < count($submenu->name); $i++) : ?>
                            <?php if ($submenu->name[$i] == "Profil"):/*(uri_string() == 2) :*/ ?>
                                <li class="active">
                            <?php else : ?>
                                <li>
                            <?php endif; ?>
                                <a href="#">
                                    <i class="nc-icon <?= $submenu->icon[$i]; ?>"></i>
                                    <p><?= $submenu->name[$i] ?></p>
                                </a>
                                </li>
                        <?php endfor; ?>
                    <?php endforeach; ?>
                    <!-- LOOPING MENU END -->
                </ul>
            </div>
        </div>
        <!-- Sidebar End -->
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand"><strong><?= $title; ?></strong></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block"><?= (!empty($mahasiswa)) ? $mahasiswa->nama_lengkap : ''; ?></span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" onclick="return confirm('Yakin ingin keluar dari akun <?= (!empty($mahasiswa)) ? $mahasiswa->nama_lengkap : ''; ?>?')" href="<?= base_url('oto/logout'); ?>">Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <div class="content">