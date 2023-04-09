<!-- untuk menambahkan konten -->
<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<!--  -->

<section class="content">
    <div class="container-fluid">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= base_url() ?>/img/logo-lantan.png" alt="Lantan" height="90" width="70">
        </div>

        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-paper-plane"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Request Surat</span>
                        <span class="info-box-number">
                            <?= $total; ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope-open"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Surat Keluar</span>
                        <span class="info-box-number"> <?= $sum_keluar; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pengguna</span>
                        <span class="info-box-number"><?= $sum_user; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-id-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Penduduk</span>
                        <span class="info-box-number"><?= $sum_kk; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>

<!-- pentup konten -->
<?= $this->endSection(); ?>
<!--  -->