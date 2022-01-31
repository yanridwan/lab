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
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tabel User</h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#tambah_data" style="width: 120px;"><i class="fa fa-plus-square" style="margin-right: 6px;"></i>Tambah User</button>
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
                                                <th>Nama User</th>
                                                <th>NIP</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th style="width: 20%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($userlevel as $data) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->user_nama ?></td>
                                                    <td><?= $data->user_nip ?></td>
                                                    <td><?= $data->user_email ?></td>
                                                    <td><?= $data->level_nama ?></td>
                                                    <td style="text-align: center;">
                                                        <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#edit_data<?= $data->user_id ?>" style="width: 83px;"><i class="fas fa-edit"></i>Edit</button>
                                                        <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#hapus_data<?= $data->user_id ?>" style="width: 83px;"><i class="fas fa-trash-alt"></i>Hapus</button>
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
                    <form class="form-horizontal" method="post" action="<?= site_url('User/tambah') ?>" enctype="multipart/form-data">
                        <div class="modal-body">
                            <!-- form start -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" placeholder="Nama User" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                                        </div>
                                        <div class="form-group">
                                            <label>No. Telepon</label>
                                            <input type="text" class="form-control" placeholder="Nomor Telepon" name="no_telp" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat, Tanggal Lahir</label>
                                            <input type="text" class="form-control" placeholder="Tempat, Tanggal Lahir" name="ttl" required>
                                        </div>
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="text" class="form-control" placeholder="NIP" name="nip" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Level</label>
                                            <select class="form-control select2" style="width: 100%;" name="level">
                                                <?php foreach ($level as $br) { ?>
                                                    <option value="<?= $br->level_id ?>"><?= $br->level_nama ?></option>
                                                <?php } ?>
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
        <!-- /.modal -->


        <!-- /.modal -->
        <?php $no = 0;
        foreach ($userlevel as $br) : $no++ ?>
            <div class="modal fade" id="edit_data<?= $br->user_id ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-horizontal" method="post" action="<?= site_url('user/ubah') ?>" enctype="multipart/form-data">
                            <div class="modal-body">
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" style="width: 200px;" src="<?php if (!empty($br->user_foto)) {
                                                                                                                            echo base_url('assets/img/' . $br->user_foto);
                                                                                                                        } else {
                                                                                                                            echo base_url('assets/img/default.jpg');
                                                                                                                        } ?>" alt="User profile picture">
                                    </div>
                                    <input type="hidden" value="<?= $br->user_id ?>" name="userID">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" placeholder="Nama User" name="nama" value="<?= $br->user_nama ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= $br->user_alamat ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <input type="text" class="form-control" placeholder="Nomor Telepon" name="no_telp" value="<?= $br->user_no_telp ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar" value="<?= $br->user_foto ?>">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $br->user_email ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat, Tanggal Lahir</label>
                                        <input type="text" class="form-control" placeholder="Tempat, Tanggal Lahir" name="ttl" value="<?= $br->user_tempat_tanggal_lahir ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" class="form-control" placeholder="NIP" name="nip" value="<?= $br->user_nip ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?= $br->user_password ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Level</label>
                                        <select class="form-control select2" style="width: 100%;" name="level" value="<?= $br->user_level_id ?>">
                                            <?php foreach ($level as $br) { ?>
                                                <option value="<?= $br->level_id ?>"><?= $br->level_nama ?></option>
                                            <?php } ?>
                                        </select>
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
        foreach ($userlevel as $data) : $no++ ?>
            <div class="modal fade" id="hapus_data<?= $data->user_id ?>">
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
                                <p>Apakah Anda Yakin Ingin Menghapus Data "<?= $data->user_nip ?>" ?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="<?= site_url('user/hapus/' . $data->user_id) ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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
                        orientation: 'landscape',
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
</body>

</html>