<?php 
require 'ceklogin.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootsrap/bootstrap.css">
    <link rel="stylesheet" href="AdminCSS/dashboard.css">
    <!-- <link rel="stylesheet" href="AdminCSS/user.css">
    <link rel="stylesheet" href="AdminCSS/kelas.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
    <?php include('nav.php')  ?>
    <main>
        <h1>Selamat Datang Admin, <?= $_SESSION["username"]; ?></h1>
        <!-- <h2>Mulai Buat Perubahan</h2> -->
        <a href="user.php">
        <div class="card" style="width: 200px;">
            <div class="card-body text-center">
            <i class="fa fa-users" aria-hidden="true" style="font-size: 120px;color: #09246C;"></i>
             <h5 style="color: #09246C;">User</h5>
            </div>
        </div></a>
        <a href="materi.php">
        <div class="card" style="width: 200px;">
            <div class="card-body text-center">
            <i class="fa fa-book" aria-hidden="true" style="font-size: 120px;color: #09246C;"></i>
             <h5 style="color: #09246C;">Materi</h5>
            </div>
        </div></a>
        <a href="kelas.php">
        <div class="card" style="width: 200px;">
            <div class="card-body text-center">
            <i class="fab fa-chromecast" style="font-size: 120px;color: #09246C;"></i>
             <h5 style="color: #09246C;">Kelas</h5>
            </div>
        </div></a>
        <a href="artikel.php">
        <div class="card" style="width: 200px;">
            <div class="card-body text-center">
            <i class="far fa-newspaper" aria-hidden="true" style="font-size: 120px;color: #09246C;"></i>
             <h5 style="color: #09246C;">Artikel</h5>
            </div>
        </div></a>
        <a href="forum.php">
        <div class="card" style="width: 200px;">
            <div class="card-body text-center">
            <i class="far fa-comment-dots" aria-hidden="true" style="font-size: 120px;color: #09246C;"></i>
             <h5 style="color: #09246C;">Forum</h5>
            </div>
        </div></a>
    </main>

</body>

</html>