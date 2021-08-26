<?php
$x = floatval($_POST['X']);
$y = intval($_POST['Y']);
$r = intval($_POST['R']);
echo $x.' '.$y.' '.$r.'<br>';
echo check_shot($x, $y, $r) ? 'true' : 'false';

function check_shot($x, $y, $r) {
    if ($x >= 0) {
        if ($y >= 0) {
            return $x * $x + $y * $y <= $r * $r;
        }
        else {
            return $r + $y <= $x;
        }
    }
    else {
        if ($y > 0) {
            return false;
        }
        else {
            return $x >= (-$r) && $y >= (-$r) / 2;
        }
    }
}