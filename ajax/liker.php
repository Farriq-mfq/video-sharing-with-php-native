<?php
include('../config/config.php');
$slug = post('slug');
$uid = session_id();
$select = $konek->query("SELECT * FROM likes WHERE uid = '$uid' AND vslug='$slug'");
if (!$select->num_rows > 0) {
    $konek->query("INSERT INTO `likes`(`vslug`, `uid`) VALUES ('$slug','$uid')");
};
