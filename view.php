<?php
$slug = get('slug');
if (!empty($slug)) {
    $query = $konek->query("SELECT * FROM video WHERE slug = '$slug'");
    if ($query->num_rows > 0) {
        $videos = $query->fetch_assoc();
    } else {
        redirect(URL);
    }
} else {
    redirect(URL);
}
$uid = session_id();
$select = $konek->query("SELECT * FROM viewer WHERE uid = '$uid' AND vslug='$slug'");
$v = $konek->query("SELECT * FROM viewer WHERE vslug='$slug'");
$viewer = $v->num_rows;
if (!$select->num_rows > 0) {
    $konek->query("INSERT INTO `viewer`(`vslug`, `uid`) VALUES ('$slug','$uid')");
};
$konek->query("UPDATE video SET viewer = '$viewer' WHERE slug='$slug'");



?>
<div class="container">
    <div class="row mt-3 ">
        <div class="col-md-9">
            <video id="my_video_1" class="video-js vjs-default-skin" width="100%" height="auto" controls preload="none" poster='<?= URL ?>/assets/image/<?= $videos['thumbnail'] ?>' data-setup='{ "aspectRatio":"640:300", "playbackRates": [1, 1.5, 2] }'>
                <source src="<?= URL ?>/assets/video/<?= $videos['video'] ?>" type='video/mp4' />
            </video>
            <div class="video__details">
                <h5><?= $videos['judul'] ?></h5>
                <p class="uploaded__by"> <?= timeago($videos['created_at']) ?></p>
                <div class="videos__full__details">
                    <div class="likes" id="like" data-slug="<?= $videos['slug'] ?>">
                        <i class="fa fa-thumbs-up"></i>
                        <span>0</span>
                    </div>
                    <div class="comments" id="download" data-slug="<?= $videos['slug'] ?>">
                        <i class="fa fa-download"></i>
                        <span>0</span>
                    </div>
                    <div class="views" id="views" data-slug="<?= $videos['slug'] ?>">
                        <i class="fa fa-eye"></i>
                        <span>0</span>
                    </div>
                    <a href="<?= $videos['download_link'] ?>" id="download" style="margin-left:5px;text-decoration:none" data-slug="<?= $videos['slug'] ?>">
                        Download
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <p>
                <?= $videos['deskripsi'] ?>
            </p>
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <div class="header__content">
            <h4>
                Related video
            </h4>
        </div>
        <div class="content mb-5">
            <div class="row">
                <?php
                $jdl = $videos['judul'];
                $qr = $konek->query("SELECT * FROM video WHERE judul LIKE '%$jdl%'");
                ?>
                <?php foreach ($qr as $related) : ?>
                    <div class="col-md-3 col-6 mt-4">
                        <div class="card">
                            <a href="<?= URL ?>/page/view/<?= $related['slug'] ?>">
                                <img src="<?= URL ?>/assets/image/<?= $related['thumbnail'] ?>" class="card-img-top">
                            </a>
                            <div class="body__content">
                                <a href="<?= URL ?>/page/view/<?= $related['slug'] ?>" class="title__videos">
                                    <?= $related['judul'] ?>
                                </a>
                                <p class="uploaded__by">
                                    <?= $related['by_name'] ?>
                                </p>
                                <div class="videos__info">
                                    <div class="likes">
                                        <i class="fa fa-thumbs-up"></i>
                                        <span><?= $related['likes'] ?></span>
                                    </div>
                                    <div class="views">
                                        <i class="fa fa-eye"></i>
                                        <span><?= $related['viewer'] ?></span>
                                    </div>
                                    <div class="comments">
                                        <i class="fa fa-download"></i>
                                        <span> <?= number_format_short($related['download']) ?></span>
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