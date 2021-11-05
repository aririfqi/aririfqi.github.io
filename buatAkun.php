<?php 

require 'function.php';

if(isset($_SESSION["login"])) {
    echo "<script>window.location.href='index.php';</script>";
}

if(isset($_POST["submit"])) {
	if(daftar($_POST) > 0) {
		echo "
			<script>
				alert('Pendaftaran Sukses!');
                window.location.href='login.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Pendaftaran Gagal!');
			</script>
		";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join DISERA</title>
    <link rel="stylesheet" href="css/reset.css" />
    <!-- <link rel="stylesheet" href="css/buatAkun.css"> -->
    <link rel="stylesheet" href="css/registrasi.css">
</head>
<body>
    <section class="sign">
        <div class="gambar">
        </div>
        <div class="daftar">
            <div class="daftarContainer">
                <h2>Welcome To DISERA!</h2>
            <p>Digital Service App</p>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="username">Nama : </label>
                <input type="text" id="username" name="username" placeholder="nama" required>
            
            
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" placeholder="email" required>

                <label for="password">Kata Sandi : </label>
                <input type="password" id="password" name="password" placeholder="password" required>
                        
                <label for="password2">Ulangi Kata Sandi : </label>
                <input type="password" id="password2" name="password2" placeholder="password" required>
                
                <div class="radio">
                    <label for="status">Status : </label>
                    <input type="radio" id="siswa" name="status" value="3" required>
                    <label for="siswa">Pelanggan</label>
                    <input type="radio" id="guru" name="status" value="2" required>
                    <label for="guru">Bengkel</label>
                    <br>
                   
                </div>

                <label for="sekolah">Alamat : </label>
                    <input type="text" id="sekolah" name="sekolah" placeholder="Alamat Anda">
                <label for="gambar">Foto : </label>
                <input type="file" name="gambar" id="gambar">
            
                <button type="submit" name="submit">Daftar</button>
            </form>
            </div>
        </div>
    </section>
</body>
</html>