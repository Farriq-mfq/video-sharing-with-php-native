<?php
include('../config/config.php');
$slug = get('slug');
$query = $konek->query("SELECT * FROM likes WHERE vslug='$slug'");
$LIKES = $query->num_rows;
$konek->query("UPDATE video SET likes = '$LIKES' WHERE slug='$slug'");
echo number_format_short($LIKES);
