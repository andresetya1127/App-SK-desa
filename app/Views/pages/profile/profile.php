<!-- untuk menambahkan konten -->
<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<!--  -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid" src="<?= base_url('img/logo-lantan.png') ?>" alt="User profile picture" style="border: none;">
                        </div>

                        <h3 class="profile-username text-center">Desa lantan</h3>


                        <p class="text-center"><b class="text-muted"> @Desa_lantan</b></p>

                        <strong><i class="fas fa-map-marker-alt mr-1 mt-3"></i> Lokasi</strong>

                        <p class="text-muted">Lantan,Batukliang Utara</p>

                        <hr>
                        <a href="#" class="btn btn-primary btn-block"><b><i class="fab fa-instagram text-danger"></i> Follow</b></a>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <!-- Galeri -->
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title"><b>Galeri</b></h3>
                            </div>
                            <?php if (session()->get('level') == 1) : ?>
                                <div class="col text-right">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#upload_img">
                                        Upload
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($profil as $key => $value) : ?>
                                <div class="col-sm-3 text-center">
                                    <a href="" data-toggle="modal" data-target="#preview<?= $value['id_profile']; ?>">
                                        <img src="<?= base_url('img/profile/' . $value['gambar']) ?>" class="img-fluid mb-2" style="height: 150px;">
                                    </a>
                                    <?php if (session()->get('level') == 1) : ?>
                                        <br><a href="<?= base_url('profile/delete/' . $value['id_profile']) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Galeri -->
        </div>
    </div>


    <!-- Modal Upload -->
    <form action="<?= base_url('img/upload'); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="modal fade" id="upload_img" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-muted border-bottom-0 ">
                        <h5 class=" modal-title" id="staticBackdropLabel">Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="row text-center justify-content-center mb-4">
                            <div class="col-sm-6">
                                <img src="<?= base_url('img/profile/default.svg') ?>" width="60%" class="img-thumbnail img-preview">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : '' ?>" id="img-upload" name="gambar" onchange="previewImage()">
                                                <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar...</label>
                                                <div class="invalid-feedback"><?= $validation->getError('gambar'); ?></div>
                                            </div>
                                            <div class="col-sm-2 text-center">
                                                <button type="submit" class="btn btn-info"><i class="fas fa-upload"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php foreach ($profil as $key) : ?>
        <!-- Modal preview Gambar -->
        <div class="modal fade" id="preview<?= $key['id_profile']; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-muted border-bottom-0 ">
                    </div>
                    <div class="modal-body pt-0 text-center">
                        <img src="img/profile/<?= $key['gambar']; ?>" alt="" width="75%">
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
    <?php endforeach; ?>
</section>

<!-- pentup konten -->
<?= $this->endSection(); ?>
<!--  -->