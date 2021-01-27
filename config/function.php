<?php


function get($val)
{
    return htmlspecialchars(trim($_GET[$val]));
}
function post($val)
{
    return htmlspecialchars($_POST[$val]);
}


function redirect($url)
{
    header('Location:' . $url);
}
function slug($text)
{
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}
function number_format_short($n, $precision = 1)
{
    if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = '';
    } else if ($n < 900000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
        $suffix = 'K';
    } else if ($n < 900000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
        $suffix = 'M';
    } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        $suffix = 'B';
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
        $suffix = 'T';
    }

    // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
    // Intentionally does not affect partials, eg "1.50" -> "1.50"
    if ($precision > 0) {
        $dotzero = '.' . str_repeat('0', $precision);
        $n_format = str_replace($dotzero, '', $n_format);
    }

    return $n_format . $suffix;
}
function timeago($timestamp)
{
    $time_ago        = strtotime($timestamp);
    $current_time    = time();
    $time_difference = $current_time - $time_ago;
    $seconds         = $time_difference;

    $minutes = round($seconds / 60); // value 60 is seconds
    $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
    $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
    $weeks   = round($seconds / 604800); // 7*24*60*60;
    $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
    $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    if ($seconds <= 60) {

        return "baru saja";
    } else if ($minutes <= 60) {

        if ($minutes == 1) {

            return "1 menit yang lalu";
        } else {

            return "$minutes menit yang lalu";
        }
    } else if ($hours <= 24) {

        if ($hours == 1) {

            return "1 jam yang lalu";
        } else {

            return "$hours jam yang lalu";
        }
    } else if ($days <= 7) {

        if ($days == 1) {

            return "kemarin";
        } else {

            return "$days hari yang lalu";
        }
    } else if ($weeks <= 4.3) {

        if ($weeks == 1) {

            return "1 minggu yang lalu";
        } else {

            return "$weeks weeks yang lalu";
        }
    } else if ($months <= 12) {

        if ($months == 1) {

            return "1 bulan yang lalu";
        } else {

            return "$months bulan yang lalu";
        }
    } else {

        if ($years == 1) {

            return "1 tahun yang lalu";
        } else {

            return "$years tahun yang lalu";
        }
    }
}
