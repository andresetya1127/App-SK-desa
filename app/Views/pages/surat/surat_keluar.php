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
                    <div class="card-header">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>jenis Surat</th>
                                    <th>Nama</th>
                                    <th>Tanggal Request</th>
                                    <th>Jam Request</th>
                                    <th>Jam Keluar</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Token</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($list_request as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['jenis_surat'] ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['tgl_masuk'] ?></td>
                                        <td><?= $value['jam_masuk'] ?></td>
                                        <td><?= $value['jam_keluar'] ?></td>
                                        <td><?= $value['tgl_keluar'] ?></td>
                                        <td>
                                            <h4 class="btn btn-warning btn-sm"><?= $value['token'] ?></h4>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('pdf/' . $value['id_request']) ?>" class="btn btn-sm btn-secondary" target="_blank">Dokumen</a></i>
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
            buttons: [{
                    extend: 'print',
                    oriented: 'potrait',
                    pageSize: 'legal',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }

                },
                {
                    extend: 'pdf',
                    oriented: 'potrait',
                    pageSize: 'legal',
                    title: 'Data Penduduk Desa lantan',
                    download: 'open',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'excel',
                    autoFilter: true,
                    title: 'Data Penduduk Desa lantan',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },

            ],
            columnDefs: [{
                targets: [6],
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