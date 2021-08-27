<?php
if (!isset($_POST['X']) || !isset($_POST['Y']) || !isset($_POST['R'])) {
    exit("At least one parameter is not assigned");
}
$x = floatval($_POST['X']);
$y = intval($_POST['Y']);
$r = intval($_POST['R']);

function process_shot($x, $y, $r) {

}

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