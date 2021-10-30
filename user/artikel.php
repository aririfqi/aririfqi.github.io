<?php  
require '../function.php';

// ambil data artikel dari database
if(isset($_GET["search"])) {
    $cari = $_GET["search"];
    $artikels = query("SELECT * FROM artikel WHERE judul LIKE '%$cari%' OR isi_artikel LIKE '%$cari%'");
} else {
    $artikels = query("SELECT * FROM artikel ORDER BY waktu DESC");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootsrap/bootstrap.css">
    <link rel="stylesheet" href="../css/artikel.css">
</head>

<body>
<?php include('../header.php')?>
    <main>
        <nav class="navbar navbar-light ">
            <form action="artikel.php" class="form-inline" method="GET">
                <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" name="search" required>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <p class="head">Inspirasi hari ini</p>
        <div class="containerArtikel">
        <?php if(empty($artikels)) : ?>
            <p style="color: red">Pencarian Tidak Ditemukan!</p>
        <?php endif; ?>
        <?php foreach ($artikels as $artikel) : ?>
            <a href="readartikel.php?id=<?= $artikel["id_artikel"]; ?>">
            
                <div class="artikel">
                    <div class="artikelPict">
                    <img src="../img/artikel/<?php echo $artikel["gambar"]; ?>" alt="">
                    </div>

                    <div class="preview">
                        <h4><?php echo $artikel["judul"]; ?></h4>
                        <p><?= substr($artikel["isi_artikel"], 0,200); ?>...</p>
                        <h3>Selengkapnya</h3>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

        </div>
    </main>
</body>
<?php include('footer.php')  ?>

</html>