<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('/AdminLTE/img/icon1.png') ?>" alt="Deskripsi gambar" style="width: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3">Vapestore</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php if (session()->get('level') == 'pelanggan') : ?>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('/dashboard') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <li class="nav-item active">
            <a class="nav-link" href="/pembayaran/index">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Data Pembayaran</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active">
            <a class="nav-link" href="/logout">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Logout</span></a>
        </li>

    <?php endif; ?>

    <?php if (session()->get('level') == 'admin') : ?>

        <!-- Nav Item - Dashboard -->

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <li class="nav-item active">
            <a class="nav-link" href="/barang/index">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Data Barang</span></a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Transaksi</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Transaksi:</h6>
            
                    <a class="collapse-item" href="/penjualan/index">Data Penjualan</a>
                </div>
            </div>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/user/index">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Managemen User</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active">
            <a class="nav-link" href="/logout">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Logout</span></a>
        </li>

    <?php endif; ?>

    <?php if (session()->get('level') == 'pemilik') : ?>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('/dashboard') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <li class="nav-item active">
            <a class="nav-link" href="/barang/index">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Data Barang</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="/user/index">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Managemen User</span></a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Transaksi</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Transaksi:</h6>

                    <a class="collapse-item" href="/penjualan/index">Data Penjualan</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active">
            <a class="nav-link" href="/logout">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Logout</span></a>
        </li>

    <?php endif; ?>

</ul>
<!-- End of Sidebar -->