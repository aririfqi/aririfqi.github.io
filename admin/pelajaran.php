<?php 
require 'ceklogin.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootsrap/bootstrap.css">
    <link rel="stylesheet" href="AdminCSS/materi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include('nav.php')  ?>
    <main>
        <h3>Daftar Service Disera</h3>
        <a href="buatArtikel.php"><i class="fa fa-plus-square-o" aria-hidden="true" style="font-size: 20px;"><span>Tambah</span></i></a><br>
        <div class="card" style="width: 16rem;">
            <img class="card-img-top" src="../img/mapel/logo-mapel-ipa-fisika.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Ganti Oli</h5>
              <a href="babpelajaran.php" class="btn btn-primary">Ganti oli dengan pelayanan terbaik</a><a href="" class="btn btn-danger">Hapus</a>
            </div>
          </div>
    </main>
</body>
</html>