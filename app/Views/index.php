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
                <form method="post" action="<?= base_url('/login') ?>">
                    <!-- Email input -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" name="username" class="form-control" />
                    </div>

                    <!-- Password input -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="<?= base_url('/register') ?>">Register</a></p>
                    </div>
                </form>
                <?php if (!empty(session()->getFlashdata('notif'))) : ?>
                    <div class="alert alert-warning">
                        <p>
                            <?= session()->getFlashdata('notif'); ?>
                        </p>
                    </div>
                <?php endif; ?>
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