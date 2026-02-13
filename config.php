<?php
$host       = "localhost";
$username   = "root";
$password   = "";
$db         = "db_parkir";

$config = mysqli_connect($host, $username, $password, $db);

if(!$config){
    die("Koneksi Gagal : " . mysqli_connect_error());

} else {
    echo "";
}

?>