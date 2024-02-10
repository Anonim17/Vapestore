<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php $total_harga = 0; ?>
    <?php $id_itk = array(); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Barang yang akan Dibeli!</h6>
            <?php if (!empty(session()->getFlashdata('notif'))) : ?>
                <div class="alert alert-warning">
                    <p>
                        <?= session()->getFlashdata('notif'); ?>
                    </p>
                </div>
            <?php endif; ?>
            <hr>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $barang) : ?>
                            <tr>
                                <td><?php echo $barang['nama']; ?></td>
                                <td><?php echo $barang['jumlah']; ?></td>
                                <td><?php echo $barang['jumlah'] * $barang['satuan_harga'] ?></td>
                                <td>
                                    <a href="<?= base_url('/pembayaran/delete_barang/' . $barang['id_itk']) ?>" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $total_harga += $barang['jumlah'] * $barang['satuan_harga']; ?>
                            <?php array_push($id_itk, $barang['id_itk']); ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Total Harga : <?php echo $total_harga; ?></h6>
            <?php $data_url = http_build_query(array('id_itk' => $id_itk)); ?>
            <hr>
            <a href="<?= base_url('/pembayaran/bayar?total_harga=' . $total_harga . '&' . $data_url) ?>" class="btn btn-success btn-icon-split">
                <span class="text">Bayar</span>
            </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>