<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/partials/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
                            <h1>Data Barang</h1>
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
                                                <th style="width: 15%;">No Nota</th>
                                                <th>Toko</th>
                                                <th>Total Harga</th>
                                                <th style="width: 13%;">Total Qty</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                                <!-- <th style="width: 30%;">Aksi</th> -->
                                                <!-- <th>CSS grade</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="data_pengiriman">
                                        </tbody>
                                        <tfoot>
                                            <tr style="text-align: center;">
                                                <th>No.</th>
                                                <th>No Nota</th>
                                                <th>Toko</th>
                                                <th>Total Harga</th>
                                                <th>Total Qty</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
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


        <div class="modal fade" id="detail">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>No. Nota</label>
                                        <input type="text" name="noNota" class="form-control" id="modal_no_nota" placeholder="Nomor Nota" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="text" name="tanggal" class="form-control" id="modal_tanggal" placeholder="Tanggal" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pengirim</label>
                                        <input type="text" name="pengirim" class="form-control" id="modal_pengirim" placeholder="Nama Pengirim" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Qty</label>
                                        <input type="text" name="totalQty" class="form-control" id="total_qty" placeholder="Total Qty" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kirim Ke</label>
                                        <input type="text" class="form-control" id="modal_toko" placeholder="Password" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Harga</label>
                                        <input type="text" class="form-control" id="modal_total_harga" placeholder="Total Harga" value="Rp" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table id="modal_tabel" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Nama Barang</th>
                                                <th>Size</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
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
    <script>
        function formatRupiah(angka, prefix) {
            var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function getDetail(button) {
            let inputid = $(button).data("id");

            $.ajax({
                type: "POST",
                data: {
                    id: inputid,
                },
                url: "<?= site_url('Riwayat/getDetail') ?>",
                dataType: "JSON",
                success: function(hasil) {
                    if (hasil.length != 0) {
                        $("#modal_no_nota").text(": " + hasil[0].pengiriman_no_nota);
                        $("#modal_tanggal").text(": " + hasil[0].pengiriman_tgl);
                        $("#total_qty").text(": " + hasil[0].pengiriman_total_qty);
                        $("#modal_toko").text(": " + hasil[0].toko_nama);
                        $("#modal_total_harga").text(": Rp" + formatRupiah(hasil[0].pengiriman_total_harga));

                        let row = "";
                        for (let i = 0; i < hasil.length; i++) {
                            row += "<tr>\
                                        <td>" + (i + 1) + "</td>\
                                        <td>" + hasil[i].barang_nama + "</td>\
                                        <td>" + hasil[i].size_nama + "</td>\
                                        <td> Rp" + formatRupiah(hasil[i].detail_pengiriman_harga) + "</td>\
                                        <td>" + hasil[i].detail_pengiriman_qty + "</td>\
                                        <td> Rp" + formatRupiah(hasil[i].qty * hasil[i].harga) + "</td>\
                                    </tr>";

                        }
                        $("#modal_tabel tbody").html(row);

                    }
                }

            });

        }

        function getdata() {
            $.ajax({
                type: 'POST',
                // url: "http://localhost/yan/api/API/getuser", dari aplikasi lain
                url: "<?= site_url('Riwayat/getDataPengiriman') ?>",
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);

                    var html = '';
                    for (let i = 0; i < data.length; i++) {
                        html += "\
                            <tr>\
                            <td>" + (i + 1) + "</td>\
                            <td>" + data[i].pengiriman_no_nota + "</td>\
                            <td>" + data[i].toko_nama + "</td>\
                            <td> Rp" + formatRupiah(data[i].pengiriman_total_harga) + "</td>\
                            <td>" + data[i].pengiriman_total_qty + "</td>\
                            <td>" + data[i].pengiriman_tgl + "</td>\
                            <td style='text-align: center;'>\
                                <a type='button' onclick='getDetail(this)' class='btn bg-gradient-warning' data-toggle='modal' data-target='#detail' data-id='" + data[i].pengiriman_id + "' style='width: 83px;'><i class='fas fa-edit'></i>Detail</i></a>\
                            </td>\
                            </tr>\
                            ";
                    }
                    $("#data_pengiriman").html(html);

                }
            });
        }

        $(document).ready(function() {
            getdata()
        });
    </script>
</body>

</html>