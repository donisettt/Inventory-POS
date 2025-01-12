<?php 

if (!$this->session->has_userdata('login_session')) {
    redirect('login');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/icon/box-logo.png">

    <title>PT Mardoni Jaya | <?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/sbadmin/css/sb-admin-biru.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/profileee.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/all.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/animate/animate.min.css" rel="stylesheet">
    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/chosen/dist/css/component-chosen.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>home">
                <div class="sidebar-brand-icon ">
                    <img src="<?= base_url(); ?>assets/icon/box-logo.png" width="50">
                </div>
                <div class="sidebar-brand-text mx-3 ">MARDONI JAYA</div>
                
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php if($title == 'Dashboard'): ?>
            <li class="nav-item active">
                <?php else: ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url(); ?>home">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Bagian Sidebar Menu Utama -->

             <!-- Divider -->
             <hr class="sidebar-divider">

             <div class="sidebar-heading">
                Menu Utama
            </div>

             <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'gudang'): ?>
            <!-- Heading -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Master</h6>

                        <?php if($this->session->userdata('login_session')['level'] == 'admin'): ?>
                            <?php if($title == 'User'): ?>
                                <a class="collapse-item active" href="<?= base_url() ?>user"><b>Data User</b></a>
                            <?php else: ?>
                                <a class="collapse-item" href="<?= base_url() ?>user"><b>Data User</b></a>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'gudang'): ?>
                            <?php if($title == 'Supplier'): ?>
                                <a class="collapse-item active" href="<?= base_url() ?>supplier"><b>Supplier</b></a>
                            <?php else: ?>
                                <a class="collapse-item" href="<?= base_url() ?>supplier"><b>Supplier</b></a>
                            <?php endif; ?>

                            <?php if($title == 'Customer'): ?>
                                <a class="collapse-item active" href="<?= base_url() ?>customer"><b>Customer</b></a>
                            <?php else: ?>
                                <a class="collapse-item" href="<?= base_url() ?>customer"><b>Customer</b></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
            <?php endif; ?>

            <!-- Akhir Sidebar Menu Utama -->

            <!-- Sidebar Master Barang -->

            <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'gudang' || $this->session->userdata('login_session')['level'] == 'manajer'): ?>
            <!-- Nav Item - Master Barang -->
            <li class="nav-item <?php if($title == 'Barang' || $title == 'Satuan Barang' || $title == 'Jenis Barang') echo 'active'; ?>">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Master Barang</span>
                </a>
                <div id="collapsePages" class="collapse <?php if($title == 'Barang' || $title == 'Satuan Barang' || $title == 'Jenis Barang') echo 'show'; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Barang</h6>
                        <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'gudang'): ?>
                            <a class="collapse-item <?php if($title == 'Satuan Barang') echo 'active'; ?>" href="<?= base_url() ?>satuan"><b>Satuan Barang</b></a>
                            <a class="collapse-item <?php if($title == 'Jenis Barang') echo 'active'; ?>" href="<?= base_url() ?>jenis"><b>Jenis Barang</b></a>
                        <?php endif; ?>
                        <a class="collapse-item <?php if($title == 'Barang') echo 'active'; ?>" href="<?= base_url() ?>barang"><b>Data Barang</b></a>
                    </div>
                </div>
            </li>
            <?php endif; ?>

            <!-- Akhir Sidebar Master Barang -->

            <!-- Sidebar Transaksi -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'gudang'): ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>

            <!-- Nav Item - Transaksi -->
            <li class="nav-item <?php if($title == 'Barang Masuk' || $title == 'Barang Keluar') echo 'active'; ?>">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
                    <i class="fas fa-sync"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapsePages1" class="collapse <?php if($title == 'Barang Masuk' || $title == 'Barang Keluar') echo 'show'; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Transaksi</h6>
                        <a class="collapse-item <?php if($title == 'Barang Masuk') echo 'active'; ?>" href="<?= base_url() ?>barang_masuk"><b>Barang Masuk</b></a>
                        <a class="collapse-item <?php if($title == 'Barang Keluar') echo 'active'; ?>" href="<?= base_url() ?>barang_keluar"><b>Barang Keluar</b></a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <?php endif; ?>

            <!-- Akhir Sidebar Transaksi -->

            <!-- Sidebar Laporan -->

            <?php if($this->session->userdata('login_session')['level'] == 'admin'): ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Report
            </div>

            <!-- Nav Item - Laporan -->
            <li class="nav-item <?php if($title == 'Laporan Barang Masuk' || $title == 'Laporan Barang Keluar') echo 'active'; ?>">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapsePages2" class="collapse <?php if($title == 'Laporan Barang Masuk' || $title == 'Laporan Barang Keluar') echo 'show'; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan</h6>
                        <a class="collapse-item <?php if($title == 'Laporan Barang Masuk') echo 'active'; ?>" href="<?= base_url() ?>lap_barang_masuk"><b>Barang Masuk</b></a>
                        <a class="collapse-item <?php if($title == 'Laporan Barang Keluar') echo 'active'; ?>" href="<?= base_url() ?>lap_barang_keluar"><b>Barang Keluar</b></a>
                        <a class="collapse-item <?php if($title == 'Laporan Stok Barang') echo 'active'; ?>" href="<?= base_url() ?>lap_stok"><b>Stok Barang</b></a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <?php endif; ?>     
            
            <!-- Akhir Sidebar Laporan -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="namaP"><?= $this->session->userdata('login_session')['username'] ?></span>
                                <input type="hidden" name="iduser" id="iduser" value="<?= $this->session->userdata('login_session')['id_user'] ?>">
                                <img class="img-profile rounded-circle" id="img"
                                    src="<?= base_url() ?>assets/upload/pengguna/<?= $this->session->userdata('login_session')['foto'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item logout" href="#" id="logout" onclick="logout()">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- base url untuk js -->
                <input type="hidden" value="<?= base_url() ?>" id="baseurl">