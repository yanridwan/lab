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
                            <h1>Permintaan Sample</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/index') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Permintaan Sample</li>
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
                                                <th style="width: 6%;">No.</th>
                                                <th>Hari Tanggal</th>
                                                <th>Customer</th>
                                                <th>Status</th>
                                                <th>Permintaan Sample</th>
                                                <th style="width: 13%;">Hasil Akhir</th>
                                                <!-- <th>Foto</th> -->
                                                <th style="width: 32%;">Aksi</th>
                                                <!-- <th>CSS grade</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $a = 1;
                                            foreach ($formpermintaan as $fr) : ?>
                                                <tr>
                                                    <form class="form-horizontal" method="post" action="<?= site_url('permintaansample/finish') ?>">
                                                        <input type="hidden" name="id" value="<?= $fr->form_id ?>">
                                                        <td>
                                                            <p><?= $a++ ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?= date('D, d-m-Y', strtotime($fr->form_tanggal)) ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?= $fr->form_nama_customer ?></p>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <p style="padding-left:5px; padding-right:5px;border-radius: 10px;color:white; <?php if ($fr->status_id == "1") {
                                                                                                                                                echo "background-color: #17a2b8;";
                                                                                                                                            } elseif ($fr->status_id == "2") {
                                                                                                                                                echo "background-color: #ffc107;";
                                                                                                                                            } elseif ($fr->status_id == "3") {
                                                                                                                                                echo "background-color: #007bff;";
                                                                                                                                            } elseif ($fr->status_id == "4") {
                                                                                                                                                echo "background-color: #6c757d;";
                                                                                                                                            } elseif ($fr->status_id == "5") {
                                                                                                                                                echo "background-color: #28a745;";
                                                                                                                                            } elseif ($fr->status_id == "6") {
                                                                                                                                                echo "background-color: #dc3545;";
                                                                                                                                            } ?>"><?= $fr->status_nama ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?= $fr->form_permintaan_sample ?></p>
                                                        </td>
                                                        <td>
                                                            <!-- <input type="text" name="resi"> -->
                                                            <?php if ($this->session->userdata('level_id') != '2') { ?>
                                                                <?php if ($fr->form_hasil_akhir == "") { ?>
                                                                    <input type='text' class='form-control' name='hasil_akhir'>
                                                            <?php } else {
                                                                    echo $fr->form_hasil_akhir;
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="text-align: center; width: 30%">
                                                            <a href="<?= site_url('detail/halamandetail/' . $fr->form_id) ?>"><button type="button" class="btn bg-gradient-info" style="width: 83px;"><i class="fas fa-file-invoice"></i>Detail</button></a>
                                                            <?php if ($fr->form_hasil_akhir == "") { ?>
                                                                <button type="submit" class="btn bg-gradient-success" style="width: 83px;"><i class="fas fa-file-invoice"></i>Finish</button>
                                                                <?php if ($fr->status_id != "5") { ?>
                                                                    <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#hapus<?= $fr->form_id ?>" style="width: 89px;"><i class="fas fa-edit"></i>Hapus</button>
                                                                    <button type="button" class="btn bg-gradient-warning" data-toggle="modal" data-target="#revisi_data<?= $fr->form_id ?>" style="width: 83px;"><i class="fas fa-file-invoice"></i>Revisi</button>
                                                                    <!-- <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#finish_data<?= $fr->form_id ?>" style="width: 83px;"><i class="fas fa-file-invoice"></i>Finish</button> -->
                                                            <?php }
                                                            } ?>
                                                        </td>
                                                    </form>
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
                            <h4 class="modal-title text-center">FORM PERMINTAAN SAMPLE</h4>
                        </div>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= site_url('permintaansample/tambah') ?>">
                        <div class="modal-body">
                            <!-- form start -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Tanggal</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Tanggal" value="<?= date('D, d-m-Y') ?>" name="formTanggal" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nama Customer</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Nama Customer" name="formNamaCustomer" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Permintaan Sample</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Permintaan Sample" name="formPermintaanSample" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Penanggung Jawab</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Penanggung Jawab" name="formPenanggungJawab" required>
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


        <?php $no = 0;
        foreach ($formpermintaan as $fr) : $no++ ?>
            <div class="modal fade" id="revisi_data<?= $fr->form_id ?>">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-md-12">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title text-center">FORM PERMINTAAN SAMPLE</h4>
                            </div>
                        </div>
                        <form class="form-horizontal" method="post" action="<?= site_url('permintaansample/revisi') ?>">
                            <div class="card-body">
                                <input type="hidden" value="<?= $fr->form_id; ?>" name="id" class="form-control">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Tanggal</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Tanggal" value="<?= date('D, d-m-Y', strtotime($fr->form_tanggal)) ?>" name="formTanggal" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nama Customer</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Nama Customer" value="<?= $fr->form_nama_customer ?>" name="formNamaCustomer" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Permintaan Sample</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Permintaan Sample" value="<?= $fr->form_permintaan_sample ?>" name="formPermintaanSample" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Penanggung Jawab</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Penanggung Jawab" value="<?= $fr->form_penanggung_jawab ?>" name="formPenanggungJawab" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Status" value="<?= $fr->status_nama ?>" name="formStatus" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Komposisi</label>
                                            <select class="select2" multiple="multiple" data-placeholder="Select Barang" name="komposisi[]" style="width: 100%;" required>
                                                <?php foreach ($barang as $br) { ?>
                                                    <option value="<?= $br->barang_id ?>">(<?= $br->barang_kode ?>) <?= $br->barang_nama ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Warna</label>
                                            <input type="text" class="form-control" placeholder="Warna" value="<?= $fr->permintaan_warna ?>" name="warna" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Aroma</label>
                                            <input type="text" class="form-control" placeholder="Aroma" value="<?= $fr->permintaan_aroma ?>" name="aroma" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tekstur</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="tekstur" required><?= $fr->permintaan_tekstur ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Manfaat</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="manfaat" required><?= $fr->permintaan_manfaat ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Gramasi</label>
                                            <input type="text" class="form-control" placeholder="Gramasi" value="<?= $fr->permintaan_gramasi ?>" name="gramasi" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="keterangan" required><?= $fr->permintaan_keterangan ?></textarea>
                                        </div>
                                    </div>
                                </div>
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
        foreach ($formpermintaan as $data) : $no++ ?>
            <div class="modal fade" id="hapus<?= $data->form_id ?>">
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
                                <p>Apakah Anda Yakin Ingin Menghapus Data "<?= $data->form_nama_customer ?>" ?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="<?= site_url('detail/hapus/' . $data->form_id) ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php endforeach ?>
        <!-- /.modal -->


        <?php $no = 0;
        foreach ($formpermintaan as $a) : $no++ ?>
            <div class="modal fade" id="finish_data<?= $a->form_id ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Finish</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-horizontal" method="post" action="<?= site_url('permintaansample/finish') ?>">
                            <input type="hidden" value="<?= $a->form_id ?>" name="formId">
                            <input type="hidden" value="<?= date('CCYY-MM-DD hh:mm:ss') ?>" name="tanggal">
                            <div class="modal-body">
                                <p>Are You Sure Want to Finish ?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Finish</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php endforeach; ?>
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