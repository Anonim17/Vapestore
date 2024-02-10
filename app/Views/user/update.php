<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Form -->
    <div class="row">
        <div class="col-lg-10">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('/user/update_save') ?>">
                        <input type="text" class="form-control" name="id_user" placeholder="id_user" value="<?= $data['id_user'] ?>">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= $data['nama_lengkap'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Username</label>
                            <input type="text" class="form-control" type="text" name="username" placeholder="Username" value="<?= $data['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" type="text" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" type="text" name="email" placeholder="Email" value="<?= $data['nama_lengkap'] ?>" value="<?= $data['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" type="text" name="alamat" placeholder="Alamat" value="<?= $data['alamat'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="no_ho">No HP</label>
                            <input type="text" class="form-control" type="text" name="no_hp" placeholder="No HP" value="<?= $data['no_hp'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="Perempuan" <?= $data['jenis_kelamin'] === 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                <option value="Laki-laki" <?= $data['jenis_kelamin'] === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="level">Level:</label>
                            <select class="form-control" id="jenis_kelamin" name="level">
                                <option value="pelanggan" <?= $data['level'] === 'pelanggan' ? 'selected' : '' ?>>Pelanggan</option>
                                <option value="pemilik" <?= $data['level'] === 'pemilik' ? 'selected' : '' ?>>Pemilik</option>
                                <option value="admin" <?= $data['level'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                            </select>
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