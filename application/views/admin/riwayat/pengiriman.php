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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pengiriman</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Barang</li>
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
                                    <h3 class="card-title">Tabel Barang</h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <!-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#tambah_data" style="width: 120px;"><i class="fa fa-plus-square" style="margin-right: 6px;"></i>Tambah Data</button> -->
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
                                                <!-- <th style="width: 15%;">Nama Merek</th> -->
                                                <th>Nama Customer</th>
                                                <th>Permintaan Sample</th>
                                                <th>Pengiriman</th>
                                                <th>Tanggal Pengiriman</th>
                                                <th>Resi</th>
                                                <th>Aksi</th>
                                                <!-- <th style="width: 30%;">Aksi</th> -->
                                                <!-- <th>CSS grade</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($pengirimanform as $a) : ?>
                                                <tr>
                                                    <form class="form-horizontal" method="post" action="<?= site_url('riwayat/tambahresi') ?>">
                                                        <input type="hidden" value="<?= $a->pengiriman_id ?>" name="pengirimanId">
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $a->form_nama_customer ?></td>
                                                        <td><?= $a->form_permintaan_sample ?></td>
                                                        <td><?php if ($a->revisi_id == "0") {
                                                                echo "Sampel";
                                                            } else {
                                                                echo "Revisi";
                                                            } ?></td>
                                                        <td><?= date('D, d-m-Y (H:i:s)', strtotime($a->pengiriman_tanggal)) ?></td>
                                                        <td>
                                                            <!-- <input type="text" name="resi"> -->
                                                            <?php if ($a->pengiriman_resi == "") { ?>
                                                                <input type='text' class='form-control' name='resi'>
                                                            <?php } else {
                                                                echo $a->pengiriman_resi;
                                                            } ?>
                                                        </td>
                                                        <td style="text-align:center">
                                                            <!-- <button type="submit">Submit</button> -->
                                                            <!-- <button type="submit">Coba</button> -->
                                                            <button type="submit" class="btn bg-gradient-primary" style="width: 95px;" <?php if ($a->pengiriman_resi == "") {
                                                                                                                                            echo "";
                                                                                                                                        } else {
                                                                                                                                            echo "disabled";
                                                                                                                                        } ?>><i class="fas fa-edit"></i>Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            <?php endforeach ?>
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
        })
    </script>
</body>

</html>