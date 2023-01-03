<?php

if (!isset($_SESSION)) {
    session_start();
}
session_destroy();
$url = 'login.php';
header("Location: " . "$url");
?>
