<?php if (!isset($_SESSION)) {
  session_start();
}

if(isset($_SESSION["login"])){
  $_SESSION["namafoto"] = "unoMerahPutih.jpg";

}else{
  $_SESSION["namafoto"] = "noimg.png";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EDIN</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
   <style>
  <?php 
    include('reset.css');
    include('animation.css');
    include('header.css'); ?>
  </style>
  </head>
  <body>
    <header>
      <div class="judul">
        <h1>Edukasi Indonesia</h1>
        <div class="tulisan">
        <a href="../login.php"><p>Login</p></a>
        </div>
        <div class="fotoProfil">
          <img src="../img/fotouser/<?= $_SESSION["namafoto"]  ?>" alt="log" />
        </div>
      </div>
      <div class="logout">
      <ul>
        <li><a href="">Profil</a></li>
        <li><a href="">Todo List</a></li>
        <li><a href="../logout.php">Log Out</a></li>
        <li><a href="">Hapus Akun</a></li>
      </ul>
    </div>
      <nav>
        <div class="slogan">
          <h2>EDIN</h2>
          <p>Membangun negeri</p>
        </div>

        <ul>
          <li><a href="../index.php">Home</a></li>
          <li><a href="materi.php">Materi</a></li>
          <li><a href="kelas.php">Kelas</a></li>
          <li><a href="artikel.php">Artikel</a></li>
          <li><a href="">Forum</a></li>
        </ul>
      </nav>
    </header>
  </body>
  <script src="../js/logut.js"></script>
</html>