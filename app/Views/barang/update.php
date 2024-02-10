<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Form -->
    <div class="row">
        <div class="col-lg-10">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Barang</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('/barang/update_save') ?>" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id_barang" placeholder="id_barang" value="<?= $data['id_barang'] ?>">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama" value="<?= $data['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="image">Pilih Gambar:</label>
                            <input type="file" name="image" accept="image/*" class="form-control-file" value="<?= $data['gambar'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="Satuan Barang">Satuan Barang</label>
                            <input type="text" class="form-control" name="satuan_barang" placeholder="Satuan Barang" value="<?= $data['satuan_barang'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="Satuan Harga">Satuan Harga</label>
                            <input type="text" class="form-control" name="satuan_harga" placeholder="Satuan Harga" value="<?= $data['satuan_harga'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="Keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?= $data['keterangan'] ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- End Form -->
</div>

<?= $this->endSection(); ?>