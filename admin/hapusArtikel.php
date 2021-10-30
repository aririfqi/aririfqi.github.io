<?php 
require 'ceklogin.php';
require '../function.php';

$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM artikel WHERE id_artikel='$id'");

echo "<script> window.history.back();; </script>";

?>