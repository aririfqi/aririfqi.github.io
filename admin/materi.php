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
        <h3>Materi Edin</h3>
        <?php for($i=0;$i<6;$i++) : ?>
        <div class="card" style="width: 16rem;">
            <img class="card-img-top" src="../img/mapel/logo-mapel-ipa-fisika.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Kelas <?= $i+7; ?></h5>
              <a href="pelajaran.php?id=<?= $i+7; ?>" class="btn btn-primary">Mata Pelajaran</a>
            </div>
        </div>
        <?php endfor; ?>
    </main>
    
</body>
</html>