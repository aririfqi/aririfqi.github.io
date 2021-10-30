<?php 
session_start();

if(!isset($_SESSION["login"])) {
    echo "<script> window.location.href='../login.php'; </script>";
    exit;
}

if($_SESSION["role"] != 1) {
    echo "<script> window.location.href='../index.php'; </script>";
    exit;
}

?>