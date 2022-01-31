<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laboratorium | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php $this->load->view('admin/partials/navbar') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('admin/partials/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <?php if ($permintaansample == '') { ?>
                    <h3>0</h3>
                  <?php } else { ?>
                    <h3><?= $permintaansample ?></h3>
                  <?php } ?>

                  <p>Permintaan Sample</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?= site_url('permintaansample') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
                  <?php if ($finish == '') { ?>
                    <h3>0</h3>
                  <?php } else { ?>
                    <h3><?= $finish ?></h3>
                  <?php } ?>

                  <p>Sample Selesai</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?= site_url('barang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <?php if ($pengiriman == '') { ?>
                    <h3>0</h3>
                  <?php } else { ?>
                    <h3><?= $pengiriman ?></h3>
                  <?php } ?>

                  <p>Pengiriman</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?= site_url('riwayat/pengiriman') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <?php if ($user == '') { ?>
                    <h3>0</h3>
                  <?php } else { ?>
                    <h3><?= $user ?></h3>
                  <?php } ?>

                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?= site_url('user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">



              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Latest Orders Permintaan Sample</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                        <tr style="text-align: center;">
                          <th>#</th>
                          <th>Tanggal</th>
                          <th>Nama</th>
                          <th>Permintaan Sample</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        foreach ($lastorder as $data) : ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= date('d-m-Y | H:i:s', strtotime($data->form_tanggal)) ?></td>
                            <td><?= $data->form_nama_customer ?></td>
                            <td><?= $data->form_permintaan_sample ?></td>
                            <td style="text-align: center;"><span class="badge <?php if ($data->status_id == 2) { ?>
                                                                                    bg-warning
                                                                                <?php } elseif ($data->status_id == 1) { ?>
                                                                                    bg-primary
                                                                                <?php } elseif ($data->status_id == 5) { ?>
                                                                                    bg-success
                                                                                <?php } ?> "><?= $data->status_nama ?></span></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
                  <a href="<?= site_url('permintaansample/marketing') ?>" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Permintaan Sample Terakhir Diterima</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Permintaan</th>
                        <th style="width: 40px">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($received as $data) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= date('d-m-Y | H:i:s', strtotime($data->form_tanggal)) ?></td>
                          <td><?= $data->form_nama_customer ?></td>
                          <td><?= $data->form_permintaan_sample ?></td>
                          <td style="text-align: center;"><span class="badge bg-primary"><?= $data->status_nama ?></span></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Permintaan Sample Terakhir On Progress</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Permintaan</th>
                        <th style="width: 40px">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($progress as $data) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= date('d-m-Y | H:i:s', strtotime($data->form_tanggal)) ?></td>
                          <td><?= $data->form_nama_customer ?></td>
                          <td><?= $data->form_permintaan_sample ?></td>
                          <td style="text-align: center;"><span class="badge bg-warning"><?= $data->status_nama ?></span></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Permintaan Sample Terakhir Selesai</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Permintaan</th>
                        <th style="width: 40px">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($done as $data) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= date('d-m-Y | H:i:s', strtotime($data->form_tanggal)) ?></td>
                          <td><?= $data->form_nama_customer ?></td>
                          <td><?= $data->form_permintaan_sample ?></td>
                          <td style="text-align: center;"><span class="badge bg-success"><?= $data->status_nama ?></span></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>






            <div class="col-md-6">
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Latest Orders Development</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                        <tr style="text-align: center;">
                          <th>#</th>
                          <th>Tanggal Masuk</th>
                          <th>Developer</th>
                          <th>Jenis Sample</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        foreach ($dev as $data) : ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= date('d-m-Y | H:i:s', strtotime($data->development_tanggal_masuk)) ?></td>
                            <td><?= $data->development_developer ?></td>
                            <td><?= $data->development_jenis_sample ?></td>
                            <td style="text-align: center;"><span class="badge <?php if ($data->status_id == 2) { ?>
                                                                                    bg-warning
                                                                                <?php } elseif ($data->status_id == 1) { ?>
                                                                                    bg-primary
                                                                                <?php } elseif ($data->status_id == 8) { ?>
                                                                                    bg-success
                                                                                <?php } ?> "><?= $data->status_nama ?></span></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
                  <a href="<?= site_url('development/rnd') ?>" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Development Terakhir Diterima</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Permintaan</th>
                        <th style="width: 40px">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($devReceived as $data) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $data->development_tanggal_masuk ?></td>
                          <td><?= $data->development_developer ?></td>
                          <td><?= $data->development_jenis_sample ?></td>
                          <td style="text-align: center;"><span class="badge bg-primary"><?= $data->status_nama ?></span></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Development Terakhir On Progress</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Permintaan</th>
                        <th style="width: 40px">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($devOnProgress as $data) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $data->development_tanggal_masuk ?></td>
                          <td><?= $data->development_developer ?></td>
                          <td><?= $data->development_jenis_sample ?></td>
                          <td style="text-align: center;"><span class="badge bg-warning"><?= $data->status_nama ?></span></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Development Terakhir Selesai</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr style="text-align: center;">
                        <th style="width: 10px">#</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Permintaan</th>
                        <th style="width: 40px">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($devSuccess as $data) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $data->development_tanggal_masuk ?></td>
                          <td><?= $data->development_developer ?></td>
                          <td><?= $data->development_jenis_sample ?></td>
                          <td style="text-align: center;"><span class="badge bg-success"><?= $data->status_nama ?></span></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!-- ./col -->
          </div>
        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?php $this->load->view('admin/partials/footer') ?>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>

  <!-- PAGE <?= base_url('assets/') ?>plugins -->
  <!-- jQuery Mapael -->
  <script src="<?= base_url('assets/') ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/raphael/raphael.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url('assets/') ?>dist/js/pages/dashboard2.js"></script>
</body>

</html>