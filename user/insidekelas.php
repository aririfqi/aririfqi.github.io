<?php  
require 'ceklogin.php';
require '../function.php';

if($_SESSION["role"] != 3 || !isset($_GET["id"])) {
  echo "<script> window.location.href='kelas.php'; </script>";
}

$id_kelas = $_GET["id"];
$user = $_SESSION["id_user"];
$gabung = mysqli_query($conn, "SELECT * FROM bergabung WHERE id_grupbelajar='$id_kelas' AND id_user='$user'");

if(!mysqli_num_rows($gabung)) {
  echo "<script> window.location.href='kelas.php'; </script>";
}

if(isset($_POST["uptugas"])) {
    submitTugas($_POST);
}

$kelas = query("SELECT * FROM grup_belajar WHERE id_grupbelajar='$id_kelas'")[0];
$tugass = query("SELECT * FROM tugas WHERE id_grupbelajar='$id_kelas' AND id_tugas NOT IN(SELECT id_tugas FROM pengumpulan WHERE id_user='$user') ORDER BY waktu DESC");
$pengumumans = query("SELECT * FROM pengumuman WHERE id_grup='$id_kelas' ORDER BY waktu DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../css/reset.css" />
  <link rel="stylesheet" href="../css/insidekelas.css" />
</head>

<?php include('../header.php')?>

<body>
<a href="memberkelas.php?<?= "grup=".$id_kelas; ?>"><h1><?= $kelas["nama_grupbelajar"]; ?></h1></a><br>
  <main>
    <div class="kotakChat">
      <div class="chat">

        <?php for ($i = 0; $i < 5; $i++) :  ?>

          <div class="pesanpersonal">
            <div class="foto">
              <img src="../img/fotouser/unoMerahPutih.jpg" alt="" width="50px">
            </div>
            <div class="message">
              <div class="isi">
                <h2>Taruno</h2>
                <p>Jangan lupa kumpulin tugasnya guysss</p>

              </div>
              <p class="waktu">12.20</p>
            </div>
          </div>
        <?php endfor ?>
      </div>
      <form class="send">
        <input type="text" name="pesan" placeholder="Tulis pesan" autocomplete="off">
        <button type="submit" name="">&#x25BA;</button>
      </form>

    </div>
    <div class="kotakInfo">
      <div class="judulInfo">
        <p>Tugas</p>
      </div>
      
      <div class="pengumpulan">
        <?php foreach ($tugass as $tugas) : ?>
        <div class="listTugas">
          <h2><?= $tugas["nama_tugas"]; ?></h2>
          <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_tugas" value=<?= $tugas["id_tugas"]; ?>>
            <input type="file" name="tugas" id="tugas">
            <br><button type="submit" name="uptugas">Submit</button>
          </form>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="judulInfo">
        <p>Pengumuman</p>
      </div>
      <div class="pengumuman">
        <?php foreach ($pengumumans as $pengumuman) : ?>
          <h2><?= $pengumuman["konten"]; ?></h2>
          <p><?= $pengumuman["waktu"]; ?></p>
        <?php endforeach; ?>
      </div>
    </div>
  </main>
</body>

</html>

<?php   ?>