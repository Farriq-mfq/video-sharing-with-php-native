<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header shadow">
                    <h4 class="text-center">Video list</h4>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-11">
                                <input type="text" class="form-control" name="search" placeholder="cari video" id="srcv">
                            </div>
                            <div class="col-md-1">
                                <button class="btn shadow">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <?php
                        if (isset($_POST['search'])) {
                            $search = post('search');
                            $query = $konek->query("SELECT * FROM video WHERE judul LIKE '%$search%'");
                        } else {
                            $query = $konek->query("SELECT * FROM video");
                        }
                        ?>
                        <?php if (isset($_POST['search']) && !empty($_POST['search'])) : ?>
                            <h4>Search : <?= $search ?></h4>
                        <?php endif; ?>
                        <?php foreach ($query as $videos) :  ?>
                            <div class="col-md-3 col-6 mt-3" id="colv">
                                <div class="card">
                                    <img src="../assets/image/<?= $videos['thumbnail'] ?>" class="card-img-top" alt="...">
                                    <p class="mt-2 card-text" style="margin-bottom: -1px;">
                                        <?= $videos['judul'] ?>
                                    </p>
                                    <div class="body__content" style="justify-content: space-around;">
                                        <a href="remove.php?id=<?= $videos['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ? ')" style="width: 80px;">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <button type="button" class="btn btn-primary" style="width: 80px;" id="btn__add__link">
                                            <i class="fa fa-download"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="add_link" class="toggle">
                                    <form id="sub__link" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control mt-2" placeholder="paste link" name="link" value="<?= $videos['download_link'] ?>" id="link">
                                            <input type="hidden" name="id_dwn" value="<?= $videos['id'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-info">
                                                <i class=" fa fa-share"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>