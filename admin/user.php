<?php 
require 'ceklogin.php';
require '../function.php';

// ambil data artikel dari database
if(isset($_GET["submit"])) {
    $cari = $_GET["search"];
    $users = query("SELECT * FROM users WHERE (id_user LIKE '%$cari%' OR username LIKE '%$cari%' OR email LIKE '%$cari%') AND NOT role=1");
} else {
    $users = query("SELECT * FROM users WHERE NOT role=1");
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
        <h3>Pengguna Disera</h3>
            <form class="form-inline" method="GET">
                <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" name="search" required>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
            </form>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Foto</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td scope="row"><?= $user["id_user"]; ?></td>
                        <td><?= $user["username"]; ?></td>
                        <td><?= $user["email"]; ?></td>
                        <td><img src="../img/fotouser/<?= $user["foto_profil"]; ?>" alt="" width="30px"></td>
                        <td>
                            <a href="../profile.php?id=<?= $user["id_user"]."&role=".$user["role"]; ?>" target="blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="hapusUser.php?id=<?= $user["id_user"]; ?>" onclick="return confirm('Apakah Kamu yakin?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>  
            </tbody>
          </table>
    </main>
</body>
</html>