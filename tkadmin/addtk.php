<?php

include('../config/config.php');
error_reporting(0);
$name = $konek->real_escape_string(post('name'));
$username = $konek->real_escape_string(post('username'));
$role = $konek->real_escape_string(post('role'));
$pass = password_hash($konek->real_escape_string(trim(post('pass'))), PASSWORD_DEFAULT);

if (strlen($name) < 5 || strlen($username) < 5) {

    echo 'tidak sesuai rules';
} else {

    $SELECT = $konek->query("SELECT * FROM usr WHERE username ='$username'");
    if ($SELECT->num_rows > 0) {
        echo 'data sudah ada';
    } else {
        $query = $konek->query("INSERT INTO `usr`(`nama`, `username`, `password`, `role`) VALUES ('$name','$username','$pass','$role')");
        echo 'successfuly';
    }
}
