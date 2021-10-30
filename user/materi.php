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
    <link rel="stylesheet" href="../css/mtr.css">
</head>
<body>
    <?php include('../header.php')?>
    
    <main>
        <label class="pilihKelas" for="pilihKelas">Pilih Kelas : </label>
        <div class="custom-select" style="width: 70px;">
        <select name="pilihKelas" id="pilihKelas">
            <option value="7">7</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        </div>
        
        <div class="containerMateri">
            <div class="kotakMapel">
                <a href="readMateri.php">
                    <div class="mapel">
                        <img src="../img/mapel/logo-mapel-ipa-fisika.png" alt="">
                        <h4>Biologi</h4>
                    </div>
                </a>
                <a href="readMateri.php">
                    <div class="mapel">
                        <img src="../img/mapel/logo-mapel-ipa-fisika.png" alt="">
                        <h4>Fisika</h4>
                    </div>
                </a>
                <a href="readMateri.php">
                    <div class="mapel">
                        <img src="../img/mapel/logo-mapel-ipa-fisika.png" alt="">
                        <h4>Kimia</h4>
                    </div>
                </a>
                <a href="readMateri.php">
                    <div class="mapel">
                        <img src="../img/mapel/logo-mapel-ipa-fisika.png" alt="">
                        <h4>Bahasa Indonesia</h4>
                    </div>
                </a>
                <a href="readMateri.php">
                    <div class="mapel">
                        <img src="../img/mapel/logo-mapel-ipa-fisika.png" alt="">
                        <h4>Bahasa Inggris</h4>
                    </div>
                </a>
                <a href="readMateri.php">
                    <div class="mapel">
                        <img src="../img/mapel/logo-mapel-ipa-fisika.png" alt="">
                        <h4>Bahasa Inggris</h4>
                    </div>
                </a>
<!--               
                <div class="mapel">
                    <img src="../img/mapel/logo-mapel-ipa-fisika.png" alt="">
                    <h4>Ilmu Pengetahuan Sosial</h4>
                </div>
                <div class="mapel">
                    <img src="../img/mapel/logo-mapel-ipa-fisika.png" alt="">
                    <h4>Bahasa Indonesia</h4>
                </div>
                <div class="mapel">
                    <img src="../img/mapel/logo-mapel-ipa-fisika.png" alt="">
                    <h4>Pendidikan Kewarganegaraan</h4>
                </div>
                <div class="mapel">
                    <img src="../img/mapel/logo-mapel-ipa-fisika.png" alt="">
                    <h4>Bahasa Inggris</h4>
                </div>
                <div class="mapel">
                    <img src="../img/mapel/logo-mapel-ipa-fisika.png" alt="">
                    <h4>Bahasa Inggris</h4>
                </div> -->
            </div>
        </div>
        
    </main>
    <script src="../js/materi.js"></script>
    <?php include('footer.php')  ?>

</body>
</html>