<!-- untuk menambahkan konten -->
<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<!--  -->

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->

        <div class="row">
            <div class="col-12 col-md-6 col-md-3">
                <form action="<?= base_url('cek/kk') ?>" method="POST">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-warning"><b>NOTE :</b></h3><span>&nbsp;&nbsp;Masukkan Data Diri Anda!</span>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">No. NIK</label>
                                        <input type="text" name="nik" onkeypress="return number(event)" value="<?= old('nik'); ?>" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>" placeholder="Masukkan NIK...">
                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nik'); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>

                                <!-- No KK -->
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">No. KK</label>
                                        <input type="text" name="kk" onkeypress="return number(event)" value="<?= old('kk'); ?>" class="form-control <?= ($validation->hasError('kk')) ? 'is-invalid' : '' ?>" placeholder="Masukkan No.KK...">
                                        <!-- feedback -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kk'); ?>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Cek</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </form>

                <!-- Card list -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-warning"><b>NOTE :</b></h3><span>&nbsp;&nbsp;Jika Status <span class="badge bg-success">Selesai</span> Silahkan Ambil Surat Di Kantor Desa.</span>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="list" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>jenis Surat</th>
                                    <th>Token</th>
                                    <th>Tanggal Request</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($list_request as $key => $value) :
                                    $bg = '';
                                    if ($value['status'] == 'Verifikasi') {
                                        $bg = 'bg-warning';
                                    } elseif ($value['status'] == 'Proses') {
                                        $bg = 'bg-info';
                                    } elseif ($value['status'] == 'Selesai') {
                                        $bg = 'bg-success';
                                    } else {
                                        $bg = 'bg-danger';
                                    }
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['jenis_surat'] ?></td>
                                        <td><?= $value['token'] ?></td>
                                        <td><?= $value['tgl_masuk'] ?></td>
                                        <td>
                                            <h1 class="badge <?= $bg; ?>"><?= $value['status'] ?></h1>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!--  -->
            <?php if (session()->get('request') == true) : ?>
                <div class="col-12 col-md-6 col-md-3">
                    <div class="card">
                        <div class="card-header">

                            <?= $pager->links(); ?>
                            <div class="card-tools float-right">
                                <form action="" method="POST">
                                    <div class="input-group input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Pencarian...">
                                        <span class="input-group-append">
                                            <button type="submit" name="submit" class="btn btn-info btn-flat"><i class="fas fa-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <?php $no = 1 + (6 * ($page - 1));
                                foreach ($jenis_surat as $key => $value) : ?>
                                    <div class="col-sm-4 mb-3">
                                        <div class="position-relative p-3 bg-gray" style="height: 180px">
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon bg-info">
                                                    <?= $no++; ?>
                                                </div>
                                            </div>
                                            <br><br><br>
                                            Sk.<?= $value['jenis_surat']; ?>
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal<?= $value['id_surat'] . $value['id_surat']; ?>">
                                                    Request
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal -->
    <?php foreach ($jenis_surat as $key) : ?>
        <form action="<?= base_url('request/save') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="modal fade" id="modal<?= $key['id_surat'] . $key['id_surat']; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <!-- <span aria-hidden="true">&times;</span>s -->
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="surat" value="<?= $key['id_surat'] ?>">
                            <input type="hidden" name="card" value="<?= session()->get('id_kk') ?>">
                            <div class="alert alert-info alert-dismissible">

                                <div class="form-group">
                                    <label>No. Whatsapp</label>
                                    <input type="text" name="ket" class="form-control" placeholder="Masukkan No. Whatsapp!" required>
                                </div>
                                <div class="form-group">
                                    <label>SK. Dipergunakan Untuk?</label>
                                    <input type="text" name="tujuan" class="form-control" placeholder="Masukkan Keperluan Pembuatan SK." required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Request</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>
    <?php endforeach ?>
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