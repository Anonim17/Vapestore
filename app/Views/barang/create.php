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
                    <form method="post" action="<?= base_url('/barang/store') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="image">Pilih Gambar:</label>
                            <input type="file" name="image" accept="image/*" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="Satuan Barang">Satuan Barang</label>
                            <input type="text" class="form-control" name="satuan_barang" placeholder="Satuan Barang">
                        </div>
                        <div class="form-group">
                            <label for="Satuan Harga">Satuan Harga</label>
                            <input type="text" class="form-control" name="satuan_harga" placeholder="Satuan Harga">
                        </div>
                        <div class="form-group">
                            <label for="Keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
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