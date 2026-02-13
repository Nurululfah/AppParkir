<?php
session_start();
include 'config.php';
include 'log_aktivitas.php';

$id_user = $_SESSION['id_user'];
logAktivitas($config, $id_user, "Logout dari sistem");

session_unset();
session_destroy();
header("Location: login.php?info=logout");
exit();
