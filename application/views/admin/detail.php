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
                                <!-- <div class="card-header">
                                    <div class="col-md-12">
                                        <h3 class="card-title">Detail Permintaan Sample</h3>
                                        <a href="<?= site_url('permintaansample') ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" style="margin-right: 6px;"></i>Kembali</button></a>
                                        <a href="<?= site_url('permintaansample') ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" style="margin-right: 6px;"></i>Kembali</button></a>
                                        <div class="card-tools">
                                            <ul class="nav nav-pills ml-auto">
                                                <li class="nav-item">
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#tambah_data" style="width: 120px;"><i class="fa fa-plus-square" style="margin-right: 6px;"></i>Tambah Data</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="card-header">
                                    <!-- <h3 class="card-title">Tabel Barang</h3> -->
                                    <a href="<?= site_url('permintaansample') ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" style="margin-right: 6px;"></i>Kembali</button></a>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a href="<?= site_url('detail/cetak/' . $form->form_id) ?>"><button type=" button" class="btn btn-success btn-sm" style="width: 120px;"><i class="fa fa-plus-square" style="margin-right: 6px;"></i>Cetak</button></a>
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
                                                    <label class="col-sm-4 col-form-label">Tanggal</label>
                                                    <div class="col-sm-8">
                                                        : <?= date('D, d-m-Y', strtotime($permintaan->permintaan_tanggal_masuk)) ?>
                                                        <!-- <input type="text" class="form-control" placeholder="Rabu, 05 Januari 2022" value="<?= $fr->form_tanggal ?>"> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Nama Customer</label>
                                                    <div class="col-sm-8">
                                                        : <?= $form->form_nama_customer ?>
                                                        <!-- <input type="text" class="form-control" placeholder="Ria Surabaya" value="<?= $form->form_nama_customer ?>"> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Permintaan Sample</label>
                                                    <div class="col-sm-8">
                                                        : <?= $form->form_permintaan_sample ?>
                                                        <!-- <input type="text" class="form-control" placeholder="Sleeping Mask Gell" value="<?= $fr->form_permintaan_sample ?>"> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- <input type="hidden" value="" name="barangID"> -->
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Penanggung Jawab</label>
                                                    <div class="col-sm-8">
                                                        : <?= $form->form_penanggung_jawab ?>
                                                        <!-- <input type="text" class="form-control" placeholder="Rabu, 05 Januari 2022" value="<?= $fr->form_tanggal ?>"> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Status</label>
                                                    <div class="col-sm-8">
                                                        : <?= $formstatus->status_nama ?>
                                                        <!-- <input type="text" class="form-control" placeholder="Ria Surabaya" value="<?= $fr->form_nama_customer ?>"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive p-0" style="height: 200px;">
                                            <table class="table table-head-fixed text-nowrap table-striped">
                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <!-- <th style="width: 6%;">No.</th> -->
                                                        <?php
                                                        if ($this->session->userdata('level_id') != '4') { ?>
                                                            <th style="width: 15%;">Komposisi</th>
                                                        <?php } ?>
                                                        <th>Warna</th>
                                                        <th>Aroma</th>
                                                        <th style="width: 15%;">Tekstur</th>
                                                        <th style="width: 15%;">Manfaat</th>
                                                        <th>Gramasi</th>
                                                        <th style="width: 15%;">Keterangan</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                        <!-- <th>Foto</th> -->
                                                        <!-- <th style="width: 20%;">Aksi</th> -->
                                                        <!-- <th>CSS grade</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <!-- <td>1</td> -->
                                                        <?php
                                                        if ($this->session->userdata('level_id') != '4') { ?>
                                                            <td>
                                                                <?php $no = 1;
                                                                if (!empty($komposisi)) foreach ($komposisi as $q) :
                                                                ?>
                                                                    <pre style="display:table-row">[<?= $q->barang_kode ?>] <?= $q->barang_nama ?> (<?= $q->detail_komposisi_qty ?> <?= $q->detail_komposisi_satuan ?>)</pre>
                                                                <?php endforeach ?>
                                                            </td>
                                                        <?php } ?>
                                                        <td>
                                                            <pre><?= $permintaan->permintaan_warna ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $permintaan->permintaan_aroma ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre style="padding-bottom: 10px;"><?= $permintaan->permintaan_tekstur ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $permintaan->permintaan_manfaat ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $permintaan->permintaan_gramasi ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $permintaan->permintaan_keterangan ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $permintaanstatus[0]->status_nama ?></pre>
                                                        </td>
                                                        <td>
                                                            <?php if ($permintaan->status_id == "1") { ?>
                                                                <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#process" style="width: 83px;">Process</button>
                                                            <?php } elseif ($permintaan->status_id == '2') { ?>
                                                                <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#finish" style="width: 83px;">Finish</button>
                                                            <?php } elseif ($permintaan->status_id == '3') { ?>
                                                                <form action="<?= site_url('detail/pengiriman/') ?>" method="POST">
                                                                    <input type="hidden" name="id" value="<?= $form->form_id ?>">
                                                                    <button type="submit" class="btn bg-gradient-success" style="width: 83px;">Send</button>
                                                                </form>
                                                                <!-- <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#send" style="width: 83px;">Send</button> -->
                                                            <?php } else { ?>
                                                                <button type="button" class="btn bg-gradient-success" style="width: 83px;" disabled>Sent</button>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <?php $no = 1;
                                        foreach ($revisi as $q) :
                                        ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Revisi <?= $no++ ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body table-responsive p-0" style="height: 200px;">
                                                <table class="table table-head-fixed text-nowrap table-striped">
                                                    <thead>
                                                        <tr style="text-align: center;">
                                                            <!-- <th style="width: 6%;">No.</th> -->
                                                            <?php
                                                            if ($this->session->userdata('level_id') != '4') { ?>
                                                                <th style="width: 15%;">Komposisi</th>
                                                            <?php } ?>
                                                            <th>Warna</th>
                                                            <th>Aroma</th>
                                                            <th style="width: 15%;">Tekstur</th>
                                                            <th style="width: 15%;">Manfaat</th>
                                                            <th>Gramasi</th>
                                                            <th style="width: 15%;">Keterangan</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                            <!-- <th>Foto</th> -->
                                                            <!-- <th style="width: 20%;">Aksi</th> -->
                                                            <!-- <th>CSS grade</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <?php
                                                            if ($this->session->userdata('level_id') != '4') { ?>
                                                                <td>
                                                                    <?php
                                                                    foreach ($q as $key => $value) {
                                                                        echo '[' . $value->barang_kode . '] ' . $value->barang_nama . ' (' . $value->revisi_komposisi_qty . ' ' . $value->revisi_komposisi_satuan . ')<br>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                            <?php } ?>
                                                            <td>
                                                                <pre><?= $q[0]->revisi_warna ?></pre>
                                                            </td>
                                                            <td>
                                                                <pre><?= $q[0]->revisi_aroma ?></pre>
                                                            </td>
                                                            <td>
                                                                <pre style="padding-bottom: 10px;"><?= $q[0]->revisi_tekstur ?></pre>
                                                            </td>
                                                            <td>
                                                                <pre><?= $q[0]->revisi_manfaat ?></pre>
                                                            </td>
                                                            <td>
                                                                <pre><?= $q[0]->revisi_gramasi ?></pre>
                                                            </td>
                                                            <td>
                                                                <pre><?= $q[0]->revisi_keterangan ?></pre>
                                                            </td>
                                                            <td>
                                                                <pre><?= $q[0]->status_id ?></pre>
                                                            </td>
                                                            <td>
                                                                <?php if ($q[0]->status_id == "1") { ?>
                                                                    <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#processrevisi<?= $q[0]->revisi_id ?>" style="width: 83px;">Process</button>
                                                                <?php } elseif ($q[0]->status_id == '2') { ?>
                                                                    <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#finishrevisi<?= $q[0]->revisi_id ?>" style="width: 83px;">Finish</button>
                                                                <?php } elseif ($q[0]->status_id == '3') { ?>
                                                                    <!-- <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#send" style="width: 83px;">Send</button> -->
                                                                    <form action="<?= site_url('detail/revisipengiriman/') ?>" method="POST">
                                                                        <input type="hidden" name="id" value="<?= $q[0]->revisi_id ?>">
                                                                        <input type="hidden" name="formId" value="<?= $q[0]->form_id ?>">
                                                                        <button type="submit" class="btn bg-gradient-success" style="width: 83px;">Send</button>
                                                                    </form>
                                                                <?php } else { ?>
                                                                    <button type="button" class="btn bg-gradient-success" style="width: 83px;" disabled>Sent</button>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
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
                    <form class="form-horizontal" method="post" action="<?= site_url('Detail/proses') ?>">
                        <!-- <input type="hidden" value="2" name="status"> -->
                        <input type="hidden" value="<?= $form->form_id; ?>" name="id" class="form-control">
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
                                                            <input type="hidden" value="<?= $q->form_id ?>" name="formId">
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


        <?php $no = 1;
        if (!empty($revisi))
            foreach ($revisi as $q) :
        ?>
            <div class="modal fade" id="processrevisi<?= $q[0]->revisi_id ?>">
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
                        <form class="form-horizontal" method="post" action="<?= site_url('Detail/revisiproses') ?>">
                            <input type="hidden" value="<?= $q[0]->revisi_id; ?>" name="id" class="form-control">
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
                                                            <?php
                                                            $a = 1;
                                                            foreach ($q as $key => $value) { ?>
                                                                <input type="hidden" value="<?= $value->form_id ?>" name="formId">
                                                                <tr>
                                                                    <!-- <td>1</td> -->
                                                                    <td>
                                                                        <pre style="display:table-row"><?= $a++ ?></pre>
                                                                    </td>

                                                                    <td>
                                                                        <?= '[' . $value->barang_kode . '] ' . $value->barang_nama ?>
                                                                        <input type="hidden" name="barangId[]" value="<?= $value->barang_id ?>">
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
                                                            <?php } ?>
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
        <?php endforeach ?>


        <div class="modal fade" id="finish">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= site_url('Detail/finish') ?>">
                        <input type="hidden" value="<?= $permintaan->permintaan_id ?>" name="permintaanId">
                        <input type="hidden" value="<?= $form->form_id; ?>" name="id" class="form-control">
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


        <?php $no = 1;
        if (!empty($revisi))
            foreach ($revisi as $q) :
        ?>
            <div class="modal fade" id="finishrevisi<?= $q[0]->revisi_id ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Default Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-horizontal" method="post" action="<?= site_url('Detail/finishrevisi') ?>">
                            <input type="hidden" value="<?= $q[0]->revisi_id ?>" name="revisiId">
                            <input type="hidden" value="<?= date('CCYY-MM-DD hh:mm:ss') ?>" name="tanggal">
                            <div class="modal-body">
                                <p>Are You Sure Want to Finish <?= $q[0]->revisi_id ?> ?</p>
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
        <?php endforeach ?>


        <div class="modal fade" id="send">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= site_url('Detail/finish') ?>">
                        <!-- <input type="hidden" value="<?= $permintaan->permintaan_id ?>" name="permintaanId">
                        <input type="hidden" value="<?= date('CCYY-MM-DD hh:mm:ss') ?>" name="tanggal"> -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tanggal Pengiriman</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal" />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>

                                <!-- <input type="text" class="form-control" id="namaBarang" placeholder="Nama Barang" name="barangNama"> -->
                            </div>
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

    <?php $this->load->view('admin/partials/js') ?>
    <!-- Page specific script -->
    <script>
        $(function() {

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