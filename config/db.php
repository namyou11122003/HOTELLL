<?php
$localhost = "localhost";
$root = "root";
$password = "";
$dbname = "hotel";

$con = new mysqli($localhost, $root, $password, $dbname);

if (!$con) {
    echo "something wen't worong ";
}

?>