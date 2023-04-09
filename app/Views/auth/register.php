<!-- untuk menambahkan konten -->
<?= $this->extend('template/auth'); ?>
<?= $this->section('content'); ?>
<!--  -->

<body class="hold-transition login-page" style="min-height: 466px;">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header card-header text-center">
                <img class="" src="<?= base_url() ?>/img/logo-lantan.png" alt="" style="max-height:6rem ;">
                <h1><b>Lantan</b></h1>
            </div>
            <div class="card-body">
                <!-- form -->
                <form action="<?= base_url('reg/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                        <div class="row">
                            <!-- username -->
                            <div class="input-group mb-3">
                                <input type="text" value="<?= old('username'); ?>" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>" placeholder="Username Baru">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <div class="row">
                            <!-- No. Hp -->
                            <div class="input-group mb-3">
                                <input type="number" value="<?= old('hp'); ?>" name="hp" class="form-control <?= ($validation->hasError('hp')) ? 'is-invalid' : '' ?>" placeholder="No. Hp">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('hp'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <div class="row">
                            <!-- password -->
                            <div class="input-group mb-3">
                                <input type="hidden" value="2" name="level">
                                <input type="password" value="<?= old('password'); ?>" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" placeholder="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-eye-slash"></span>
                                    </div>
                                </div>
                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <div class="row">
                            <!-- Konfirmasi Password -->
                            <div class="input-group mb-3">
                                <input type="password" name="konfirmasi" class="form-control <?= ($validation->hasError('konfirmasi')) ? 'is-invalid' : '' ?>" placeholder="Konfirmasi Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('konfirmasi'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>

                    <!-- Tombol bottom -->
                    <div class="row">
                        <div class="col-8">
                            <a href="<?= base_url('/') ?>" class="text-center">Sudah Punya akun!</a>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button class="btn btn-primary btn-block">Next</button>
                        </div>
                        <!-- /.col -->
                    </div>
            </div>
            </form>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
</body>

<?= $this->endSection(); ?>