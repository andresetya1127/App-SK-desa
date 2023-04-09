<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pelayanan Desa Lantan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/ekko-lightbox/ekko-lightbox.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/buttons.bootstrap5.min.css">


</head>

<body class="sidebar-collapse">
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
                    <a href="<?= base_url('/') ?>" class="nav-link">
                        Login
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">

                    <div class="card card-primary">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach ($profil as $key => $value) : ?>
                                    <div class="col-sm-2">
                                        <a href="<?= base_url('img/profile/' . $value['gambar']) ?>" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                            <img src="<?= base_url('img/profile/' . $value['gambar']) ?>" class="img-fluid mb-2" alt="white sample">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

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

    <script src="<?= base_url() ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= base_url() ?>/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?= base_url() ?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url() ?>/js/pages/dashboard2.js"></script>
    <!-- Sweat Alert -->
    <script src="<?= base_url() ?>/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/js/pelayanan.js"></script>

    <script src="<?= base_url() ?>/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
    <script>
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