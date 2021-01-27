<?php
include('../config/config.php');
$slug = get('slug');
$query = $konek->query("SELECT * FROM download WHERE vslug='$slug'");
$download = $query->num_rows;
$konek->query("UPDATE video SET download = '$download' WHERE slug='$slug'");
echo number_format_short($download);
