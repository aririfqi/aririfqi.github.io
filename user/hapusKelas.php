<?php 
require 'ceklogin.php';
require '../function.php';

$id = $_GET["id"];
if($_SESSION["role"] == 2 && !isset($_GET["user"])) {
	mysqli_query($conn, "DELETE FROM grup_belajar WHERE id_grupbelajar='$id'");
	echo "<script> window.location.href='kelas.php'; </script>"; 
} else {
	if(isset($_GET["user"])) {
		$user = $_GET["user"];
	} else {
		$user = $_SESSION["id_user"];
	}
	mysqli_query($conn, "DELETE FROM bergabung WHERE id_grupbelajar='$id' AND id_user='$user'");
	mysqli_query($conn, "DELETE FROM pengumpulan WHERE id_user='$user' AND id_tugas IN(SELECT id_tugas FROM tugas WHERE id_grupbelajar='$id')");
	if(isset($_GET["user"])) {
		echo "<script> window.history.back();; </script>"; 
	} else {
		echo "<script> window.location.href='kelas.php'; </script>"; 
	}
}

?>