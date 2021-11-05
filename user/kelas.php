<?php 
require 'ceklogin.php';
require '../function.php';

if(isset($_POST["submit"])) {
    if(tambahKelas($_POST) <= 0) {
        echo "<script>alert('Penambahan Kelas Gagal!');</script>";
    }
}

if(isset($_POST["gabung"])) {
    if(gabungKelas($_POST) <= 0) {
        echo "<script>alert('Kode Kelas Salah! / Anda Sudah Bergabung!');</script>";
    }
}

$id = $_SESSION["id_user"];
$kelass = query("SELECT a.nama_grupbelajar, a.id_grupbelajar FROM grup_belajar AS a, bergabung AS b WHERE a.id_grupbelajar=b.id_grupbelajar AND b.id_user='$id'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/kelas.css">
    <!-- <link rel="stylesheet" href="../css/bootsrap/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <?php include('../header.php')?>
    <main>
        
        <?php if($_SESSION["role"] == 3) : ?>
        <form method="POST">
            <input type="text" name="kode" id="kode" placeholder="Kode bengkel">
            <button type="submit" name="gabung">Gabung</button>
        </form>
        <?php endif; ?>
        <p class="head">Bengkel yang tersedia</p>
        <div class="containerMateri">
            <div class="kotakMapel">
                <?php if(empty($kelass) && $_SESSION["role"] == 3) : ?>
                   Belum ada bengkel! Silahkan masukkan kode bengkel!
                <?php else : ?>
                    <?php foreach ($kelass as $kelas) : ?>
                    <a href=<?php if($_SESSION["role"] == 2) {echo "ownerkelas.php?id=".$kelas["id_grupbelajar"];} else {echo "insidekelas.php?id=".$kelas["id_grupbelajar"];} ?>>
                        <div class="mapel">
                            <form action="hapusKelas.php" method="GET">
                                <input type="hidden" name="id" value=<?= $kelas["id_grupbelajar"]; ?>>
                                <button onclick="return confirm('Apakah Kamu yakin?')"><i class="<?php if($_SESSION["role"] == 2) { echo "fa fa-trash-o"; } else { echo "fa fa-sign-out"; } ?>" style="font-size:24px;color:red"></i></button>
                            </form>
                            <img src="../img/logokelas/kelas.png" alt="">
                            <h4><?= $kelas["nama_grupbelajar"]; ?></h4>
                        </div>
                    </a>
                    <?php endforeach; ?>
                    
                    <?php if($_SESSION["role"] == 2) : ?>
                    <div class="mapel tambah">
                        <img src="../img/logokelas/add.png" alt="">
                        <h4>Tambahkan Service Baru</h4>
                    </div>
                    <?php endif; ?>                    
                <?php endif; ?> 
            </div>
        </div>
        <div class="buatKelas">
            <div class="pembungkusbuatKelas">
                <p>&#10006;</p>
                <h2>Tambah Service Baru</h2>
                <form action="" method="POST">
                    <input type="text" name="namaKelas" id="namaKelas" placeholder="Nama Service" required><br>
                    <input type="text" name="mapel" id="mapel" placeholder="Kategori" required><br>
                    <input type="text" name="Instansi" id="Instansi" placeholder="Bengkel" required><br>
                    <button type="submit" name="submit">Tambah</button>
                </form>
            </div>
        </div> 
    </main>
    <script src="../js/kelas.js"></script>
    
    
</body>
<?php include('footer.php')  ?>
</html>
