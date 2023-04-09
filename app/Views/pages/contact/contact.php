<!-- untuk menambahkan konten -->
<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<!--  -->

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row mb-3 justify-content-end">
            <?php if (session()->get('level') == '1') : ?>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_contact">
                    <i class="fas fa-plus"></i> Tambah Contact
                </button>
            <?php endif; ?>
        </div>

        <div class="row">
            <?php foreach ($contact as $key => $value) : ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card d-flex flex-fill">
                        <div class="card-header border-bottom-0"><b><?= $value['name_contact']; ?></b></div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-user-cog"></i></span><b> Jabatan : </b><?= $value['jabatan']; ?></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><b> No.Hp : </b><?= $value['hp']; ?></li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="<?= base_url('img/user.png'); ?>" alt="user-avatar" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <?php if (session()->get('level') == '1') : ?>

                                <div class="text-right">

                                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#edit<?= $value['id_contact']; ?>">
                                        <i class="fas fa-user"></i> Edit
                                    </button>

                                    <a href="<?= base_url('contact/delete/' . $value['id_contact']); ?>" class="btn btn-sm bg-danger btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- modal tambah contact -->
    <div class="modal fade" id="add_contact" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-muted border-bottom-0 ">
                    <h5 class=" modal-title" id="staticBackdropLabel">Tambah Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('save/contact') ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body pt-0">
                        <div class="row">
                            <div class="col">
                                <!-- nama contact -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Cotact...">
                                </div>
                                <!--  -->

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" placeholder="Masukkan nama Jabatan...">

                                </div>
                            </div>

                            <div class="col">
                                <!-- no hp -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">No.Hp</label>
                                    <input type="text" name="hp" class="form-control" onkeypress="return number(event)" placeholder="Masukkan No.Hp...">
                                </div>
                                <!--  -->

                                <!-- Foto Profil -->
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Foto Profil</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="profil" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div> -->
                                <!--  -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  -->

    <?php foreach ($contact as $key) : ?>
        <!-- modal edit contact -->
        <div class="modal fade" id="edit<?= $key['id_contact']; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-muted border-bottom-0 ">
                        <h5 class=" modal-title" id="staticBackdropLabel">Edit Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('edit/contact/' . $key['id_contact']); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <div class="modal-body pt-0">
                            <div class="row">
                                <div class="col">
                                    <!-- nama contact -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Cotact..." value="<?= $key['name_contact']; ?>">
                                    </div>
                                    <!--  -->

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jabatan</label>
                                        <select name="jabatan" id="" class="form-control">
                                            <option selected hidden value="<?= $key['jabatan']; ?>"><?= $key['jabatan']; ?></option>
                                            <option value="jabatan">Jabatan</option>
                                            <option value="Kades">Jabatan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- no hp -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">No.Hp</label>
                                        <input type="text" name="hp" class="form-control" onkeypress="return number(event)" placeholder="Masukkan No.Hp..." value="<?= $key['hp']; ?>">
                                    </div>
                                    <!--  -->

                                    <!-- Foto Profil -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Foto Profil</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="profil" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-end">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!--  -->


</section>


<script>
    function number(evt) {
        var charNumber = (evt.which) ? evt.which : event.keyCode
        if (charNumber > 31 && (charNumber < 48 || charNumber > 57))
            return false;
        return true;
    }
</script>
<!-- pentup konten -->
<?= $this->endSection(); ?>
<!--  -->