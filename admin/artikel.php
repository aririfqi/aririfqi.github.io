<?php 
require 'ceklogin.php';
require '../function.php';

// ambil data artikel dari database
if(isset($_GET["submit"])) {
    $cari = $_GET["search"];
    $artikels = query("SELECT * FROM artikel AS a, users as b WHERE a.id_user=b.id_user AND (judul LIKE '%$cari%' OR username LIKE '%cari%')");
} else {
    $artikels = query("SELECT * FROM artikel AS a, users as b WHERE a.id_user=b.id_user ORDER BY waktu DESC");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootsrap/bootstrap.css">
    <link rel="stylesheet" href="AdminCSS/user.css">
    <link rel="stylesheet" href="AdminCSS/kelas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include('nav.php')  ?>
    <main>
        <h3>Artikel Edin</h3>
        <form class="form-inline" method="GET">
            <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" name="search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
            <a href="buatArtikel.php"><i class="fa fa-plus-square-o" aria-hidden="true" style="font-size: 36px;"><span>Tulis Artikel</span></i></a>
        </form>
        
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Judul Artikel</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Tanggal </th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($artikels as $artikel) : ?>
                <tr>
                    <td scope="row"><?= $artikel["judul"]; ?></td>
                    <td><?= $artikel["username"]; ?></td>
                    <td><?= $artikel["waktu"]; ?></td>
                    <td><img src="../img/artikel/<?= $artikel["gambar"]; ?>" alt="" width="70px"></td>
                    <td>
                        <a href="../user/readartikel.php?id=<?= $artikel["id_artikel"]; ?>" target="blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="editArtikel.php?id=<?= $artikel["id_artikel"]; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="hapusArtikel.php?id=<?= $artikel["id_artikel"]; ?>" onclick="return confirm('Apakah Kamu yakin?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>

</html>