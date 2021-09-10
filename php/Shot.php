<?php
if (!isset($_POST['X']) || !isset($_POST['Y']) || !isset($_POST['R'])) {
    exit("At least one parameter is not assigned");
}
$x = $_POST['X'];
$y = $_POST['Y'];
$r = $_POST['R'];
echo $x."   ".$y."   ".$r;