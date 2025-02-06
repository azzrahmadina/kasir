<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $baseURL; ?>" class="brand-link">
        <img src="<?= $baseURL . 'assets/uploads/toko/' . $toko->logo; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold"> <?= $title_apl; ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $baseURL . 'assets/uploads/users/' . $users->avatar; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $users->name; ?> </a>
                <a href="#" class="d-block">( <?= $users->hak_akses; ?> )</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= $baseURL; ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Transaksi</li>
                <?php if (!empty(in_array($_SESSION['codekop_session']['akses'], [1, 5]))) { ?>
                    <li class="nav-item">
                        <a href="<?= $baseURL; ?>transaksi" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Kasir
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <?php if (!empty(in_array($_SESSION['codekop_session']['akses'], [5]))) { ?>
                    <li class="nav-item">
                        <a href="<?= $baseURL; ?>transaksi_beli" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Restok Barang
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $baseURL; ?>barang" class="nav-link">
                            <i class="fas fa-cubes nav-icon"></i>
                            <p>Barang</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if (!empty(in_array($_SESSION['codekop_session']['akses'], [1, 6]))) { ?>
                    <li class="nav-item">
                        <a href="<?= $baseURL; ?>transaksi_beli" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Restok Barang
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>
                                Laporan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (!empty(in_array($_SESSION['codekop_session']['akses'], [1]))) { ?>
                                <li class="nav-item">
                                    <a href="<?= $baseURL; ?>laporan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nota Penjualan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= $baseURL; ?>laporan_produk" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penjualan Barang</p>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a href="<?= $baseURL; ?>laporan_beli" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nota Pembelian</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $baseURL; ?>pembelian_produk" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pembelian Barang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (!empty(in_array($_SESSION['codekop_session']['akses'], [1, 6]))) { ?>
                    <li class="nav-header">Input Data</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>
                                Data Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= $baseURL; ?>barang" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $baseURL; ?>barang_kategori" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $baseURL; ?>barang_satuan" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Satuan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $baseURL; ?>supplier" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Supplier</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $baseURL; ?>pelanggan" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pelanggan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (!empty($_SESSION['codekop_session']['akses'] == 1)) { ?>
                    <li class="nav-header">Administrator</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Pengaturan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= $baseURL; ?>users" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $baseURL; ?>toko" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profil Toko</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-header">Akun</li>
                <li class="nav-item">
                    <a href="<?= $baseURL; ?>users/profil.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pt-4">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">