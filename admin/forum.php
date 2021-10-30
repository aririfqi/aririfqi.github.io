<?php 
require 'ceklogin.php';
require '../function.php';

// ambil data artikel dari database
if(isset($_GET["submit"])) {
    $cari = $_GET["search"];
    $forums = query("SELECT * FROM diskusi AS a, users AS b WHERE a.id_user=b.id_user AND (username LIKE '%$cari%' OR judul LIKE '%$cari%')");
} else {
    $forums = query("SELECT * FROM diskusi AS a, users AS b WHERE a.id_user=b.id_user ORDER BY waktu DESC");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include('nav.php')  ?>
    <main>
        <h3>Forum</h3>
            <form class="form-inline" method="GET">
                <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" name="search" required>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
            </form>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">Judul</th>
                <th scope="col">Komentar</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($forums as $forum) : ?>
                    <tr>
                        <td scope="row"><?= $forum["username"]; ?></td>
                        <td><?= $forum["judul"]; ?></td>
                        <td><?= substr($forum["topik"], 0,50); ?>...</td>
                        <td><?= substr($forum["waktu"], 0,10); ?></td>
                        <td>
                            <a href="../user/readforum.php?id=<?= $forum["id_diskusi"]; ?>" target="blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="hapusForum.php?id=<?= $forum["id_diskusi"]; ?>" onclick="return confirm('Apakah Kamu yakin?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
    </main>
</body>
</html>