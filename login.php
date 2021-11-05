<?php 
require 'function.php';

if(isset($_SESSION["login"])) {
	echo "<script> window.location.href='index.php'; </script>";
}

if(isset($_POST["login"])) {
	if(login($_POST) > 0) {
		if($_SESSION["role"] == 1) {
			echo "<script> window.location.href='admin/dashboard.php'; </script>";
		} else {
			echo "<script> window.location.href='index.php'; </script>";
		}
	} else {
		$alert = "&#x24E7; Login gagal!";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>DISERA Login</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="penutup">
		<div class="login">
		<form form action="" method="POST">
			<a style="text-decoration:none;color:#09246C;" href="index.php">
				<h2>DISERA</h2>
				<h3>Digital Service App</h3>
			</a>
			<?php if(isset($alert)):  ?>
			
			<h3 class="alert"><?= $alert ?>
			<?php endif;  ?>
			
			</h3>
			<!-- <p class="wellcome">Selamat Datang di Edin!</p> -->
			<input type="email" placeholder="Email" name="email" id="email"><br>
			<input type="password" placeholder="Kata Sandi" name="password" id="kataSandi"><br>
			<button type="submit" name="login">Masuk</button>
			<p>Lupa Password?</p>
			<p>Belum Memliki akun? <a href="buatAkun.php">Bergabung</a></p>
			<p class="cpr">&copy; 2021 Disera. All rights reserved.</p>
		</form>
		
		</div>
	</div>
</body>
</html>
