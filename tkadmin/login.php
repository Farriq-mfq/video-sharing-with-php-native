<?php include('../config/config.php') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../assets/vendors/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.css">
    <link rel="stylesheet" href="../assets/vendors/slide/splide.min.css">
    <link rel="stylesheet" href="../assets/vendors/datatable/datatables.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Hello, world!</title>
    <style>
        .form-group {
            margin: 10px;
            padding: 10px;
        }

        .card-header {
            background-color: rgb(116, 241, 137);
        }
    </style>
</head>

<?php
if (isset($_POST['login'])) {
    $username = $konek->real_escape_string(post('username'));
    $pass = $konek->real_escape_string(post('password'));

    $query = $konek->query("SELECT * FROM usr WHERE username='$username'");
    $fetch = $query->fetch_assoc();
    $hash = $fetch['password'];
    if ($query->num_rows > 0) {
        if (password_verify($pass, $hash)) {
            //   buat session
            $_SESSION['data'] = $fetch;
            $_SESSION['login'] = true;
            redirect('./');
        }
    } else {
        $error = 'Login Gagal';
    }
}
?>

<div class="container">
    <div class="row" style="min-height:80vh">
        <div class="col-lg-5 col-md-5 col-sm-5" style="margin:auto">
            <div class="card shadow">
                <div class="card-header">
                    <h4>LOGIN TO TEKEK ADMIN</h4>
                    <?php if (isset($error)) : ?>
                        <p class="text-danger text-center"><?= $error ?></p>
                    <?php endif; ?>
                </div>
                <div class="card-body" style="padding: 30px;">
                    <form method="post">
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control" name="username" id="Username" placeholder="Username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../assets/vendors/js/jquery-3.5.1.min.js"></script>
<script src="../assets/vendors/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendors/js/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="../assets/vendors/js/bootstrap.min.js"></script>
</body>

</html>