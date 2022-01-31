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
                                        <?php if ($this->session->userdata('level_id') != '3') { ?>
                                            <ul class="nav nav-pills ml-auto">
                                                <li class="nav-item">
                                                    <!-- <a href="<?= site_url('importbarang') ?>"><button type="button" class="btn btn-default btn-sm" style="width: 120px;"><i class="fa fa-plus-square" style="margin-right: 6px;"></i>Tambah Data</button></a> -->
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#tambah_data" style="width: 120px;"><i class="fa fa-plus-square" style="margin-right: 6px;"></i>Tambah Data</button>
                                                </li>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th style="width: 6%;">No.</th>
                                                <th>Nama Barang</th>
                                                <th>Kode Barang</th>
                                                <th style="width: 8%;">Qty</th>
                                                <th>Satuan</th>
                                                <?php if ($this->session->userdata('level_id') != '2') { ?>
                                                    <?php if ($this->session->userdata('level_id') != '3') { ?>
                                                        <th style="width: 20%;">Aksi</th>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($gudangbarang as $data) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->barang_nama ?></td>
                                                    <td><?= $data->barang_kode ?></td>
                                                    <td style="color:white; text-align:right; <?php if ($data->gudang_qty <= 10) {
                                                                                                    echo "background-color: #dc3545;";
                                                                                                } elseif ($data->gudang_qty >= 10) {
                                                                                                    echo "background-color: #17a2b8;";
                                                                                                } ?>"><?= number_format($data->gudang_qty, 0, ',', '.') ?></td>
                                                    <td><?= $data->gudang_satuan ?></td>
                                                    <?php if ($this->session->userdata('level_id') != '2') { ?>
                                                        <?php if ($this->session->userdata('level_id') != '3') { ?>
                                                            <td style="text-align: center;">
                                                                <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#edit_data<?= $data->gudang_id ?>" style="width: 83px;"><i class="fas fa-edit"></i>Edit</button>
                                                                <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#hapus_data<?= $data->gudang_id ?>" style="width: 83px;"><i class="fas fa-trash-alt"></i>Hapus</button>
                                                            </td>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <!-- <tfoot>
                                            <tr style="text-align: center;">
                                                <th>No.</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Satuan</th>
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
                    <form class="form-horizontal" method="post" action="<?= site_url('gudang/tambah') ?>">
                        <div class="modal-body">
                            <!-- form start -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Barang</label>
                                            <select class="form-control select2" style="width: 100%;" name="barangID">
                                                <?php foreach ($barang as $br) { ?>
                                                    <option value="<?= $br->barang_id ?>">(<?= $br->barang_kode ?>) <?= $br->barang_nama ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Qty</label>
                                            <input type="number" class="form-control" id="qtyGudang" placeholder="Qty Gudang" name="gudangQty" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Satuan</label>
                                            <select class="form-control select2" style="width: 100%;" name="gudangSatuan">
                                                <option value="gram">gram</option>
                                                <option value="ml">ml</option>
                                                <option value="pcs">pcs</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tanggal</label>
                                            <input type="text" class="form-control" id="tanggalGudang" placeholder="Tanggal Gudang" name="gudangTanggal" value="<?= date('D, d-m-Y') ?>" readonly>
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
        foreach ($gudangbarang as $br) : $no++ ?>
            <div class="modal fade" id="edit_data<?= $br->gudang_id ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-horizontal" method="post" action="<?= site_url('gudang/ubah') ?>">
                            <div class="modal-body">
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" value="<?= $br->gudang_id ?>" name="barangID">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Barang</label>
                                                <input type="text" class="form-control" id="namaBarang" placeholder="Nama Barang" name="barangID" value="<?= $br->barang_nama ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Qty</label>
                                                <input type="number" class="form-control" id="qtyGudang" placeholder="Qty Gudang" name="gudangQty" value="<?= number_format($br->gudang_qty, 0, ',', '.') ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Satuan</label>
                                                <select class="form-control select2" style="width: 100%;" name="gudangSatuan">
                                                    <option value="gram">gram</option>
                                                    <option value="ml">ml</option>
                                                    <option value="pcs">pcs</option>
                                                </select>
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
        <?php endforeach ?>
        <!-- /.modal -->



        <!-- /.modal -->
        <?php $no = 0;
        foreach ($gudangbarang as $data) : $no++ ?>
            <div class="modal fade" id="hapus_data<?= $data->gudang_id ?>">
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
                                <a href="<?= site_url('gudang/hapus/' . $data->gudang_id) ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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
            $('.select2').select2({
                theme: 'bootstrap4'
            })
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
</body>

</html>