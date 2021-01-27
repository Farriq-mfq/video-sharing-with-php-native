<?php
include('../config/config.php');
$slug = get('slug');
$query = $konek->query("SELECT * FROM viewer WHERE vslug='$slug'");
$viewer = $query->num_rows;
$konek->query("UPDATE video SET viewer = '$viewer' WHERE slug='$slug'");
echo number_format_short($viewer);
