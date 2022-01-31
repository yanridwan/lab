<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/partials/head') ?>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <?php $this->load->view('admin/partials/preloader') ?>

        <!-- Navbar -->
        <?php $this->load->view('admin/partials/navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('admin/partials/sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php $this->load->view('admin/partials/header') ?>


            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">

                    <!-- <?php
                            $notif = $this->session->flashdata('notif');
                            if (!empty($notif)) {
                                if ($notif['status'] == 'success') {
                                    $class = 'success';
                                } else {
                                    $class = 'danger';
                                }
                            ?>
                        <div class="alert alert-<?= $class ?> alert-dismissible fade show" role="alert">
                            <?= $notif['msg'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?> -->

                    <?php
                    $notif = $this->session->flashdata('dup');
                    if (!empty($notif)) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $notif ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php }
                    ?>

                    <?php
                    $notif = $this->session->flashdata('suc');
                    if (!empty($notif)) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $notif ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php }
                    ?>

                    <?php
                    $notif = $this->session->flashdata('updt');
                    if (!empty($notif)) { ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?= $notif ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php }
                    ?>

                    <?php
                    $notif = $this->session->flashdata('del');
                    if (!empty($notif)) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $notif ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php }
                    ?>

                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tabel Barang</h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#tambah_data" style="width: 120px;"><i class="fa fa-plus-square" style="margin-right: 6px;"></i>Tambah Data</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th style="width: 6%;">No.</th>
                                                <th>Nama Barang</th>
                                                <th>Supplier</th>
                                                <th>Kode Barang</th>
                                                <th style="width: 20%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($barang as $data) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->barang_nama ?></td>
                                                    <td><?= $data->barang_supplier ?></td>
                                                    <td><?= $data->barang_kode ?></td>
                                                    <td style="text-align: center;">
                                                        <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#edit_data<?= $data->barang_id ?>" style="width: 83px;"><i class="fas fa-edit"></i>Edit</button>
                                                        <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#hapus_data<?= $data->barang_id ?>" style="width: 83px;"><i class="fas fa-trash-alt"></i>Hapus</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <!-- <tfoot>
                                            <tr style="text-align: center;">
                                                <th>No.</th>
                                                <th>Nama Barang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot> -->
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>


        <!-- /.modal -->
        <div class="modal fade" id="tambah_data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= site_url('Barang/tambah') ?>">
                        <div class="modal-body">
                            <!-- form start -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control" placeholder="Nama Barang" name="barangNama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier Barang</label>
                                            <input type="text" class="form-control" placeholder="Supplier Barang" name="supplierNama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Barang</label>
                                            <input type="text" class="form-control" placeholder="Kode Barang" name="barangKode" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <!-- /.modal -->
        <?php $no = 0;
        foreach ($barang as $br) : $no++ ?>
            <div class="modal fade" id="edit_data<?= $br->barang_id ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-horizontal" method="post" action="<?= site_url('Barang/ubah') ?>">
                            <div class="modal-body">
                                <!-- form start -->
                                <div class="card-body">
                                    <input type="hidden" value="<?= $br->barang_id ?>" name="barangID">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" id="namaBarang" placeholder="Nama Barang" name="barangNama" value="<?= $br->barang_nama ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Supplier Barang</label>
                                        <input type="text" class="form-control" placeholder="Supplier Barang" name="supplierNama" value="<?= $br->barang_supplier ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <input type="text" class="form-control" placeholder="Kode Barang" name="barangKode" value="<?= $br->barang_kode ?>" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php endforeach ?>
        <!-- /.modal -->



        <!-- /.modal -->
        <?php $no = 0;
        foreach ($barang as $data) : $no++ ?>
            <div class="modal fade" id="hapus_data<?= $data->barang_id ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Hapus Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <p>Apakah Anda Yakin Ingin Menghapus Data "<?= $data->barang_nama ?>" ?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="<?= site_url('barang/hapus/' . $data->barang_id) ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php endforeach ?>
        <!-- /.modal -->



        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <?php $this->load->view('admin/partials/footer') ?>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('admin/partials/js') ?>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv",
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'potrait',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    }, "colvis"
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#meja').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                "order": [
                    [0, 'asc']
                ],
                dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                        extend: 'copy',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        download: "open",
                        title: 'REKAP DATA PENGADUAN',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'potrait',
                        pageSize: 'LEGAL',
                        download: "open",
                        title: 'REKAP DATA PENGADUAN',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    },
                    {
                        extend: 'excel',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        download: "open",
                        title: 'REKAP DATA PENGADUAN',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    },

                    {
                        extend: 'print',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        download: "open",
                        title: 'REKAP DATA PENGADUAN',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    }
                ]
            });
            $('#perkara').keyup(function() {
                table.columns(2).search($(this).val()).draw();
            });
            $('#regu').keyup(function() {
                table.columns(8).search($(this).val()).draw();
            });
            // Event listener to the two range filtering inputs to redraw on input
            $('#from_date, #to_date').change(function() {
                table.draw();
            });
            table.on('order.dt search.dt', function() {
                table.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });
    </script>
</body>

</html>