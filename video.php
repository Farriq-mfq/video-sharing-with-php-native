<div class="container">
  <div class="row mt-4">
    <div class="header__content">
      <h4>
        Video
      </h4>
      <div class="search">
        <form class="d-flex" method="get" action="<?= URL ?>/page/video/search">
          <input class="form-control me-2 form__search" name="cari" id="form__search" type="search" placeholder="Cari Video lain" aria-label="Search">
        </form>
      </div>
    </div>
    <div class="content">
      <div id="search__val" class="mt-2" style="margin-bottom: -20px;">
        <h3></h3>
      </div>
      <div class="row">
        <?php $query = $konek->query("SELECT * FROM video") ?>
        <?php foreach ($query as $video) : ?>
          <div class="col-md-3 col-6 mt-4" id="colVidee">
            <div class="card">
              <a href="<?= URL ?>/page/view/<?= $video['slug'] ?>">
                <img src="<?= URL ?>/assets/image/<?= $video['thumbnail'] ?>" class="card-img-top">
              </a>
              <div class="body__content">
                <a href="<?= URL ?>/page/view/<?= $video['slug'] ?>" class="title__videos">
                  <?= $video['judul'] ?>
                </a>
                <p class="uploaded__by mt-2 mb-1">
                  By <?= $video['by_name'] ?>
                </p>
                <p class="uploaded__by">
                  <?= timeago($video['created_at']) ?>
                </p>
                <div class="videos__info">
                  <div class="likes">
                    <i class="fa fa-thumbs-up"></i>
                    <span><?= number_format_short($video['likes']) ?></span>
                  </div>
                  <div class="views">
                    <i class="fa fa-eye"></i>
                    <span><?= number_format_short($video['viewer']) ?></span>
                  </div>
                  <div class="comments">
                    <i class="fa fa-download"></i>
                    <span>
                      <?= number_format_short($video['download']) ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>