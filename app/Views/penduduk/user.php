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

                        <table id="user" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>No. Hp</th>
                                    <th>Level</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $key => $value) : ?>
                                    <?php if ($value['level'] == '1') : ?>
                                    <?php else : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <?= $value['username']; ?>
                                            </td>
                                            <td>
                                                <?= $value['hp']; ?>
                                            </td>
                                            <td>
                                                <?php if ($value['level'] == '2') echo 'User' ?>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal<?= $value['id_user'] ?>">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <a href="<?= base_url('del/' . $value['id_user']) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
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

    <?php foreach ($user as $key) : ?>
        <form action="<?= base_url('user/save/' . $key['id_user']); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="modal fade" id="modal<?= $key['id_user']; ?>" data-b="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <?php $i = $key['id_user'] ?>
                            <h4 class="modal-title">Edit Data User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <!-- <span aria-hidden="true">&times;</span>s -->
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="">Username</label>
                            <input type="text" class="form-control dis_user" name="username" value="<?= $key['username']; ?>">
                            <!-- feedback -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                            <!--  -->
                            <label for="">Password</label>
                            <input type="password" name="password<?= $key['id_user']; ?>" class="form-control inp-pass <?= ($validation->hasError('password' . $key['id_user'])) ? 'is-invalid' : '' ?>">
                            <!-- feedback -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('password' . $key['id_user']); ?>
                            </div>
                            <!--  -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Ubah</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
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
        var table = $('#user').DataTable({
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
                        columns: [0, 1, 2, 3]
                    }

                },
                {
                    extend: 'pdf',
                    oriented: 'potrait',
                    pageSize: 'legal',
                    title: 'Data Penduduk Desa lantan',
                    download: 'open',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excel',
                    autoFilter: true,
                    title: 'Data Penduduk Desa lantan',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },

            ],
            columnDefs: [{
                targets: [3],
                visible: false
            }]

        });

        table.buttons().container()
            .appendTo('#user_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- pentup konten -->
<?= $this->endSection(); ?>
<!--  -->