<?php
include('../config/config.php');
session_destroy();
redirect('login.php');
