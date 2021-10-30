<?php 
require 'ceklogin.php';
require '../function.php';

$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM grup_belajar WHERE id_grupbelajar='$id'");

echo "<script> window.history.back();; </script>";

?>