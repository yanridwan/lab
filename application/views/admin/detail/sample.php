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
                                    <a href="<?= site_url('permintaansample/sample') ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" style="margin-right: 6px;"></i>Kembali</button></a>
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
                                                    <label class="col-sm-4">ID Project</label>
                                                    <div class="col-sm-8">
                                                        : <?= $formstatus->form_id ?>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4">Status</label>
                                                    <div class="col-sm-8">
                                                        : <?= $formstatus->status_nama ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4">Tanggal</label>
                                                    <div class="col-sm-8">
                                                        : <?= date('D, d-m-Y', strtotime($permintaan->permintaan_tanggal_masuk)) ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4">Marketing</label>
                                                    <div class="col-sm-8">
                                                        : <?= $form->form_marketing ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- <input type="hidden" value="" name="barangID"> -->
                                                <div class="form-group row">
                                                    <label class="col-sm-4">APJ</label>
                                                    <div class="col-sm-8">
                                                        : <?= $permintaan->permintaan_penanggung_jawab ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4">Nama Customer</label>
                                                    <div class="col-sm-8">
                                                        : <?= $form->form_nama_customer ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4">Permintaan Sample</label>
                                                    <div class="col-sm-8">
                                                        : <?= $form->form_permintaan_sample ?>
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
                                                        if ($this->session->userdata('level_id') != '3') { ?>
                                                            <th style="width: 15%;">Komposisi</th>
                                                        <?php } ?>
                                                        <th>Warna</th>
                                                        <th>Aroma</th>
                                                        <th style="width: 15%;">Tekstur</th>
                                                        <th style="width: 15%;">Manfaat</th>
                                                        <th>Gramasi</th>
                                                        <th>Metodologi</th>
                                                        <th style="width: 15%;">Keterangan</th>
                                                        <th>Status</th>
                                                        <th>Attachment</th>
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
                                                        if ($this->session->userdata('level_id') != '3') { ?>
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
                                                            <pre><?= $permintaan->permintaan_metodologi ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $permintaan->permintaan_keterangan ?></pre>
                                                        </td>
                                                        <td>
                                                            <pre><?= $permintaanstatus[0]->status_nama ?></pre>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('assets/dokumen/' . $permintaan->permintaan_dokumen) ?>"><?= $permintaan->permintaan_dokumen ?></a>
                                                        </td>
                                                        <td>
                                                            <?php $no = 1;
                                                            if (empty($komposisi)) {
                                                            ?>
                                                                <button type="button" class="btn bg-gradient-warning" data-toggle="modal" data-target="#formulasi_data" style="width: 115px;"><i class="fas fa-file-invoice"></i>Formulasi</button>
                                                            <?php } else { ?>

                                                                <?php if ($permintaan->status_id == "1") { ?>
                                                                    <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#process" style="width: 83px;">Process</button>
                                                                <?php } elseif ($permintaan->status_id == '2') { ?>
                                                                    <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#finish" style="width: 83px;">Finish</button>
                                                                <?php } elseif ($permintaan->status_id == '3') { ?>
                                                                    <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#finish" style="width: 83px;" disabled>Finish</button>
                                                                    <!-- <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#send" style="width: 83px;">Send</button> -->
                                                                <?php } else { ?>
                                                                    <button type="button" class="btn bg-gradient-success" style="width: 83px;" disabled>Sent</button>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <?php
                                        if (!empty($myrevisi)) {
                                            foreach ($myrevisi as $key => $q) : ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Revisi <?= $key + 1 ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body table-responsive p-0" style="height: 200px;">
                                                    <table class="table table-head-fixed text-nowrap table-striped">
                                                        <thead>
                                                            <tr style="text-align: center;">
                                                                <!-- <th style="width: 6%;">No.</th> -->
                                                                <?php
                                                                if ($this->session->userdata('level_id') != '3') { ?>
                                                                    <th style="width: 15%;">Komposisi</th>
                                                                <?php } ?>
                                                                <th>Warna</th>
                                                                <th>Aroma</th>
                                                                <th style="width: 15%;">Tekstur</th>
                                                                <th style="width: 15%;">Manfaat</th>
                                                                <th>Gramasi</th>
                                                                <th>Metodologi</th>
                                                                <th style="width: 15%;">Keterangan</th>
                                                                <th>Status</th>
                                                                <th>Attachment</th>
                                                                <th>Aksi</th>
                                                                <!-- <th>Foto</th> -->
                                                                <!-- <th style="width: 20%;">Aksi</th> -->
                                                                <!-- <th>CSS grade</th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <?php
                                                                    foreach ($q['revisi_komposisi'] as $key => $value) {
                                                                        echo '[' . $value['barang_kode'] . '] ' . $value['barang_nama'] . ' (' . $value['revisi_komposisi_qty'] . $value['revisi_komposisi_satuan'] . ')';
                                                                        echo '<br>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <pre><?= $q['revisi_warna'] ?></pre>
                                                                </td>
                                                                <td>
                                                                    <pre><?= $q['revisi_aroma'] ?></pre>
                                                                </td>
                                                                <td>
                                                                    <pre style="padding-bottom: 10px;"><?= $q['revisi_tekstur'] ?></pre>
                                                                </td>
                                                                <td>
                                                                    <pre><?= $q['revisi_manfaat'] ?></pre>
                                                                </td>
                                                                <td>
                                                                    <pre><?= $q['revisi_gramasi'] ?></pre>
                                                                </td>
                                                                <td>
                                                                    <pre><?= $q['revisi_metodologi'] ?></pre>
                                                                </td>
                                                                <td>
                                                                    <pre><?= $q['revisi_keterangan'] ?></pre>
                                                                </td>
                                                                <td>
                                                                    <pre><?= $q['status_id'] ?></pre>
                                                                </td>
                                                                <td>
                                                                    <a href="<?= base_url('assets/dokumen/' . $q['revisi_dokumen']) ?>"><?= $q['revisi_dokumen'] ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php $no = 1;
                                                                    if (empty($q['revisi_komposisi'])) {
                                                                    ?>
                                                                        <button type="button" class="btn bg-gradient-warning" data-toggle="modal" data-target="#formulasi_revisi<?= $q['revisi_id'] ?>" style="width: 115px;"><i class="fas fa-file-invoice"></i>Formulasi</button>
                                                                    <?php } else { ?>


                                                                        <?php if ($q['status_id'] == "1") { ?>
                                                                            <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#processrevisi<?= $q['revisi_id'] ?>" style="width: 83px;">Process</button>
                                                                        <?php } elseif ($q['status_id'] == '2') { ?>
                                                                            <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#finishrevisi<?= $q['revisi_id'] ?>" style="width: 83px;">Finish</button>
                                                                        <?php } elseif ($q['status_id'] == '3') { ?>
                                                                            <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#finish" style="width: 83px;" disabled>Finish</button>
                                                                        <?php } else { ?>
                                                                            <button type="button" class="btn bg-gradient-success" style="width: 83px;" disabled>Sent</button>
                                                                        <?php } ?>

                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php endforeach ?>
                                        <?php } ?>
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
        $nomor = 1;
        if (!empty($myrevisi))
            foreach ($myrevisi as $q) :
        ?>
            <div class="modal fade" id="processrevisi<?= $q['revisi_id'] ?>">
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
                            <input type="hidden" value="<?= $q['revisi_id']; ?>" name="id" class="form-control">
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
                                                            foreach ($q['revisi_komposisi'] as $key => $value) { ?>
                                                                <input type="hidden" value="<?= $value['form_id'] ?>" name="formId">
                                                                <tr>
                                                                    <!-- <td>1</td> -->
                                                                    <td>
                                                                        <pre style="display:table-row"><?= $a++ ?></pre>
                                                                    </td>

                                                                    <td>
                                                                        <?= '[' . $value['barang_kode'] . '] ' . $value['barang_nama'] ?>
                                                                        <input type="hidden" name="barangId[]" value="<?= $value['barang_id'] ?>">
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
        if (!empty($myrevisi))
            foreach ($myrevisi as $q) :
        ?>
            <div class="modal fade" id="finishrevisi<?= $q['revisi_id'] ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Default Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-horizontal" method="post" action="<?= site_url('Detail/finishrevisi') ?>">
                            <input type="hidden" value="<?= $q['revisi_id'] ?>" name="revisiId">
                            <input type="hidden" value="<?= $form->form_id; ?>" name="id" class="form-control">
                            <input type="hidden" value="<?= date('CCYY-MM-DD hh:mm:ss') ?>" name="tanggal">
                            <div class="modal-body">
                                <p>Are You Sure Want to Finish <?= $q['revisi_id'] ?> ?</p>
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



        <?php $no = 0;
        foreach ($formpermintaan as $fr) : $no++ ?>
            <div class="modal fade" id="formulasi_data">
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
                        <form class="form-horizontal" method="post" action="<?= site_url('permintaansample/tambahsample') ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" value="<?= $fr->form_id; ?>" name="Fid" class="form-control">
                                <input type="hidden" value="<?= $fr->permintaan_id; ?>" name="Pid" class="form-control">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Status</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" placeholder="Status" value="<?= $fr->status_nama ?>" name="formStatus" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">ID Project</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" placeholder="id project" name="formIdProject" value="<?= $fr->form_id ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Tanggal" value="<?= date('D, d-m-Y', strtotime($fr->form_tanggal)) ?>" name="formTanggal" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Marketing</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Penanggung Jawab" value="<?= $fr->form_marketing ?>" name="formPenanggungJawab" readonly>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">


                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">PJ Lab</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Penanggung Jawab" name="formPenanggungJawab" required>
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
                                            <input type="text" class="form-control" placeholder="Warna" value="<?= $fr->permintaan_warna ?>" name="warna" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Aroma</label>
                                            <input type="text" class="form-control" placeholder="Aroma" value="<?= $fr->permintaan_aroma ?>" name="aroma" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Tekstur</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="tekstur" readonly><?= $fr->permintaan_tekstur ?></textarea>
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
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="manfaat" readonly><?= $fr->permintaan_manfaat ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Gramasi</label>
                                            <input type="text" class="form-control" placeholder="Gramasi" value="<?= $fr->permintaan_gramasi ?>" name="gramasi" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Metodologi</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="metodologi" required></textarea>
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



        <?php $no = 0;
        if (!empty($formrevisi)) {
            foreach ($formrevisi as $fr) : $no++ ?>
                <div class="modal fade" id="formulasi_revisi<?= $fr->revisi_id ?>">
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
                            <form class="form-horizontal" method="post" action="<?= site_url('detail/revisisample') ?>" enctype="multipart/form-data">
                                <div class="card-body">
                                    <input type="hidden" value="<?= $fr->form_id; ?>" name="Fid" class="form-control">
                                    <input type="hidden" value="<?= $fr->revisi_id; ?>" name="Rid" class="form-control">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Status</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="Status" value="<?= $fr->status_nama ?>" name="formStatus" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">ID Project</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="id project" name="formIdProject" value="<?= $fr->form_id ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Tanggal" value="<?= date('D, d-m-Y', strtotime($fr->form_tanggal)) ?>" name="formTanggal" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Marketing</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Penanggung Jawab" value="<?= $fr->form_marketing ?>" name="formPenanggungJawab" readonly>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">PJ Lab</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="Penanggung Jawab" name="formPenanggungJawab" required>
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
                                                <input type="text" class="form-control" placeholder="Warna" value="<?= $fr->revisi_warna ?>" name="warna" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Aroma</label>
                                                <input type="text" class="form-control" placeholder="Aroma" value="<?= $fr->revisi_aroma ?>" name="aroma" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Tekstur</label>
                                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="tekstur" readonly><?= $fr->revisi_tekstur ?></textarea>
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
                                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="manfaat" readonly><?= $fr->revisi_manfaat ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Gramasi</label>
                                                <input type="text" class="form-control" placeholder="Gramasi" value="<?= $fr->revisi_gramasi ?>" name="gramasi" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Metodologi</label>
                                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="metodologi" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="keterangan" required><?= $fr->revisi_keterangan ?></textarea>
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
        <?php } ?>
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