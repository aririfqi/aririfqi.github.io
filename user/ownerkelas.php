<?php  
require 'ceklogin.php';
require '../function.php';

if($_SESSION["role"] != 2  || !isset($_GET["id"])) {
  echo "<script> window.location.href='kelas.php'; </script>";
}

if(isset($_POST["kirimChat"])) {
    kirimPesan($_POST);
}

if(isset($_POST["tugas"])) {
    tambahTugas($_POST);
}

if(isset($_POST["pengumuman"])) {
    tambahPengumuman($_POST);
}

$id_kelas = $_GET["id"];
$user = $_SESSION["id_user"];
$kelas = mysqli_query($conn, "SELECT * FROM grup_belajar WHERE id_grupbelajar='$id_kelas' AND id_guru='$user'");

if(!mysqli_num_rows($kelas)) {
  echo "<script> window.location.href='kelas.php'; </script>";
}

$kelas = mysqli_fetch_assoc($kelas);
$tugass = query("SELECT * FROM tugas WHERE id_grupbelajar='$id_kelas' ORDER BY waktu DESC");
$pengumumans = query("SELECT * FROM pengumuman WHERE id_grup='$id_kelas' ORDER BY waktu DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
    <link rel="stylesheet" href="../css/reset.css" />
  <link rel="stylesheet" href="../css/ownerkelas.css" />
</head>
<body>
    <?php include('../header.php');  ?>
    <a href="memberkelas.php?<?= "grup=".$id_kelas; ?>"><h1><?= $kelas["nama_grupbelajar"]; ?></h1></a><h1 class="kode" style="font-size: 14pt;">Kode Kelas : <?= $id_kelas; ?></h1><br><br>
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
            <form class="send" method="POST">
              <input type="text" name="pesan" placeholder="Tulis pesan" autocomplete="off" required>
              <input type="hidden" name="id_grupbelajar" value=<?= $id_kelas; ?>>
              <button type="submit" name="kirimChat">&#x25BA;</button>
            </form>
      
          </div>
          <div class="kotakInfo">
            <div class="judulInfo">
              <p>Tugas</p>
            </div>
            
            <div class="pengumpulan">
              <div class="listTugas">
                <form action="" method="POST">
                  <input type="hidden" name="id_grupbelajar" value=<?= $id_kelas; ?>>
                  <input type="text" name="buatTugas" id="buatTugas" placeholder="Tugas Baru">
                  <br><button type="submit" name="tugas">Submit</button>
                </form>
                <?php foreach ($tugass as $tugas) : ?>
                  <a href="submittedTask.php?<?= "grup=".$id_kelas."&tugas=".$tugas["id_tugas"]; ?>"><h2><?= $tugas["nama_tugas"]; ?></h2></a>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="judulInfo">
              <p>Pengumuman</p>
            </div>
            <div class="pengumuman ">
              <form method="POST">
                <input type="hidden" name="id_grupbelajar" value=<?= $id_kelas; ?>>
                <input type="text" name="konten" id="konten" placeholder="Tulis Pengumuman">
                <br><button type="submit" name="pengumuman">Submit</button>
              </form>
              <br>
              <?php foreach ($pengumumans as $pengumuman) : ?>
                <h2><?= $pengumuman["konten"]; ?></h2>
                <p><?= $pengumuman["waktu"]; ?></p>
              <?php endforeach; ?>
            </div>
          </div>
    </main>
    <?php include('../footer.php')  ?>
    
</body>
</html>