<nav class="navAdm">
    <ul class="nav mt-3 shadow">
        <?php if ($_SESSION['data']['role'] == 'dev') : ?>
            <li class="nav-item">
                <button class="btn btn-info nav-link" id="add">
                    <i class="fa fa-plus"></i>
                </button>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link active" href="./">Home</a>
        </li>
        <?php if ($_SESSION['data']['role'] == 'dev') : ?>
            <li class="nav-item">
                <a class="nav-link" href="?page=analitik">Analytic</a>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link" href="?page=upload">Upload</a>
        </li>
        <?php if ($_SESSION['data']['role'] == 'dev') : ?>
            <li class="nav-item">
                <a class="nav-link" href="?page=video">Video</a>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link btn btn-danger" href="logout.php"> <i class="fa fa-sign-out-alt"></i></a>
        </li>
    </ul>
</nav>
<?php if ($_SESSION['data']['role'] == 'dev') : ?>
    <div class="mod toggle">
        <div class="card shadow">
            <div class="card-header">
                <h6>Tambah kan admin</h6>
                <div class="close">&times;</div>
            </div>
            <div class="card-body">
                <div id="al">

                </div>
                <form method="post" id="add_tk">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" required placeholder="Nama">
                        <span>Harus lebih dari 5</span>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" required placeholder="Username">
                        <span>Harus lebih dari 5</span>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="text" class="form-control" name="pass" required placeholder="Password">
                        <span>Harus lebih dari 5</span>
                    </div>
                    <div class="form-group">
                        <label for="pass">Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="dev">Developer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah kan admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>