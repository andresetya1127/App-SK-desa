<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>

<?php $this->renderSection('content'); ?>

<!-- jQuery -->
<script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/js/adminlte.min.js"></script>
<!-- js Dropbox  -->
<script src="<?= base_url(); ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- Bs stepper -->
<script src="<?= base_url(); ?>/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- Sweat Alert -->
<script src="<?= base_url() ?>/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>/js/pelayanan.js"></script>
<!-- Dropbox -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
</script>
</body>

</html>