<?php  
require '../function.php';

if(isset($_POST["submit"])) {
    postForum($_POST);
}

// ambil data diskusi dari database
$forums = query("SELECT a.*, b.* FROM diskusi AS a, users AS b WHERE a.id_user=b.id_user ORDER BY waktu DESC");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootsrap/bootstrap.css">
    <link rel="stylesheet" href="../css/forum.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <?php include('../header.php')  ?>
    <div class="penghalang sticky-top">

    </div>
    <main>
        <div class="forum">
            <?php foreach ($forums as $forum) : ?>
            <div class="unit">
                <div class="foto">
                    <img src="../img/fotouser/<?= $forum["foto_profil"]; ?>" alt="" width="50px">
                </div>

                <h5><?= $forum["username"]; ?></h5>
                <a href="readforum.php?id=<?= $forum["id_diskusi"]; ?>">
                    <h3><?= $forum["judul"]; ?></h3>
                    <p><?= substr($forum["topik"], 0,200); ?>...</p>
                </a>
            </div><br>
            <?php endforeach; ?>
            <!-- <i class="fa fa-comment" style="font-size:24px;color:#09246C;"><span>Komentar</span></i> -->
        </div>
        <div class="type sticky-top">
            <h3>Post ke Forum</h3>
            <form method="POST">
                <div class="judulBerita">
                    <input type="text form-control" placeholder="Judul" name="judul" required>
                </div>
                <textarea id="mytextarea" ; placeholder="Tulis sesuatu di sini" name="topik" required></textarea>
                <?php if(!isset($_SESSION["login"])) : ?>
                    <a style="color: white; width:80px" class="btn btn-primary float-right" href="../login.php">Kirim</a>
                <?php elseif($_SESSION["role"] == 1) : ?>
                    <a style="color: white; width:80px" class="btn btn-primary float-right" href="kelas.php">Kirim</a>
                <?php else : ?>
                    <button class="btn btn-primary float-right" type="submit" name="submit">Kirim</button>
                <?php endif; ?>
            </form>
        </div>

    </main>
</body>
<?php include('footer.php')  ?>


</html>