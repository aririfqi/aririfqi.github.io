<?php 
require 'ceklogin.php'; 
require '../function.php';

$no = 1;
$id_grup = $_GET["grup"];
$id_tugas = $_GET["tugas"];

$cek = query("SELECT * FROM grup_belajar WHERE id_grupbelajar='$id_grup';")[0];

if($cek["id_guru"] != $_SESSION["id_user"]) {
    echo "<script> window.location.href='kelas.php'; </script>";
}

$daftars = query("SELECT a.username, b.* FROM users AS a, pengumpulan AS b WHERE a.id_user=b.id_user AND b.id_tugas='$id_tugas' ORDER BY waktu DESC;");
$data = query("SELECT a.nama_grupbelajar, b.nama_tugas FROM grup_belajar AS a, tugas AS b WHERE a.id_grupbelajar=b.id_grupbelajar AND b.id_tugas='$id_tugas';")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Keluhan Anda:</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootsrap/bootstrap.css">
    <link rel="stylesheet" href="../css/submittedtask.css">

</head>
<?php include('../header.php')  ?>
<body>
    <main>
        <h1><?= $data["nama_grupbelajar"]; ?></h1>
        <h2><?= $data["nama_tugas"]; ?></h2>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Keluhan</th>
            <th scope="col">Waktu pengumpulan</th>
          </tr>
        </thead>
        <tbody>
            <?php if(!empty($daftars)) : ?>
                <?php foreach ($daftars as $daftar) : ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $daftar["username"]; ?></td>
                    <td><a href="download.php?filename=<?= $daftar["file"]; ?>"><?= $daftar["nama_file"]; ?></a></td>
                    <td><?= $daftar["waktu"]; ?></td>
                </tr>
                <?php $no++; endforeach; ?>
            <?php else : ?>
                <tr><td style="text-align:center" colspan="4">Belum ada keluhan!</td></tr>
            <?php endif; ?>
                 
        </tbody>
      </table>
    </main >
    
</body>
<?php include('../footer.php')  ?>

</html>