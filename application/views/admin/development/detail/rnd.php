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
            padding-bottom: 0px;
            padding-top: 0px;
            /* display: table-row; */
            /* text-align: center; */
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
            <?php $this->load->view('admin/partials/header') ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <!-- <h3 class="card-title">Tabel Barang</h3> -->
                                    <a href="<?= site_url('development/rnd') ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" style="margin-right: 6px;"></i>Kembali</button></a>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a href="<?= site_url('development/cetak/' . $dev->development_id) ?>"><button type=" button" class="btn btn-success btn-sm" style="width: 120px;"><i class="fa fa-plus-square" style="margin-right: 6px;"></i>Cetak</button></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- <input type="hidden" value="" name="barangID"> -->

                                                <div class="form-group row">
                                                    <label class="col-sm-4">ID Project</label>
                                                    <div class="col-sm-8">
                                                        : <?= $dev->development_id ?>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4">Status</label>
                                                    <div class="col-sm-8">
                                                        : <?= $dev->status_nama ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4">Tanggal</label>
                                                    <div class="col-sm-8">
                                                        : <?= date('D, d-m-Y', strtotime($dev->development_tanggal_masuk)) ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4">Developer</label>
                                                    <div class="col-sm-8">
                                                        : <?= $dev->development_developer ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4">Jenis Sample</label>
                                                    <div class="col-sm-8">
                                                        : <?= $dev->development_jenis_sample ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4">Attachment</label>
                                                    <div class="col-sm-8">
                                                        : <?= $dev->development_dokumen ?> <?php if ($dev->development_dokumen == "") { ?>
                                                            -----
                                                        <?php } else { ?><a href="<?= base_url('assets/development/' . $dev->development_dokumen) ?>">View</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive p-0" style="height: 200px;">
                                            <table class="table table-head-fixed text-nowrap table-striped">
                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <!-- <th style="width: 6%;">No.</th> -->
                                                        <th style="width: 15%;">Komposisi</th>
                                                        <th>Warna</th>
                                                        <th>Aroma</th>
                                                        <th style="width: 15%;">Tekstur</th>
                                                        <th style="width: 15%;">Manfaat</th>
                                                        <th>Gramasi</th>
                                                        <th>Metodologi</th>
                                                        <th style="width: 15%;">Keterangan</th>
                                                        <!-- <th>Status</th> -->
                                                        <th>Aksi</th>
                                                        <!-- <th>Foto</th> -->
                                                        <!-- <th style="width: 20%;">Aksi</th> -->
                                                        <!-- <th>CSS grade</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php $no = 1;
                                                            if (!empty($komposisi)) foreach ($komposisi as $q) :
                                                            ?>
                                                                <pre style="display:table-row">[<?= $q->barang_kode ?>] <?= $q->barang_nama ?> (<?= $q->development_komposisi_qty ?> <?= $q->development_komposisi_satuan ?>)</pre>
                                                            <?php endforeach ?>
                                                        </td>
                                                        <td>
                                                            <pre><?= $dev->development_warna ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $dev->development_aroma ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $dev->development_tekstur ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $dev->development_manfaat ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $dev->development_gramasi ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $dev->development_metodologi ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $dev->development_keterangan ?></pre>
                                                        </td>
                                                        <!-- <td>
                                                            <pre><?= $dev->status_nama ?></pre>
                                                        </td> -->
                                                        <td>
                                                            <?php if ($dev->status_id == "1") { ?>
                                                                <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#process" style="width: 83px;">Process</button>
                                                            <?php } elseif ($dev->status_id == '2') { ?>
                                                                <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#failed" style="width: 83px;">Failed</button>
                                                                <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#finish" style="width: 83px;">Success</button>
                                                            <?php } elseif ($dev->status_id == '3') { ?>
                                                                <form action="<?= site_url('detail/pengiriman/') ?>" method="POST">
                                                                    <input type="hidden" name="id" value="<?= $dev->development_id ?>">
                                                                    <button type="submit" class="btn bg-gradient-success" style="width: 83px;">Send</button>
                                                                </form>
                                                            <?php } elseif ($dev->status_id == '4') { ?>
                                                                <button type="button" class="btn bg-gradient-success" style="width: 83px;" disabled>Sent</button>
                                                            <?php } elseif ($dev->status_id == '8') { ?>
                                                                <button type="button" class="btn bg-gradient-success" style="width: 83px;" disabled>Success</button>
                                                            <?php } elseif ($dev->status_id == '9') { ?>
                                                                <button type="button" class="btn bg-gradient-danger" style="width: 83px;" disabled>Failed</button>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->





                            <div class="card" style="margin-bottom: 150px;">
                                <div class="card-header">
                                    <h3 class="card-title">ANALYSIS</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead style="text-align: center;">
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th style="width: 15%;">Tanggal Mulai</th>
                                                <th style="width: 15%;">Tanggal Selesai</th>
                                                <th>Analisa</th>
                                                <th>Hasil Analisa</th>
                                                <th>Researcher</th>
                                                <th>Attachment</th>
                                                <!-- <th style="width: 10%;">Aksi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $aa = 1;
                                            if (!empty($analisisDokumen)) {
                                                foreach ($analisisDokumen as $key => $g) : ?>
                                                    <tr>
                                                        <td><?= $aa++ ?></td>
                                                        <td><?= date('D, d-m-Y', strtotime($g['analisis_tanggal_mulai'])) ?></td>
                                                        <td><?= date('D, d-m-Y', strtotime($g['analisis_tanggal_selesai'])) ?></td>
                                                        <td><?= $g['analisis_analisa'] ?></td>
                                                        <td><?= $g['analisis_hasil'] ?></td>
                                                        <td><?= $g['analisis_research'] ?></td>
                                                        <td>
                                                            <?php
                                                            foreach ($g['analisis_dokumen'] as $key => $value) { ?>
                                                                <a href="<?= base_url('assets/development/' . $value['analisis_dokumen_dokumen']) ?>"><?= $value['analisis_dokumen_dokumen']; ?></a>
                                                                <br>
                                                            <?php } ?>
                                                        </td>
                                                        <!-- <td>
                                                            <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#update<?= $g['analisis_id'] ?>" style="width: 85px;">Update</button>
                                                            <button type="button" class="btn bg-gradient-warning" data-toggle="modal" data-target="#attach<?= $g['analisis_id'] ?>" style="width: 85px; margin-top:5px">Attach</button>
                                                        </td> -->
                                                    </tr>
                                                <?php endforeach ?>
                                            <?php } ?>
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


        <div class="modal fade" id="process">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-12">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title text-center">Checklist</h4>
                        </div>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= site_url('development/proses') ?>">
                        <!-- <input type="hidden" value="2" name="status"> -->
                        <input type="hidden" value="<?= $dev->development_id; ?>" name="id" class="form-control">
                        <div class="modal-body">
                            <!-- form start -->
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-header">
                                                <h3 class="card-title">Stok Gudang</h3>
                                            </div>
                                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                                <table class="table table-head-fixed text-nowrap table-striped">
                                                    <thead>
                                                        <tr style="text-align: center;">
                                                            <th style="width: 6%;">No.</th>
                                                            <th style="width: 50%;">Komposisi</th>
                                                            <th style="width: 20%;">Qty</th>
                                                            <th>Satuan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1;
                                                        foreach ($gudang as $g) :
                                                        ?>
                                                            <tr style="height: 73px;">
                                                                <td><?= $no++ ?></td>
                                                                <td>[<?= $g->barang_kode ?>] <?= $g->barang_nama ?></td>
                                                                <td><?= $g->gudang_qty ?></td>
                                                                <td><?= $g->gudang_satuan ?></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-header">
                                                <h3 class="card-title">Komposisi</h3>
                                            </div>
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                                <table class="table table-head-fixed text-nowrap table-striped">
                                                    <thead>
                                                        <tr style="text-align: center;">
                                                            <th style="width: 6%;">No.</th>
                                                            <th style="width: 40%;">Komposisi</th>
                                                            <th style="width: 20%;">Qty</th>
                                                            <th>Satuan</th>
                                                            <!-- <th>Foto</th> -->
                                                            <!-- <th style="width: 20%;">Aksi</th> -->
                                                            <!-- <th>CSS grade</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1;
                                                        if (!empty($komposisi)) foreach ($komposisi as $q) :
                                                        ?>
                                                            <input type="hidden" value="<?= $q->development_id ?>" name="id">
                                                            <tr>
                                                                <!-- <td>1</td> -->
                                                                <td>
                                                                    <pre style="display:table-row"><?= $no++ ?></pre>
                                                                </td>
                                                                <td>
                                                                    <pre style="display:table-row">[<?= $q->barang_kode ?>] <?= $q->barang_nama ?></pre>
                                                                    <input type="hidden" name="barangId[]" value="<?= $q->barang_id ?>">
                                                                </td>
                                                                <td><input type="text" class="form-control" placeholder="0" name="qty[]" min="0" required></td>
                                                                <!-- <input type="hidden" name="satuan[]"> -->
                                                                <td>
                                                                    <select class="form-control select2" style="width: 100%;" name="satuan[]">
                                                                        <option value="gram">gram</option>
                                                                        <option value="ml">ml</option>
                                                                        <option value="pcs">pcs</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="failed">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">FAILED</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= site_url('development/failed') ?>">
                        <input type="hidden" value="<?= $dev->development_id; ?>" name="id" class="form-control">
                        <input type="hidden" value="<?= date('CCYY-MM-DD hh:mm:ss') ?>" name="tanggal">
                        <div class="modal-body">
                            <p>Are You Sure FAILED ?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">FAILED</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="finish">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">FINISHED</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= site_url('development/finish') ?>">
                        <input type="hidden" value="<?= $dev->development_id; ?>" name="id" class="form-control">
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
            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            });

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
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