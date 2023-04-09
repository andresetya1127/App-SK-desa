<!-- untuk menambahkan konten -->
<?= $this->extend('template/auth'); ?>
<?= $this->section('content'); ?>
<!--  -->


<body class="hold-transition login-page">
	<div class="login-box">
		<?php if (session()->getFlashdata('success')) : ?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check"></i>success</h5>
				<?= session()->getFlashdata('success'); ?>
			</div>
		<?php endif; ?>
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<div class="row">
					<div class="col">
						<img style="max-height: 4.3rem;" src="<?= base_url() ?>/img/logo-lombok.jpg" alt="">
					</div>
					<div class="col">
						<a href="<?= base_url(); ?>/index2.html" class="h1"><b>LANTAN</b></a>
					</div>
					<div class="col">
						<img style="max-height: 4.3rem;" src="<?= base_url() ?>/img/logo-lantan.png" alt="">
					</div>
				</div>
			</div>
			<div class="card-body">



				<form method="POST" action="<?= base_url('/login/auth') ?>">
					<?= csrf_field(); ?>

					<div class="input-group mb-3">
						<input type="text" name="username" value="<?= old('username'); ?>" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?><?= session()->getFlashdata('user') ?>" placeholder="Username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
						<!-- feedback -->
						<div class="invalid-feedback">
							<?= $validation->getError('username'); ?>
							<?= session()->getFlashdata('user2') ?>
						</div>
						<!--  -->
					</div>

					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?> <?= session()->getFlashdata('pass') ?>" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-eye-slash"></span>
							</div>
						</div>
						<!-- feedback -->
						<div class="invalid-feedback">
							<?= session()->getFlashdata('pass2') ?>
							<?= $validation->getError('password'); ?>
						</div>
						<!--  -->
					</div>
					<div class="row">
						<div class="col-8">
							<p class="mb-1">
								<a href="forgot-password.html">Lupa password</a>
							</p>
							<p class="mb-0">
								<a href="<?= base_url('register') ?>" class="text-center">Daftar Akun!</a>
							</p>
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->

	<!-- pentup konten -->
	<?= $this->endSection(); ?>
	<!--  -->