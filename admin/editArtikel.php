<?php 
require 'ceklogin.php';
require '../function.php';

$id = $_GET["id"];
$artikel = query("SELECT * FROM artikel WHERE id_artikel='$id'")[0];

if(isset($_POST["submit"])) {
    editArtikel($_POST);
    echo "<script> window.location.href='artikel.php'; </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootsrap/bootstrap.css">
    <!-- <link rel="stylesheet" href="AdminCSS/user.css"> -->
    <!-- <link rel="stylesheet" href="AdminCSS/kelas.css"> -->
    <link rel="stylesheet" href="AdminCSS/editmateri.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include('nav.php')  ?>

    <main>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_artikel" value="<?= $id; ?>">
            <input style="border: none;" type="file" name="gambar">
            <div class="judulBerita">
                <input type="text form-control" placeholder="Judul" name="judul" value="<?= $artikel["judul"]; ?>">
            </div>
            <textarea name="isi"><?= $artikel["isi_artikel"]; ?></textarea>
            <button class="btn btn-primary mt-4 float-right" type="submit" name="submit">Kirim</button>
        </form>
    </main>
    <!-- <script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script> -->
    <script type="text/javascript">
        CKEDITOR.replace('isi');
    </script>
</body>

</html>