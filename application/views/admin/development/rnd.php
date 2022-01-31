<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/partials/head') ?>
    <style>
        pre {
            font-family: Source Sans Pro, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
        }
    </style>
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
            <section class="content-header">
                <div class="container-fluid">

                    <?php
                    $notif = $this->session->flashdata('done');
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

                    <?php
                    $notif = $this->session->flashdata('rev');
                    if (!empty($notif)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $notif ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php }
                    ?>


                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Formulasi Sample</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/index') ?>">Home</a></li>
                                <li class="breadcrumb-item">Development</li>
                                <li class="breadcrumb-item active">RND</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tabel Permintaan Sample</h3>
                                    <?php
                                    if ($this->session->userdata('level_id') != '2') { ?>
                                        <div class="card-tools">
                                            <ul class="nav nav-pills ml-auto">
                                                <li class="nav-item">
                                                    <!-- <a href="<?= site_url('importbarang') ?>"><button type="button" class="btn btn-default btn-sm" style="width: 120px;"><i class="fa fa-plus-square" style="margin-right: 6px;"></i>Tambah Data</button></a> -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_data" style="width: 120px;"><i class="fa fa-plus-square" style="margin-right: 6px;"></i>Tambah Data</button>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>No</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Jenis Sample</th>
                                                <th>Developer</th>
                                                <th style="width: 6%;">ID</th>
                                                <th>Status</th>
                                                <!-- <th style="width: 13%;">Hasil Akhir</th> -->
                                                <!-- <th>Foto</th> -->
                                                <th style="width: 20%;">Aksi</th>
                                                <!-- <th>CSS grade</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $aaa = 1;
                                            foreach ($dev as $data) : ?>
                                                <tr>
                                                    <td><?= $aaa++ ?></td>
                                                    <td><?= date('D, d-m-Y | H:i:s', strtotime($data->development_tanggal_masuk)) ?></td>
                                                    <td><?= $data->development_jenis_sample ?></td>
                                                    <td><?= $data->development_developer ?></td>
                                                    <td><?= $data->development_id ?></td>
                                                    <td style="text-align: center;">
                                                        <p style="padding-left:5px; padding-right:5px;border-radius: 10px;color:white; <?php if ($data->status_id == "1") {
                                                                                                                                            echo "background-color: #17a2b8;";
                                                                                                                                        } elseif ($data->status_id == "2") {
                                                                                                                                            echo "background-color: #ffc107;";
                                                                                                                                        } elseif ($data->status_id == "3") {
                                                                                                                                            echo "background-color: #007bff;";
                                                                                                                                        } elseif ($data->status_id == "4") {
                                                                                                                                            echo "background-color: #6c757d;";
                                                                                                                                        } elseif ($data->status_id == "5") {
                                                                                                                                            echo "background-color: #28a745;";
                                                                                                                                        } elseif ($data->status_id == "6") {
                                                                                                                                            echo "background-color: #dc3545;";
                                                                                                                                        } elseif ($data->status_id == "7") {
                                                                                                                                            echo "background-color: #dc3545;";
                                                                                                                                        } elseif ($data->status_id == "8") {
                                                                                                                                            echo "background-color: #28a745;";
                                                                                                                                        } elseif ($data->status_id == "9") {
                                                                                                                                            echo "background-color: #dc3545;";
                                                                                                                                        } ?>"><?= $data->status_nama ?></p>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a href="<?= site_url('development/detailrnd/' . $data->development_id) ?>"><button type="button" class="btn bg-gradient-info" style="width: 83px;"><i class="fas fa-file-invoice"></i>Detail</button></a>
                                                        <!-- <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#edit_data<?= $data->development_id ?>" style="width: 83px;"><i class="fas fa-edit"></i>Edit</button> -->
                                                        <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#hapus_data<?= $data->development_id ?>" style="width: 83px;"><i class="fas fa-trash-alt"></i>Hapus</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
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


        <div class="modal fade" id="tambah_data">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-12">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title text-center">FORM DEVELOPMENT</h4>
                        </div>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= site_url('development/tambah') ?>" enctype="multipart/form-data">
                        <div class="modal-body">
                            <!-- form start -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Tanggal</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Tanggal" value="<?= date('D, d-m-Y') ?>" name="tanggal" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Jenis Sample</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Permintaan Sample" name="jenisSample" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Developer</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Penanggung Jawab" name="developer" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Status" name="status" value="Received" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <!-- <div class="form-group">
                            <label>Komposisi</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="komposisi" required></textarea>
                        </div> -->
                                        <div class="form-group">
                                            <label>Komposisi</label>
                                            <select class="form-control select2" multiple="multiple" data-placeholder="Select Barang" name="komposisi[]" style="width: 100%;">
                                                <?php foreach ($barang as $br) { ?>
                                                    <option value="<?= $br->barang_id ?>">(<?= $br->barang_kode ?>) <?= $br->barang_nama ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Warna</label>
                                            <input type="text" class="form-control" placeholder="Warna" name="warna" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Aroma</label>
                                            <input type="text" class="form-control" placeholder="Aroma" name="aroma" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tekstur</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="tekstur" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="dokumen">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Manfaat</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="manfaat" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Gramasi</label>
                                            <input type="text" class="form-control" placeholder="Gramasi" name="gramasi" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Metodologi</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="metodologi" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="keterangan" required></textarea>
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
        foreach ($dev as $data) : $no++ ?>
            <div class="modal fade" id="hapus_data<?= $data->development_id ?>">
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
                                <p>Apakah Anda Yakin Ingin Menghapus Data "<?= $data->development_jenis_sample ?>" ?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="<?= site_url('development/hapus/' . $data->development_id) ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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

    <!-- bs-custom-file-input -->
    <script src="<?= base_url('assets/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <?php $this->load->view('admin/partials/js') ?>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
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