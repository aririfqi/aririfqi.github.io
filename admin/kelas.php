<?php 
require 'ceklogin.php';
require '../function.php';

// ambil data artikel dari database
if(isset($_GET["submit"])) {
    $cari = $_GET["search"];
    $kelass = query("SELECT * FROM grup_belajar AS a, users AS b WHERE a.id_guru=b.id_user AND (id_grupbelajar LIKE '%$cari%' OR nama_grupbelajar LIKE '%$cari%' OR username LIKE '%$cari%' OR instansi LIKE '%$cari%')");
} else {
    $kelass = query("SELECT * FROM grup_belajar AS a, users AS b WHERE a.id_guru=b.id_user");
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
        <h3>Kelas Edin</h3>
            <form class="form-inline" method="GET">
                <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" name="search" required>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
            </form>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col">Pemilik</th>
                <th scope="col">Nama Bengkel</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($kelass as $kelas) : ?>
                    <tr>
                        <td scope="row"><?= $kelas["id_grupbelajar"]; ?></td>
                        <td><?= $kelas["nama_grupbelajar"]; ?></td>
                        <td><?= $kelas["username"]; ?></td>
                        <td><?= $kelas["instansi"]; ?></td>
                        <td>
                            <a href="../user/memberkelas.php?<?= "grup=".$kelas["id_grupbelajar"]; ?>" target="blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="hapusKelas.php?id=<?= $kelas["id_grupbelajar"]; ?>" onclick="return confirm('Apakah Kamu yakin?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?> 
            </tbody>
          </table>
    </main>
</body>
</html>