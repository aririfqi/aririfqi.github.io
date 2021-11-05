<?php 
require '../function.php';

if(!isset($_SESSION["login"])) {
    echo "<script> window.location.href='../login.php'; </script>";
    exit;
}

$id_grup = $_GET["grup"];
if($_SESSION["role"] != 1) {
    $cek = query("SELECT * FROM bergabung WHERE id_grupbelajar='$id_grup' AND id_user='$_SESSION[id_user]'");

    if(empty($cek)) {
        echo "<script> window.location.href='kelas.php'; </script>";
    }
} 

$guru = query("SELECT a.*, b.* FROM users AS a, guru AS b, grup_belajar AS c WHERE a.id_user=b.id_user AND a.id_user=c.id_guru AND c.id_grupbelajar='$id_grup'")[0];
$pelajars = query("SELECT a.*, b.* FROM users AS a, pelajar AS b WHERE a.id_user=b.id_user AND b.id_user IN (SELECT id_user FROM bergabung WHERE id_grupbelajar='$id_grup' AND NOT id_user='$guru[id_user]')");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemeriksaan </title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootsrap/bootstrap.css">
    <link rel="stylesheet" href="../css/submittedtask.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/memberkelas.css">

</head>
<?php include('../header.php')  ?>

<body>
    <main>
        <div class="container">
            <div class="mt-4 mt-lg-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="user-dashboard-info-box table-responsive mb-0 bg-white">
                            <table class="table manage-candidates-top mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th class="text-center">Status</th>
                                        <th class="action text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr class="candidates-list">
                                        <td class="title">
                                            <div class="thumb">
                                                <img class="img-fluid" src="../img/fotouser/<?= $guru["foto_profil"]; ?>" alt="">
                                            </div>
                                            <div class="candidate-list-details">
                                                <div class="candidate-list-info">
                                                    <div class="candidate-list-title">
                                                        <h5 class="mb-0"><?= $guru["username"]; ?></h5>
                                                    </div>
                                                    <div class="candidate-list-option">
                                                        <ul class="list-unstyled">
                                                            <li><i class="fas fa-filter pr-1"></i><?= $guru["sekolah"]; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="candidate-list-favourite-time text-center">
                                            <i class="fa fa-user-circle"></i>
                                            <span class="candidate-list-time order-1">Guru</span>
                                        </td>
                                    </tr>
                                    <?php foreach ($pelajars as $pelajar) : ?>
                                    <tr class="candidates-list">
                                        <td class="title">
                                            <div class="thumb">
                                                <img class="img-fluid" src="../img/fotouser/<?= $pelajar["foto_profil"]; ?>" alt="">
                                            </div>
                                            <div class="candidate-list-details">
                                                <div class="candidate-list-info">
                                                    <div class="candidate-list-title">
                                                        <h5 class="mb-0"><?= $pelajar["username"]; ?></h5>
                                                    </div>
                                                    <div class="candidate-list-option">
                                                        <ul class="list-unstyled">
                                                            <li><i class="fas fa-filter pr-1"></i><?= $pelajar["sekolah"]; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="candidate-list-favourite-time text-center">
                                            <i class="fa fa-user-circle"></i>
                                            <span class="candidate-list-time order-1">Pelajar</span>
                                        </td>
                                        <?php if($_SESSION["role"] == 2) : ?>
                                        <td>
                                            <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                <li><a href="hapusKelas.php?id=<?= $id_grup."&user=".$pelajar["id_user"]; ?>" class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete" onclick="return confirm('Apakah Kamu yakin?')"><i class="far fa-trash-alt"></i></a></li>
                                            </ul>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- <div class="text-center mt-3 mt-sm-3">
                                <ul class="pagination justify-content-center mb-0">
                                    <li class="page-item disabled"> <span class="page-link">Prev</span> </li>
                                    <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">25</a></li>
                                    <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
<?php include('../footer.php')  ?>

</html>