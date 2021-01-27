<?php
require('function.php');
session_start();
$url = 'http://localhost/tekek';
define('URL', $url);
$host = 'localhost';
$user = 'root';
$pass = '';
$DB = 'tekek';
$konek = new mysqli($host, $user, $pass, $DB);
