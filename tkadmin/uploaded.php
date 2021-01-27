<?php

include('../config/config.php');

$judul = $konek->real_escape_string(post('judul'));
$deskripsi = $konek->real_escape_string(post('deskripsi'));
$name = $konek->real_escape_string($_FILES['video']['name']);
$thumb = $_POST['thumbnail'];
$dirT = '../assets/image/';
$dirV = '../assets/video/';
$tmp = $_FILES['video']['tmp_name'];
// validate video 
$x = explode('.', $name);
$nameThumb = $x[0] . '.png';
$extensi = strtolower(end($x));
$ex = array('avi', 'mp4', 'mpg', '3gp', 'mkv');
$slug = slug($judul);
$select = $konek->query("SELECT * FROM video WHERE judul = '$judul' OR video='$name'");
$rows = $select->num_rows;
$user = $_SESSION['data']['nama'];
if (in_array($extensi, $ex)) {
    if ($rows > 0) {
        $res = array('error' => 'Video sudah ada');
    } else {
        $query = $konek->query("INSERT INTO `video`(`judul`, `deskripsi`, `by_name`, `video`, `thumbnail`,`slug`) VALUES ('$judul','$deskripsi','$user','$name','$nameThumb','$slug')");
        if ($query) {
            move_uploaded_file($tmp, $dirV . $name);
            file_put_contents($dirT . $x[0] . '.png', file_get_contents($thumb));
            $res =  array('success' => 'Success Upload Video');
        }
    }
} else {
    $res = array('error' => 'Snap !');
}
echo json_encode($res);
