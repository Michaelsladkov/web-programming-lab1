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
draw_output();

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
    define("b", "<td>");
    define("e", "</td>");
    define("s", "</td><td>");
    return b.$x.s.$y.s.$r.s.
        date("G:i:s d-m-Y",  time() - $_GET['date'] * 60).s.
        (round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 6)).
        s.($success ? "попал" : "не попал").e.PHP_EOL;
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

function draw_output() {
    $begin = file_get_contents("../html/output_template_begin.html");
    $end = file_get_contents("../html/output_template_end.html");
    $storage = fopen("../storage", "r");
    $records = [];
    while (!feof($storage)) {
        array_push($records, fgets($storage));
    }
    echo $begin;
    $length = count($records);
    for ($i = 0; $i < $length; $i++) {
        echo "<tr>";
        echo $records[$length - $i - 1];
        echo "</tr>";
    }
    echo $end;
}