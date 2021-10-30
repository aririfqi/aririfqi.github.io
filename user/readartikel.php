<?php  

require '../function.php';

$id = $_GET["id"];
$artikel = query("SELECT * FROM artikel WHERE id_artikel='$id'");
if(empty($artikel)) {
    echo "<script> window.location='artikel.php'; </script>";
}
$artikel = $artikel[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/readartikel.css">
</head>
<?php include('../header.php')  ?>
    <main>
        <div class="hero" style="display: flex; align-items:center">
            <img src="../img/artikel/<?= $artikel["gambar"]; ?>" alt="">
        </div>
        
        <h1><?= $artikel["judul"]; ?></h1>
        <?= $artikel["isi_artikel"]; ?>
    </main>
</body>
<?php include('footer.php')  ?>
</html>