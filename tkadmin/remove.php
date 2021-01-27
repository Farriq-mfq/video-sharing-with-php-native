<?php
include('../config/config.php');
$id = $_GET['id'];
$select = $konek->query("SELECT * FROM video WHERE id='$id'");
$video = $select->fetch_assoc();
$slug = $video['slug'];
$query = $konek->query("DELETE FROM video WHERE id='$id'");
if ($query) {
    unlink('../assets/image/' . $video['thumbnail']);
    unlink('../assets/video/' . $video['video']);
    $konek->query("DELETE FROM likes WHERE vslug ='$slug'");
    $konek->query("DELETE FROM viewer WHERE vslug ='$slug'");
    $konek->query("DELETE FROM download WHERE vslug ='$slug'");
}
redirect('index.php?page=video');
