<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<!--  -->
<section class="content" style="display: block ; display: inline;">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-md-12 col-md-3">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row justify-content-end mb-4 mr-2">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_contact">
                                <i class="fas fa-plus"> Tanda Tangan</i>
                            </button>
                        </div>

                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>jenis Surat</th>
                                    <th>Nama</th>
                                    <th>Token</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($list_request as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['jenis_surat'] ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info">
                                                <?= $value['token'] ?>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal<?= $value['id_request'] ?>">
                                                Print
                                            </button>
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#text<?= $value['id_request'] ?>">
                                                Text
                                            </button>
                                            <?php if ($value['id_contact'] == true) : ?>
                                                <a href="<?= base_url('done/' . $value['id_request']) ?>" class="btn btn-sm btn-success btn-done">Selesai</a>
                                            <?php endif; ?>
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

        <!-- /.row -->

    </div>
    <!--/. container-fluid -->

    <!-- Cetak Request -->
    <?php foreach ($list_request as $key) : ?>
        <form action="<?= base_url('surat/ttd/' . $key['id_request']) ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="modal fade" id="modal<?= $key['id_request'] ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b><?= $key['token'] . date('hms') ?></b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning alert-dismissible" style="color: black;">
                                <div class="row">
                                    <div class="col-4">
                                        <b>Nama</b>
                                    </div>
                                    <div class="col">
                                        <b>: <?= $key['nama'] ?></b>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <b>NIK</b>
                                    </div>
                                    <div class="col">
                                        <b>: <?= $key['nik'] ?></b>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <b>Alamat</b>
                                    </div>
                                    <div class="col">
                                        <b>: <?= $key['alamat'] ?></b>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <b>Tanggal Req</b>
                                    </div>
                                    <div class="col">
                                        <b>: <?= $key['tgl_masuk'] ?></b>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <b>Jam Req</b>
                                    </div>
                                    <div class="col">
                                        <b>: <?= $key['jam_masuk'] ?></b>
                                    </div>
                                </div>
                            </div>

                            <label>Tanda Tangan</label>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group" data-select2-id="29">
                                        <select class="js-example-basic-single form-control select2bs4 select2-hidden-accessible" name="ttd" style="width: 100%;">
                                            <option selected hidden value="<?= $key['id_contact'] ?>"><?= ($key['name_contact']) ? $key['name_contact'] : '-Pilih Tanda Tangan-' ?></option>
                                            <?php foreach ($contact as $k => $c) : ?>
                                                <option value="<?= $c['id_contact']; ?>"><?= $c['name_contact']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- feedback -->
                            <div class="invalid-feedback b-2 flash-error" data-flashdata="<?= session()->getFlashdata('invalid' . $key['id_request']); ?>">
                                <?= session()->getFlashdata('invalid' . $key['id_request']) ?>
                            </div>
                            <!--  -->
                            <div class="modal-footer justify-content-end">
                                <button type="button" class="btn btn-danger btn-sm text-left" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                <!-- cek ttd -->
                                <?php if ($key['id_contact'] == true) : ?>
                                    <a href="<?= base_url('pdf/' . $key['id_request']) ?>" class="btn btn-sm btn-secondary" target="_blank">Print</a>
                                <?php endif; ?>
                                <!--  -->
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
            <!-- /.modal -->
        </form>
    <?php endforeach ?>
    <!--  -->

    <!-- Text Surat -->
    <?php foreach ($list_request as $key) : ?>
        <form action="<?= base_url('text/' . $key['id_request']) ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="modal fade" id="text<?= $key['id_request'] ?>">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            Sk.<?= $key['jenis_surat'] ?>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="callout callout-info">
                                        <h5>No. Whatsapp</h5>

                                        <p class="justify"><?= $key['ket']; ?></p>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="callout callout-info">
                                        <h5>Surat Bertujuan </h5>

                                        <p class="justify"><?= $key['tujuan']; ?>.</p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="">Paragraf 1</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." style="height: 146px;" name="text1"><?= $key['txt1']; ?></textarea>
                                </div>
                                <div class="col">
                                    <label for="">Paragraf 2</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." style="height: 146px;" name="text2"><?= $key['txt2']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-end">
                            <button type="button" class="btn btn-danger btn-sm text-left" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>
    <?php endforeach ?>


    <!-- ttd -->
    <!-- modal tambah contact -->
    <div class="modal fade" id="add_contact" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-muted border-bottom-0 ">
                    <h5 class=" modal-title" id="staticBackdropLabel">Tambah Tanda tangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('save/ttd') ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body pt-0">
                        <div class="row">
                            <div class="col">
                                <!-- nama contact -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" placeholder="Masukkan nama Cotact..." value="<?= old('nama') ?>">
                                    <!-- feedback -->
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                    <!--  -->
                                </div>
                                <!--  -->

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : '' ?>" placeholder="Masukkan nama Jabatan..." value="<?= old('jabatan') ?>">
                                    <!-- feedback -->
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('jabatan'); ?>
                                    </div>
                                    <!--  -->
                                </div>
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
<script src="<?= base_url() ?>/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

    })
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!-- pentup konten -->
<?= $this->endSection(); ?>
<!--  -->