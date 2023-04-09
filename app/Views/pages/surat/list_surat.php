<!-- untuk menambahkan konten -->
<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<!--  -->

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-md-12 col-md-3">
                <div class="card">
                    <div class="card-header"></div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="list" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>jenis Surat</th>
                                    <th>Nama</th>
                                    <th>Tanggal Request</th>
                                    <th>Jam Request</th>
                                    <th>Token</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($list_request as $key => $value) : ?>
                                    <tr>
                                        <td><?= $value['jenis_surat'] ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['tgl_masuk'] ?></td>
                                        <td><?= $value['jam_masuk'] ?></td>
                                        <td>
                                            <h4 class="btn btn-warning btn-sm"><?= $value['token'] ?></h4>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-success btn-accept" href="<?= base_url('surat/accept/' . $value['id_request']) ?>">Terima</a>
                                            <a class="btn btn-sm btn-danger btn-denied" href="<?= base_url('surat/rejected/' . $value['id_request']) ?>">Tolak</a>
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
        $('#list').DataTable({
            "order": [
                [2, 'desc']
            ]
        });
    });
</script>
<!-- pentup konten -->
<?= $this->endSection(); ?>
<!--  -->