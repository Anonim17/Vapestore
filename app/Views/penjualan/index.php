<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Managemen User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Pembeli</th>
                            <th>Nomor Invoice</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = 0; ?>
                        <?php foreach ($data as $total_barang) : ?>
                            <tr>
                                <td><?= $data[$index][0]['nama_lengkap'] ?></td>
                                <td><?= $data[$index][0]['id_tk'] ?></td>
                                <td>Rp <?= $data[$index][0]['total_bayar'] ?></td>
                                <td><?= $data[$index][0]['status'] ?> </td>
                                <td>
                                    <a href="<?= base_url('/pembayaran/status?id_tk='.$data[$index][0]['id_tk']) .'&status=menunggu'?>" class="btn btn-danger btn-circle">
                                        <i class="fas fa-times"></i>
                                    </a>
                                    <a href="<?= base_url('/pembayaran/status?id_tk='.$data[$index][0]['id_tk']) .'&status=lunas'?>" class="btn btn-success btn-circle">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $index += 1; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>