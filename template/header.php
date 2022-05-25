<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>RuangAdmin - Dashboard</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/ruang-admin.min.css" rel="stylesheet">
    <!-- Bootstrap DatePicker -->
    <link href="../vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="../img/logo/logo2.png">
                </div>
                <div class="sidebar-brand-text mx-3">RuangAdmin</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <?php
            $lvl = $_SESSION['level'];
            ?>
            <?php
            if ($lvl == 'user') {
            ?>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Katalog
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="../user/katalog_produk.php">
                        <i class="fas fa-fw fa-building"></i>
                        <span>Katalog Gedung</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Transaksi
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="../user/riwayat_sewa.php">
                        <i class="fas fa-fw fa-file-invoice"></i>
                        <span>Riwayat Sewa</span>
                    </a>
                </li>
            <?php
            } else if ($lvl == 'admin') {
            ?>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Master Data
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/data_admin.php">
                        <i class="fas fa-fw fa-users-cog"></i>
                        <span>Data Admin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/data_customer.php">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Data Customer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/data_gedung.php">
                        <i class="fas fa-fw fa-building"></i>
                        <span>Data Gedung</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Transaksi
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/data_transaksi.php">
                        <i class="fas fa-fw fa-file-invoice-dollar"></i>
                        <span>Transaksi Sewa</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Laporan
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/form_laporan.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Laporan Transaksi</span>
                    </a>
                </li>
            <?php } ?>
            <hr class="sidebar-divider">
            <div class="version" id="version-ruangadmin"></div>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="../img/boy.png" style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['nama'] ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->