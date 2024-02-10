<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->

<!-- DataTales Example -->
<div class="container-fluid">
    <div class="row">
        <?php $index = 0; ?>
        <?php foreach ($data as $total_barang) : //dd($data);
        ?>
            <div class="col-md-4" style="width: 400px; padding-top: 10px;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo 'Transaksi #' . $index ?></h6>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <p>Status : <?= $data[$index][0]['status'] ?></p>
                        <p>Invoice : <?= $data[$index][0]['id_tk'] ?></p>
                        <p><img class="img-fluid px-3 px-sm-4 mt-3 mb-4" src="<?= base_url('AdminLTE/image_data/qr1.jpg') ?>" alt="Untuk Pembayaran!" ></p>
                        <p>List Barang :</p>
                        <?php foreach ($total_barang as $barang) : ?>
                            <a href="#" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text"><?= $barang['nama'] .' x ' . $barang['jumlah'] . ' = ' . $barang['jumlah']*$barang['satuan_harga'] ?></span>
                            </a>
                            <hr>
                        <?php endforeach; ?>
                        <p class="btn-danger">Total : <?= $data[$index][0]['total_bayar'] ?></p>
                    </div>
                </div>
            </div>
            <?php $index += 1; ?>
        <?php endforeach; ?>
    </div>
</div>

<!-- /.container-fluid -->
<?= $this->endSection(); ?>