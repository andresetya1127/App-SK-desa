<!-- untuk menambahkan konten -->
<?= $this->extend('template/auth'); ?>
<?= $this->section('content'); ?>
<!--  -->

<body class="hold-transition login-page" style="min-height: 466px;">
    <div class="flash-identify" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
    <div class="row mt-5">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-exclamation text-warning" style="font-size:2.5rem ;"></i>
                    </div>
                    <div class="col">
                        <h4>Silahkan Lengkapi Data Anda!</h4>
                    </div>
                </div>
            </div>
            <form action="<?= base_url('identitas/save') ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <!-- nama -->
                        <div class="col">
                            <div class="form-group">
                                <input type="hidden" name="id_user" value="<?= session()->get('id_user'); ?>">
                                <label for="">Nama</label>
                                <input value="<?= old('nama'); ?>" type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" placeholder="Nama Lengkap">
                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <div class="col">
                            <!-- nama -->
                            <div class="form-group">
                                <label for="">No. KK</label>
                                <input type="number" value="<?= old('kk'); ?>" name="kk" class="form-control <?= ($validation->hasError('kk')) ? 'is-invalid' : '' ?>" placeholder="No.kk">

                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kk'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- username -->
                            <div class="form-group">
                                <label for="">No. Nik</label>
                                <input type="number" value="<?= old('nik'); ?>" name="nik" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>" placeholder="No. Nik">
                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <!-- pekerjaan -->
                        <div class="col">
                            <!-- username -->
                            <div class="form-group">
                                <label for="">Pekerjaan</label>
                                <input type="text" value="<?= old('pekerjaan'); ?>" name="pekerjaan" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : '' ?>" placeholder="Pekerjaan">

                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('pekerjaan'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <!-- pendidikan -->
                        <div class="col">
                            <div class="form-group">
                                <label for="">Pendidikan</label>
                                <select name="pendidikan" class="custom-select rounded-0 <?= ($validation->hasError('pendidikan')) ? 'is-invalid' : '' ?>" id="exampleSelectRounded0">
                                    <option selected hidden value="<?= old('pendidikan'); ?>"><?= old('pendidikan'); ?></option>
                                    <?php foreach ($pendidikan as $key) : ?>
                                        <option value="<?= $key ?>"><?= $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('pendidikan'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- Jenis Kelamin -->
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jk" class="custom-select rounded-0 <?= ($validation->hasError('jk')) ? 'is-invalid' : '' ?>" id="exampleSelectRounded0">
                                    <option selected hidden value="<?= old('jk'); ?>"><?= old('jk'); ?></option>
                                    <?php foreach ($jk as $key) : ?>
                                        <option value="<?= $key ?>"><?= $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jk'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <div class="col">
                            <!-- password -->
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" value="<?= old('tgl_lahir'); ?>" name="tgl_lahir" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : '' ?>" placeholder="Tanggal Lahir">

                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgl_lahir'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <div class="col">
                            <!-- agama -->
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="agama" class="custom-select rounded-0 <?= ($validation->hasError('agama')) ? 'is-invalid' : '' ?>" id="exampleSelectRounded0">
                                    <option selected hidden value="<?= old('agama'); ?>"><?= old('agama'); ?></option>
                                    <?php foreach ($agama as $key) : ?>
                                        <option value="<?= $key ?>"><?= $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('agama'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <!-- status -->
                            <div class="form-group">
                                <label for="">Status Perkawinan</label>
                                <select name="status_kawin" class="custom-select rounded-0 <?= ($validation->hasError('status_kawin')) ? 'is-invalid' : '' ?>" id="exampleSelectRounded0">
                                    <option selected hidden value="<?= old('status_kawin'); ?>"><?= old('status_kawin'); ?></option>
                                    <?php foreach ($status as $key) : ?>
                                        <option value="<?= $key ?>"><?= $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('status_kawin'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nama Ayah</label>
                                <input value="<?= old('nm_ayah'); ?>" type="text" name="nm_ayah" class="form-control <?= ($validation->hasError('nm_ayah')) ? 'is-invalid' : '' ?>" placeholder="Nama ayah">

                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nm_ayah'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                        <div class="col">
                            <!-- Konfirmasi Password -->
                            <div class="form-group">
                                <label for="">Nama Ibu</label>
                                <input type="text" value="<?= old('nm_ibu'); ?>" name="nm_ibu" class="form-control <?= ($validation->hasError('nm_ibu')) ? 'is-invalid' : '' ?>" placeholder="Nama ibu">

                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nm_ibu'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- No. Hp -->
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <textarea name="tmp_lahir" class="form-control <?= ($validation->hasError('tmp_lahir')) ? 'is-invalid' : '' ?>" placeholder="Tempat Lahir"><?= old('tmp_lahir'); ?></textarea>

                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tmp_lahir'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <div class="col">
                            <!-- username -->
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>" placeholder="Alamat"><?= old('alamat'); ?></textarea>

                                <!-- feedback -->
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col text-left">
                            <a href="<?= base_url('logout/' . MD5(session()->get('id_user'))) ?>" class="btn btn-outline-primary">
                                Nanti
                            </a>
                        </div>
                        <div class="col text-right">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>