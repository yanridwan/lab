<aside class="main-sidebar collapse-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Laboratorium</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php if (!empty($this->session->userdata('gambar'))) {
                                echo base_url('assets/img/' . $this->session->userdata('gambar'));
                            } else {
                                echo base_url('assets/img/default.jpg');
                            } ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ucfirst($this->session->userdata('username')) ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2" style="padding-bottom: 50px;">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">HOME</li>
                <li class="nav-item">
                    <a href="<?= site_url('admin') ?>" class="nav-link <?php if ($this->uri->segment(1) == "") {
                                                                            echo "nav-link active";
                                                                        } elseif ($this->uri->segment(1) == "admin") {
                                                                            echo "nav-link active";
                                                                        } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">STOK GUDANG</li>
                <?php if ($this->session->userdata('level_id') != '3') { ?>
                    <?php if ($this->session->userdata('level_id') != '4') { ?>
                        <li class="nav-item">
                            <a href="<?= site_url('barang') ?>" class="<?php if ($this->uri->segment(1) == "barang") {
                                                                            echo "nav-link active";
                                                                        } else {
                                                                            echo "nav-link";
                                                                        } ?>">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Nama Barang
                                </p>
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?= site_url('gudang') ?>" class="<?php if ($this->uri->segment(1) == "gudang") {
                                                                    echo "nav-link active";
                                                                } else {
                                                                    echo "nav-link";
                                                                } ?>">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Stok Gudang
                        </p>
                    </a>
                </li>
                <?php
                if ($this->session->userdata('level_id') != '2') { ?>
                    <li class="nav-header">FORM</li>
                    <?php if ($this->session->userdata('level_id') != '4') { ?>
                        <li class="nav-item">
                            <a href="<?= site_url('PermintaanSample/marketing') ?>" class="<?php if ($this->uri->segment(2) == "marketing") {
                                                                                                echo "nav-link active";
                                                                                            } else {
                                                                                                echo "nav-link";
                                                                                            } ?>">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Marketing
                                </p>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('level_id') != '3') { ?>
                        <li class="nav-item">
                            <a href="<?= site_url('permintaansample/sample') ?>" class="<?php if ($this->uri->segment(2) == "sample") {
                                                                                            echo "nav-link active";
                                                                                        } else {
                                                                                            echo "nav-link";
                                                                                        } ?>">
                                <i class="nav-icon fas fa-vials"></i>
                                <p>
                                    Sample
                                </p>
                            </a>
                        </li>
                        <?php if ($this->session->userdata('level_id') != '4') { ?>
                            <li class="nav-header">DEVELOPMENT</li>
                            <li class="nav-item">
                                <a href="<?= site_url('development/rnd') ?>" class="<?php if ($this->uri->segment(2) == "rnd") {
                                                                                        echo "nav-link active";
                                                                                    } elseif ($this->uri->segment(2) == "detailrnd") {
                                                                                        echo "nav-link active";
                                                                                    } else {
                                                                                        echo "nav-link";
                                                                                    } ?>">
                                    <i class="nav-icon fas fa-vial"></i>
                                    <p>
                                        RnD
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('development/research') ?>" class="<?php if ($this->uri->segment(2) == "research") {
                                                                                                echo "nav-link active";
                                                                                            } elseif ($this->uri->segment(2) == "detailresearch") {
                                                                                                echo "nav-link active";
                                                                                            } else {
                                                                                                echo "nav-link";
                                                                                            } ?>">
                                    <i class="nav-icon fas fa-flask"></i>
                                    <p>
                                        Research
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <li class="nav-header">Riwayat</li>
                <li class="nav-item">
                    <a href="<?= site_url('riwayat/barangmasuk') ?>" class="<?php if ($this->uri->segment(2) == "barangmasuk") {
                                                                                echo "nav-link active";
                                                                            } else {
                                                                                echo "nav-link";
                                                                            } ?>">
                        <i class="nav-icon fas fa-sign-in-alt"></i>
                        <p>
                            Barang Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('riwayat/barangkeluar') ?>" class="<?php if ($this->uri->segment(2) == "barangkeluar") {
                                                                                    echo "nav-link active";
                                                                                } else {
                                                                                    echo "nav-link";
                                                                                } ?>">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Barang Keluar
                        </p>
                    </a>
                </li>
                <?php
                if ($this->session->userdata('level_id') != '2') { ?>
                    <li class="nav-item">
                        <a href="<?= site_url('riwayat/pengiriman') ?>" class="<?php if ($this->uri->segment(2) == "pengiriman") {
                                                                                    echo "nav-link active";
                                                                                } else {
                                                                                    echo "nav-link";
                                                                                } ?>">
                            <i class="nav-icon fas fa-share-square"></i>
                            <p>
                                Pengiriman
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <?php
                if ($this->session->userdata('level_id') == '1') { ?>
                    <li class="nav-header">USER</li>
                    <li class="nav-item">
                        <a href="<?= site_url('user') ?>" class="<?php if ($this->uri->segment(1) == "user") {
                                                                        echo "nav-link active";
                                                                    } else {
                                                                        echo "nav-link";
                                                                    } ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-header">SIGN OUT</li>
                <li class="nav-item">
                    <a href="<?= site_url('login/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            LOGOUT
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>