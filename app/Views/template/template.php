<?php

namespace App\Controllers;

use App\Models\RequestModel;

$this->notif = new RequestModel();

$list = $this->notif->list_notif();
$print = $this->notif->print_notif();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/select2/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/dataTables.bootstrap5.min.css">
    <?php $this->renderSection('print'); ?>
    <link rel="stylesheet" href="<?= base_url() ?>/css/buttons.bootstrap5.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        <!-- sweat Alert -->
        <div class="flash-error" data-flashdata="<?= session()->getFlashdata('error'); ?>"></div>
        <div class="flash-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
        <div class="flash-info" data-flashdata="<?= session()->getFlashdata('info'); ?>"></div>
        <!--  -->
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('dashboard/user'); ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('contact'); ?>" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('logout/user') ?>" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url() ?>/img/logo-lantan.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text font-weight-light">Pelayanan Desa</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>/img/user.png" class="elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= session()->get('username') ?></a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php if (session()->get('level') == 1) : ?>
                            <!-- menu Dashboard -->

                            <li class="nav-item menu-open">
                                <a href="<?= base_url('dashboard/admin') ?>" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            <?php endif; ?>

                            <!-- end Dashboard -->


                            <!-- Data Surat -->
                            <li class="nav-header">Profil</li>
                            <li class="nav-item">
                                <a href="<?= base_url('profile'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-globe"></i>
                                    <p>
                                        Profil Desa
                                    </p>
                                </a>
                            </li>



                            <li class="nav-header">Data</li>
                            <li class="nav-item menu-is-opening menu-open">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-circle nav-icon text-warning"></i>
                                    <p>
                                        Surat
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: block;">

                                    <?php if (session()->get('level') == 2) : ?>
                                        <li class="nav-item">
                                            <a href="<?= base_url('surat') ?>" class="nav-link">
                                                <i class="fas fa-paper-plane nav-icon"></i>
                                                <p>Request Surat</p>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (session()->get('level') == 1) : ?>
                                        <li class="nav-item">
                                            <a href="<?= base_url('list_surat/all') ?>" class="nav-link">
                                                <i class="fas fa-list-alt nav-icon"></i>
                                                <p>List Request</p>
                                                <span class="badge badge-info right"><?= $list; ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('Print/doc') ?>" class="nav-link">
                                                <i class="fas fa-print nav-icon"></i>
                                                <p>Print Surat</p>
                                                <span class="badge badge-info right"><?= $print; ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('surat_keluar') ?>" class="nav-link">
                                                <i class="fas fa-envelope-open nav-icon"></i>
                                                <p>Surat Keluar</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('format') ?>" class="nav-link">
                                                <i class="fas fa-envelope-open nav-icon"></i>
                                                <p>Format Surat</p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>

                            <?php if (session()->get('level') == 1) : ?>
                                <!-- Penduduk -->
                                <li class="nav-item  nav-item menu-is-opening menu-open">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle nav-icon text-warning"></i>
                                        <p>
                                            Data Pendudukan
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="display: block;">
                                        <li class="nav-item">
                                            <a href="<?= base_url('penduduk/all') ?>" class="nav-link">
                                                <i class="fas fa-database nav-icon"></i>
                                                <p>Penduduk</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('user/all') ?>" class="nav-link">
                                                <i class="fas fa-users nav-icon"></i>
                                                <p>User</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            <?php endif; ?>
                            <!-- info -->
                            <li class="nav-header">Tentang</li>
                            <li class="nav-item">
                                <a href="pages/gallery.html" class="nav-link">
                                    <i class="nav-icon fas fa-info"></i>
                                    <p>
                                        Panduan
                                    </p>
                                </a>
                            </li>
                    </ul>
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
                            <h1 class="m-0"><?= $title; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <?php $this->renderSection('content'); ?>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->

        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0-rc
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <?php $this->renderSection('dataTable'); ?>

    <!-- jQuery Mapael -->
    <script src="<?= base_url() ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= base_url() ?>/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?= base_url() ?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- select2 js -->
    <script src="<?= base_url() ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"></script>
    <script src="<?= base_url() ?>/js/pages/dashboard2.js"></script>
    <!-- Sweat Alert -->
    <script src="<?= base_url() ?>/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/js/pelayanan.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('af9470d074dbef3d6660', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
</body>

</html>