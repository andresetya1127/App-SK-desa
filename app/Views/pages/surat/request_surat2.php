<!-- untuk menambahkan konten -->
<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<!--  -->

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->


        <div class="row">
            <div class="col-12 col-md-6 col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-warning">Pilih Format Surat Yang Diinginkan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Jenis Surat</th>
                                    <th style="width: 40px">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($jenis_surat as $key => $value) : ?>
                                    <tr>
                                        <td>
                                            <span><?= $no++; ?></span>
                                        </td>
                                        <td>
                                            <span>Sk. <?= $value['jenis_surat'] ?></span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal<?= $value['id_surat'] . $value['id_surat']; ?>">
                                                Request
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

            <div class="col-12 col-md-6 col-md-3">
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
                                    <th>Status</th>
                                    <th>Tanggal Request</th>
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
                                        <td>
                                            <h1 class="badge <?= $bg; ?>"><?= $value['status'] ?></h1>
                                        </td>
                                        <td><?= $value['tgl_masuk'] ?></td>
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



    <!-- Modal -->
    <?php foreach ($jenis_surat as $key) : ?>
        <form action="<?= base_url('request/save/') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="modal fade" id="modal<?= $key['id_surat'] . $key['id_surat']; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <?php $i = $key['id_surat'] ?>
                            <h4 class="modal-title">Konfirmasi Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <!-- <span aria-hidden="true">&times;</span>s -->
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="surat" value="<?= $key['id_surat'] ?>">
                            <div class="alert alert-info alert-dismissible">

                                <?php if ($key['jenis_surat'] == 'Kehilangan') : ?>
                                    <div class="form-group">
                                        <label>Barang Hilang?</label>
                                        <input type="text" name="ket" class="form-control" placeholder="Masukkan Barang Yang Hilang!" required>
                                    </div>
                                    <div class="form-group">
                                        <label>SK. Dipergunakan Untuk?</label>
                                        <input type="text" name="ket2" class="form-control" placeholder="Masukkan Keperluang Pembuatan SK." required>
                                    </div>
                                <?php endif; ?>

                                <?php if ($key['jenis_surat'] == 'Harga Tanah') : ?>
                                    <label for="ket">Harga Tanah Per Are</label>
                                    <input type="text" name="ket" id="rupiah" class="form-control" required placeholder="Masukkan Harga Tanah">
                                <?php endif; ?>

                                <?php if ($key['jenis_surat'] == 'Cerai Mati') : ?>
                                    <p>
                                    <h5>Konfirmasi</h5>
                                    </p>
                                <?php endif; ?>

                                <?php if ($key['jenis_surat'] == 'Nikah') : ?>
                                    <p>
                                    <h5>Request</h5>
                                    </p>
                                <?php endif; ?>

                                <?php if ($key['jenis_surat'] == 'Cerai') : ?>
                                    <label for="">Tahun Bercerai</label>
                                    <input name="ket" type="number" class="form-control" placeholder="Tahun Bercerai" required>
                                <?php endif; ?>

                                <?php if ($key['jenis_surat'] == 'Kepemilikan Rumah') : ?>
                                    <label for="">Luas Tanah (Are) </label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="ket" class="form-control" placeholder="Cnth: 30 (Are)" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">( Are )</span>
                                        </div>
                                    </div>
                                    <label for="" class="">Surat Bertujuan Untuk ? </label>
                                    <input name="ket2" type="text" class="form-control" placeholder="Cnth: Melengkapi Data ......" required>
                                <?php endif; ?>

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
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "processing": true
        });
    });
    $(document).ready(function() {
        $('#list').DataTable({
            "processing": true,
            "order": [
                [0, 'desc'],
                [1, 'desc']
            ]
        });
    });
</script>
<!-- pentup konten -->
<?= $this->endSection(); ?>
<!--  -->