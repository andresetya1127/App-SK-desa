<!-- untuk menambahkan konten -->
<?= $this->extend('template/template'); ?>
<?= $this->section('print'); ?>
<!--  -->

<link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css">

<!-- pentup konten -->
<?= $this->endSection(); ?>
<!--  -->



<!-- untuk menambahkan konten -->
<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<!--  -->

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="flash-err" data-flashdata="<?= $validation->getError('password'); ?>"></div>
        <div class="row">
            <div class="col-12 col-md-12 col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-warning">Daftar User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body card-body table-responsive">
                        <div class="row mb-3 mr-1">
                            <div class="col text-right">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAdd">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <table id="example" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>KK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Agama</th>
                                    <th>Status Pernikahan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?= $value['nama']; ?>
                                        </td>
                                        <td>
                                            <?= $value['nik']; ?>
                                        </td>
                                        <td>
                                            <?= $value['kk']; ?>
                                        </td>
                                        <td>
                                            <?= $value['jk']; ?>
                                        </td>
                                        <td>
                                            <?= $value['alamat']; ?>
                                        </td>
                                        <td>
                                            <?= $value['pendidikan']; ?>
                                        </td>
                                        <td>
                                            <?= $value['agama']; ?>
                                        </td>
                                        <td>
                                            <?= $value['status_kawin']; ?>
                                        </td>

                                        <td class="text-center">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#static_edit<?= md5($value['id']); ?>">
                                                <if class="fas fa-user"></if> Edit
                                            </button>

                                            <a href="<?= base_url('penduduk/' . $value['id']); ?>" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i> Hapus</a>

                                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#static<?= md5($value['id']); ?>">
                                                <i class="fas fa-info"></i> Detail
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.row -->
    <!--/. container-fluid -->

    <!-- modal tambah -->
    <form action="<?= base_url('penduduk/add_kk') ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="modal fade" id="modalAdd">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Penduduk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span>s -->
                        </button>
                    </div>
                    <div class="modal-body">
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
                        </div>

                        <div class="row">
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

                        </div>

                        <div class="row">
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

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- /.modal -->
    </form>



    <!-- modal detail -->
    <?php foreach ($user as $key) : ?>
        <div class="modal fade" id="static<?= MD5($key['id']); ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-muted border-bottom-0 ">
                        <h5 class=" modal-title" id="staticBackdropLabel">Detail Penduduk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="row">
                            <div class="col">
                                <h2 class="lead"><b><?= $key['nama']; ?></b></h2>
                                <p class="text-muted text-sm"><b>NIK: </b> <?= $key['nik']; ?> </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class=""><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><b> Alamat : </b><?= $key['alamat'] ?></li>
                                    <li class=""><span class="fa-li"><i class="fas fa-birthday-cake"></i></span><b> TTL : </b><?= $key['tmp_lahir'] . ', ' . $key['tgl_lahir'] ?></li>
                                    <li class=""><span class="fa-li"><i class="fas fa-mars"></i></span><b> Jenis Kelamin : </b><?= $key['jk']; ?></li>
                                    <li class=""><span class="fa-li"><i class="fas fa-pray"></i></span><b> Agama : </b><?= $key['agama']; ?></li>
                                    <li class=""><span class="fa-li"><i class="fas fa-graduation-cap"></i></span><b> Pendidikan : </b><?= $key['pendidikan']; ?></li>
                                    <li class=""><span class="fa-li"><i class="fas fa-ring"></i></span><b> Status Perkawinan : </b><?= $key['status_kawin']; ?></li>
                                </ul>
                            </div>
                            <div class="col-4 text-center mt-3">
                                <img src="<?= base_url('img/user.png'); ?>" alt="user-avatar" class="img-circle img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-right">

                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <!-- modal edit kk -->
    <?php foreach ($user as $key) : ?>
        <form action="<?= base_url('edit/kk/' . $key['id']) ?>" method="POST">
            <div class="modal fade" id="static_edit<?= MD5($key['id']); ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header text-muted border-bottom-0 ">
                            <h5 class=" modal-title" id="staticBackdropLabel">Edit Data Penduduk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pt-0">
                            <div class="row">
                                <!-- nama -->
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input value="<?= (old('nama' . $key['id'])) ? old('nama' . $key['id']) : $key['nama'] ?>" type="text" name="nama<?= $key['id']; ?>" class="form-control <?= ($validation->hasError('nama' . $key['id'])) ? 'is-invalid' : '' ?>" placeholder="Nama Lengkap">
                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- nama -->
                                    <div class="form-group">
                                        <label for="">No. KK</label>
                                        <input type="number" value="<?= $key['kk']; ?>" name="kk<?= $key['id']; ?>" class="form-control <?= ($validation->hasError('kk' . $key['id'])) ? 'is-invalid' : '' ?>" placeholder="No.kk">

                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kk' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- username -->
                                    <div class="form-group">
                                        <label for="">No. Nik</label>
                                        <input type="number" value="<?= $key['nik']; ?>" name="nik<?= $key['id']; ?>" class="form-control <?= ($validation->hasError('nik' . $key['id'])) ? 'is-invalid' : '' ?>" placeholder="No. Nik">
                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nik' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- pekerjaan -->
                                <div class="col">
                                    <!-- username -->
                                    <div class="form-group">
                                        <label for="">Pekerjaan</label>
                                        <input type="text" value="<?= $key['pekerjaan']; ?>" name="pekerjaan<?= $key['id']; ?>" class="form-control <?= ($validation->hasError('pekerjaan' . $key['id'])) ? 'is-invalid' : '' ?>" placeholder="Pekerjaan">

                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pekerjaan' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>

                                <!-- pendidikan -->
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Pendidikan</label>
                                        <select name="pendidikan<?= $key['id']; ?>" class="custom-select rounded-0 <?= ($validation->hasError('pendidikan' . $key['id'])) ? 'is-invalid' : '' ?>" id="exampleSelectRounded0">
                                            <option selected hidden value="<?= $key['pendidikan']; ?>"><?= $key['pendidikan']; ?></option>
                                            <?php foreach ($pendidikan as $k) : ?>
                                                <option value="<?= $k ?>"><?= $k ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pendidikan' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- Jenis Kelamin -->
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="jk<?= $key['id']; ?>" class="custom-select rounded-0 <?= ($validation->hasError('jk' . $key['id'])) ? 'is-invalid' : '' ?>" id="exampleSelectRounded0">
                                            <option selected hidden value="<?= $key['jk']; ?>"><?= $key['jk']; ?></option>
                                            <?php foreach ($jk as $j) : ?>
                                                <option value="<?= $j ?>"><?= $j ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jk' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- password -->
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" value="<?= $key['tgl_lahir']; ?>" name="tgl_lahir<?= $key['id']; ?>" class="form-control <?= ($validation->hasError('tgl_lahir' . $key['id'])) ? 'is-invalid' : '' ?>" placeholder="Tanggal Lahir">

                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_lahir' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                    <!-- agama -->
                                    <div class="form-group">
                                        <label for="">Agama</label>
                                        <select name="agama<?= $key['id']; ?>" class="custom-select rounded-0 <?= ($validation->hasError('agama' . $key['id'])) ? 'is-invalid' : '' ?>" id="exampleSelectRounded0">
                                            <option selected hidden value="<?= $key['agama']; ?>"><?= $key['agama']; ?></option>
                                            <?php foreach ($agama as $a) : ?>
                                                <option value="<?= $a ?>"><?= $a ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('agama' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- status -->
                                    <div class="form-group">
                                        <label for="">Status Perkawinan</label>
                                        <select name="status_kawin<?= $key['id']; ?>" class="custom-select rounded-0 <?= ($validation->hasError('status_kawin' . $key['id'])) ? 'is-invalid' : '' ?>" id="exampleSelectRounded0">
                                            <option selected hidden value="<?= $key['status_kawin']; ?>"><?= $key['status_kawin']; ?></option>
                                            <?php foreach ($status as $stat) : ?>
                                                <option value="<?= $stat ?>"><?= $stat ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('status_kawin' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nama Ayah</label>
                                        <input value="<?= $key['nm_ayah']; ?>" type="text" name="nm_ayah<?= $key['id']; ?>" class="form-control <?= ($validation->hasError('nm_ayah' . $key['id'])) ? 'is-invalid' : '' ?>" placeholder="Nama ayah">

                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nm_ayah' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Konfirmasi Password -->
                                    <div class="form-group">
                                        <label for="">Nama Ibu</label>
                                        <input type="text" value="<?= $key['nm_ibu']; ?>" name="nm_ibu<?= $key['id']; ?>" class="form-control <?= ($validation->hasError('nm_ibu' . $key['id'])) ? 'is-invalid' : '' ?>" placeholder="Nama ibu">

                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nm_ibu' . $key['id']); ?>
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
                                        <textarea name="tmp_lahir<?= $key['id']; ?>" class="form-control <?= ($validation->hasError('tmp_lahir' . $key['id'])) ? 'is-invalid' : '' ?>" placeholder="Tempat Lahir"><?= $key['tmp_lahir']; ?></textarea>

                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tmp_lahir' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- username -->
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea name="alamat<?= $key['id']; ?>" class="form-control <?= ($validation->hasError('alamat' . $key['id'])) ? 'is-invalid' : '' ?>" placeholder="Alamat"><?= $key['alamat']; ?></textarea>

                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat' . $key['id']); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-end">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endforeach; ?>

</section>

<!-- pentup konten -->
<?= $this->endSection(); ?>
<!--  -->



<!-- untuk menambahkan konten -->
<?= $this->extend('template/template'); ?>
<?= $this->section('dataTable'); ?>
<!--  -->
<!-- DataTbles Js -->
<script src="<?= base_url() ?>/js/jquery-3.5.1.js"></script>
<script src="<?= base_url() ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>/js/button/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/js/button/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>/js/button/jszip.min.js"></script>
<script src="<?= base_url() ?>/js/button/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/js/button/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/js/button/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/js/button/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/js/button/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            'processing': true,
            responsive: true,
            // paging: false,
            lengthChange: false,
            // 'serverSide': true,
            buttons: [
                'copy',
                {
                    extend: 'print',
                    oriented: 'potrait',
                    pageSize: 'legal',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }

                },
                {
                    extend: 'pdf',
                    oriented: 'potrait',
                    pageSize: 'legal',
                    title: 'Data Penduduk Desa lantan',
                    download: 'open',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'excel',
                    autoFilter: true,
                    title: 'Data Penduduk Desa lantan',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },

            ],
            columnDefs: [{
                targets: [3, 4, 6, 7, 8],
                visible: false
            }]


        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- pentup konten -->
<?= $this->endSection(); ?>
<!--  -->