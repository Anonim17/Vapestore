<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('/AdminLTE/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('AdminLTE/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="background-image: url(<?= base_url('/AdminLTE/img/bg1.jpg') ?>);">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <a class="nav-link" href="<?= base_url('/') ?>">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">HOME</span>
                        </a>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <a class="nav-link" href="<?= base_url('login') ?>">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">LOGIN</span>
                        </a>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <div class="row">
                        <?php foreach ($data as $barang) : ?>
                            <div class="col-md-4" style="width: 400px; padding-top: 10px;">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"><?php echo $barang['nama']; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('/AdminLTE/image_data/' . $barang['gambar']); ?>" alt="...">
                                        </div>
                                        <p>Deskripsi : </p>
                                        <p><?php echo $barang['keterangan']; ?></p>
                                        <p class="text-lg"><?php echo 'Rp ' . $barang['satuan_harga']; ?></p>
                                        <?php $url = 'vapenation.autosunrisemandiri.online#' . $barang['id_barang']; ?>
                                        <button class="btn btn-primary"><a href="<?= base_url('qrcode/generate/' . urlencode($url)); ?>" style="color: #ffffff;" target="_blank">QR Code</a></button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('/AdminLTE/vendor/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('/AdminLTE/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('/AdminLTE/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('/AdminLTE/js/sb-admin-2.min.js'); ?>"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url('/AdminLTE/vendor/chart.js/Chart.min.js'); ?>"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url('/AdminLTE/js/demo/chart-area-demo.js'); ?>"></script>
        <script src="<?= base_url('/AdminLTE/js/demo/chart-pie-demo.js'); ?>"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url('AdminLTE/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?= base_url('AdminLTE/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url('AdminLTE/js/demo/datatables-demo.js'); ?>"></script>
</body>

</html>