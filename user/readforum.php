<?php 
require '../function.php';

if(isset($_POST["submit"])) {
    postKomen($_POST);
}

$id = $_GET["id"];
$forum = query("SELECT a.*, b.* FROM diskusi AS a, users AS b WHERE a.id_user=b.id_user AND a.id_diskusi='$id'");
if(empty($forum)) {
    echo "<script> window.location='forum.php'; </script>";
}
$forum = $forum[0];
$komentar = query("SELECT a.*, b.* FROM komentar AS a, users AS b WHERE a.id_user=b.id_user AND a.id_diskusi='$id' ORDER BY a.waktu ASC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca Forum</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootsrap/bootstrap.css">
    <link rel="stylesheet" href="../css/readforum.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <?php include('../header.php')  ?>
    <div class="penghalang sticky-top">

    </div>
    <main>
        <div class="forum">
            <div class="unit">
                <div class="foto">
                    <img src="../img/fotouser/<?= $forum["foto_profil"]; ?>" alt="" width="50px">
                </div>

                <h5><?= $forum["username"]; ?></h5>
                <h3><?= $forum["judul"]; ?></h3>
                <p><?= $forum["topik"]; ?></p>
            </div>
            <i class="fa fa-comment" style="font-size:24px;color:#09246C;"><span>Komentar</span></i>
            <form method="POST">
                <input type="hidden" name="id_diskusi" value="<?= $id; ?>">
                <textarea id="mytextarea" ; placeholder="Tulis sesuatu di sini" name="topik" required></textarea>
                <?php if(!isset($_SESSION["login"])) : ?>
                    <a style="color: white; width:80px" class="btn btn-primary float-right" href="../login.php">Kirim</a>
                <?php elseif($_SESSION["role"] == 1) : ?>
                    <a style="color: white; width:80px" class="btn btn-primary float-right" href="kelas.php">Kirim</a>
                <?php else : ?>
                    <button class="btn btn-primary float-right" type="submit" name="submit">Kirim</button>
                <?php endif; ?>
            </form>
            <?php foreach ($komentar as $komen) : ?>
            <div class="unit komentar">
                <div class="foto">
                    <img src="../img/fotouser/<?= $komen["foto_profil"]; ?>" alt="" width="50px">
                </div>

                <h5><?= $komen["username"]; ?></h5>
                <p><?= $komen["komentar"]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="type sticky-top">
            <!-- <h3>Post ke Forum</h3>
            <form method="post">

                <div class="judulBerita">
                    <input type="text form-control" placeholder="Judul">
                </div>

                <textarea id="mytextarea" ; placeholder="Tulis sesuatu di sini"></textarea>
                <button class="btn btn-primary float-right" type="submit">Kirim</button>
            </form> -->
        </div>
    </main>
</body>
<!-- <script src="../js/komentar.js"></script> -->
<script>
$( ".fa-comment" ).click(function() {
  $( "form" ).slideToggle( "slow", function() {
    // Animation complete.
  });
});
</script>

<?php include('footer.php')  ?>

</html>