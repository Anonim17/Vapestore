<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="padding-top: 5%;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="<?= base_url('/create_akun') ?>">
                    <!-- Email input -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" />
                    </div>

                    <!-- Password input -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="Nama Lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" name="email" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor Telepon</label>
                        <input type="text" name="no_hp" class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="level" value="pelanggan" />
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="perempuan">Perempuan</option>
                            <option value="laki-laki">Laki-laki</option>
                        </select>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>