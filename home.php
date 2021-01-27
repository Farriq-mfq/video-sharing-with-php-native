<div class="container">
    <div class="row mt-4">
        <div class="header__content">
            <h4>
                Terbaru
            </h4>
            <div class="search">
                <a href="<?= URL ?>/page/video">View All</a>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <?php $query = $konek->query("SELECT * FROM video ORDER BY id DESC LIMIT 8") ?>
                <?php foreach ($query as $videos) : ?>
                    <div class="col-md-3 col-6 mt-4">
                        <div class="card">
                            <a href="<?= URL ?>/page/view/<?= $videos['slug'] ?>">
                                <img src="<?= URL ?>/assets/image/<?= $videos['thumbnail'] ?>" class="card-img-top">
                            </a>
                            <div class="body__content">
                                <a href="<?= URL ?>/page/view/<?= $videos['slug'] ?>" class="title__videos">
                                    <?= $videos['judul'] ?>
                                </a>
                                <p class="uploaded__by mt-2 mb-1">
                                    By <?= $videos['by_name'] ?>
                                </p>
                                <p class="uploaded__by">
                                    <?= timeago($videos['created_at']) ?>
                                </p>
                                <div class="videos__info">
                                    <div class="likes">
                                        <i class="fa fa-thumbs-up"></i>
                                        <span><?= $videos['likes'] ?></span>
                                    </div>
                                    <div class="views">
                                        <i class="fa fa-eye"></i>
                                        <span><?= $videos['viewer'] ?></span>
                                    </div>
                                    <div class="comments">
                                        <i class="fa fa-download"></i>
                                        <span> <?= number_format_short($videos['download']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>