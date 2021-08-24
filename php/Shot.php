<?php
$x = intval($_POST['X']);
$y = intval($_POST['Y']);
$r = intval($_POST['R']);
echo check_shot($x, $y, $r);

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