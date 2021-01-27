<?php include('../config/config.php');
if (!$_SESSION['login']) {
    redirect('login.php');
}

?>
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

    <style>
        .mod {
            position: absolute;
            z-index: 1000;
            margin: auto;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            width: 400px;
            height: 500px;
        }

        .mod .card-header {
            display: flex;
            justify-content: space-between;
        }

        .mod .card-header .close {
            font-size: 20px;
        }

        .toggle {
            display: none;
        }

        .close {
            cursor: pointer;
        }
    </style>

    <title>
        <?php
        if (isset($_GET['page'])) {
            switch (get('page')) {
                case 'analitik':
                    echo 'Analytic';
                    break;
                case 'upload':
                    echo "Upload";
                    break;
                case 'video':
                    echo "Video";
                    break;

                default:
                    echo "Dashboard";
                    break;
            }
        } else {
            echo "Dashboard";
        } ?>
    </title>
</head>

<body>
    <div id="header">
        <div class="container">
            <?php include('layout/navbar.php') ?>
        </div>
    </div>