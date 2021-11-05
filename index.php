<?php
require 'function.php';

// ambil data artikel dari database
$artikels = query("SELECT * FROM artikel ORDER BY waktu DESC LIMIT 2");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DISERA</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/animation.css"> -->
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/index.css" />
    
  </head>
  <body>
  <?php include('header.php'); ?>
    <div class="container">
      <div class="mainbox">
        <div class="mainimage">
          <img src="img/motorbike-g0d12a6a91_640.jpg" alt="" />
        </div>
        <div class="maintitle">
          <h1>Digital Service App untuk service lebih baik</h1>
          <h2>Service kendaraan anda, selamatkan perjalanan</h2>
          <a href="user/materi.php"><div class="started">
            <h3>Mulai Service</h3>
          </div></a>
        </div>
      </div>
      <div class="marigabung">
        <h1>Service mudah dimanapun dan kapanpun bersama DISERA</h1>
      </div>
    </div>
    <main>
      <div class="containerOverview">
        <?php foreach ($artikels as $artikel) : ?>
        <div class="Overview">
            <div class="OverviewPict">
                <img src="img/artikel/<?php echo $artikel["gambar"]; ?>" alt="">
            </div>
            
            <div class="preview">
                <h4><?php echo $artikel["judul"]; ?></h4>
            <p><?= substr($artikel["isi_artikel"], 0,200); ?>...</p>
            <a href="user/readartikel.php?id=<?= $artikel["id_artikel"]; ?>"><h3>Read More</h3></a>
            </div>
        </div>
        <?php endforeach; ?>
      </div>
    </main>
    
  </body>
  <?php include('footer.php')  ?>
  
</html>
