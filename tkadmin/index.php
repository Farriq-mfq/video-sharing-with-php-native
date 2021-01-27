<?php include('layout/header.php');

?>
<div id="section">
    <?php
    if ($_SESSION['data']['role'] == 'dev') {
        if (isset($_GET['page'])) {
            switch (get('page')) {
                case 'analitik':
                    include('analitik.php');
                    break;
                case 'upload':
                    include('upload.php');
                    break;
                case 'video':
                    include('video.php');
                    break;
                case 'search':
                    include('search.php');
                    break;

                default:
                    include('home.php');
                    break;
            }
        } else {
            include('home.php');
        }
    } else {
        if (isset($_GET['page'])) {
            switch (get('page')) {
                case 'upload':
                    include('upload.php');
                    break;

                default:
                    include('home.php');
                    break;
            }
        } else {
            include('home.php');
        }
    }
    ?>
</div>
<?php include('layout/footer.php') ?>