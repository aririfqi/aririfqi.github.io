<?php 
require 'ceklogin.php';
require '../function.php';

$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM users WHERE id_user='$id'");

echo "<script> window.history.back();; </script>";

?>