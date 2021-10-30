<?php 
require 'ceklogin.php';
require '../function.php';

$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM diskusi WHERE id_diskusi='$id'");

echo "<script> window.history.back();; </script>";

?>