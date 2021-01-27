<?php include('config/config.php') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= URL ?>/assets/vendors/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL ?>/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL ?>/assets/vendors/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= URL ?>/assets/vendors/videojs/video-js.css">



    <title>
        <?php
        if (isset($_GET['q'])) {
            switch (get('q')) {
                case 'video':
                    echo 'Video';
                    break;
                case 'view':
                    echo "View";
                    break;
                default:
                    echo 'Dashboard';
                    break;
            }
        } else {
            echo 'Dashboard';
        }
        ?>

    </title>
</head>

<body>
    <div id="header">
        <?php include('nav.php') ?>
    </div>

    <?php
    $uid = session_id();
    $select = $konek->query("SELECT * FROM visitor WHERE uid = '$uid'");
    $ip = $_SERVER['SERVER_ADDR'];
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (!$select->num_rows > 0) {
        $konek->query("INSERT INTO `visitor`(`uid`, `ip`, `useragent`) VALUES ('$uid','$ip','$useragent')");
    }
    ?>