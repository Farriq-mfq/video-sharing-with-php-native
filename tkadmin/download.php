<?php
include('../config/config.php');

$link = post('link');

$id = post('id_dwn');
if (!empty($link)) {
    $konek->query("UPDATE video SET download_link='$link' WHERE id='$id'");
}
