<?php include('layouts/header.php') ?>
</div>
<div id="section">
  <?php
  if (isset($_GET['q'])) {
    switch (get('q')) {
      case 'video':
        include('video.php');
        break;
      case 'view':
        include('view.php');
        break;
      default:
        include('home.php');
        break;
    }
  } else {
    include('home.php');
  }
  ?>
</div>
<?php include('layouts/footer.php') ?>