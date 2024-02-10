<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            <?php if (!empty(session()->getFlashdata('notif'))) : ?>
                <div class="alert alert-warning">
                    <p>
                        <?= session()->getFlashdata('notif'); ?>
                    </p>
                </div>
            <?php endif; ?>
            <hr>
            <a href="/barang/create" class="btn btn-success btn-icon-split">
                <span class="text">Tambah Data</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Satuan Barang</th>
                            <th>Satuan Harga</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $barang) : ?>
                            <tr>
                                <td><?php echo $barang['nama']; ?></td>
                                <td><img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: auto;" src="<?= base_url('AdminLTE/image_data/' . $barang['gambar']); ?>" alt="..."></td>
                                <td><?php echo $barang['satuan_barang']; ?></td>
                                <td><?php echo $barang['satuan_harga']; ?></td>
                                <td><?php echo $barang['keterangan']; ?></td>

                                <td>
                                    <a href="<?= base_url('/barang/delete/'.$barang['id_barang'])?>" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="<?= base_url('/barang/update/'.$barang['id_barang'])?>" class="btn btn-warning btn-circle">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>