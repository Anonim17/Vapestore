<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->

<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card-header py-3">
        <?php if (!empty(session()->getFlashdata('notif'))) : ?>
            <div class="alert alert-warning">
                <p>
                    <?= session()->getFlashdata('notif'); ?>
                </p>
            </div>
        <?php endif; ?>
        <a href="<?= base_url('/pembayaran/checkout'); ?>" class="btn btn-success">Checkout</a>
        <br>
    </div>
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

                        <!-- Form untuk tambah jumlah barang -->
                        <form method="post" action="<?= base_url('/pembayaran/tambah_barang') ?>">
                            <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
                            <input type="hidden" name="id_pembeli" value="<?= session('user_id'); ?>">
                            <div class="form-group">
                                <label for="jumlah">Jumlah Barang:</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" value="1" min="1">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Barang</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- /.container-fluid -->
<?= $this->endSection(); ?>