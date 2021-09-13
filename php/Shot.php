<?php
if (!isset($_POST['X']) || !isset($_POST['Y']) || !isset($_POST['R'])) {
    exit("At least one parameter is not assigned");
}
$x = $_POST['X'];
$y = $_POST['Y'];
$r = $_POST['R'];
validate($x, $y, $r);
$out = fopen("../storage", "a");
fwrite($out, process_shot($x, $y, $r));
fclose($out);
echo process_shot();

function validate($x, $y, $r) {
    if (is_nan($x)) {
        exit("X не число");
    }
    $x_num = floatval($x);
    if ($x_num > 3 || $x_num < (-5)) {
        exit("Число Х должно принадлежать отрезку (-5 ... 3)");
    }
    if (is_nan($y)) {
        exit("Y не число");
    }
    if (is_nan($r)) {
        exit("R не число");
    }
}

function process_shot($x, $y, $r) {
    $x_num = floatval($x);
    $y_num = intval($y);
    $r_num = intval($r);
    $success = check_shot($x_num, $y_num, $r_num);
    $time = date("G:i:s d-m-Y",  time() - $_GET['date'] * 60);
    $executionTime = round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 6);
    return '{"X":"' . $x . '","Y":"' . $y . '","R":"' . $r . '","now":"' . $time
        . '","execution":"' . $executionTime . '","result":' . ($success ? "попал" : "не попал"). '}';
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