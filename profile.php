<?php 


require 'function.php';

if(!isset($_SESSION["login"])) {
    echo "<script> window.location.href='../login.php'; </script>";
    exit;
}

if(isset($_POST["updateprof"])) {
    if(updateProfile($_POST) > 0) {
        $_SESSION["username"] = $_POST["username"];
        echo "<script>alert('Update Sukses!');</script>";
    } else {
        echo "<script>alert('Update Gagal!');</script>";
    }
}

if(isset($_POST["changepass"])) {
    if(updatePassword($_POST) > 0) {
        echo "<script>alert('Password Updated!');</script>";
    } else {
        echo "<script>alert('Password Salah!');</script>";
    }
}

// ambil data user dari database
$id = $_GET["id"];
if(isset($_GET["role"])) {
    $role = $_GET["role"];
} else {
    $role = $_SESSION["role"];
}

if($role == 2) {
    $user = query("SELECT a.*, b.* FROM users AS a, guru AS b WHERE a.id_user=b.id_user AND a.id_user='$id'")[0];
} else {
    $user = query("SELECT a.*, b.* FROM users AS a, pelajar AS b WHERE a.id_user=b.id_user AND a.id_user='$id'")[0];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="css/reset.css">
    
    <!-- <link rel="stylesheet" href="css/bootsrap/bootstrap.css"> -->
    
    
    <!-- <link rel="stylesheet" href="css/header.css"> -->
    <link rel="stylesheet" href="css/reset.css">
    <?php include('header.php')  ?>
    <link rel="stylesheet" href="css/profile.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container rounded bg-white mt-1" style="width: 1000px;">
        <div class="row">
            <div class="col-md-3 ">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <div class="rounded-circle mt-5 border" id="bulet">
                        <img src="img/fotouser/<?= $user["foto_profil"]; ?>" style="width: 200px;">
                    </div>
                    <span class="font-weight-bold"><?= $user["username"]; ?></span><span class="text-black-50"><?= $user["email"]; ?></span><span> </span></div>
            </div>
            <form action="" class="col-md-5 " method="POST">
                <div class="p-3 py-5 ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Edit Profil</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Nama</label>
                            <input type="text" class="form-control" name="username" value="<?= $user["username"]; ?>" autocomplete="off">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $user["email"]; ?>">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Asal Sekolah</label>
                            <input type="text" class="form-control" name="sekolah" value="<?= $user["sekolah"]; ?>">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Status</label>
                            <?php if($user["role"] == 2) : ?>
                                <input type="text" class="form-control" value="Guru" readonly>
                            <?php else : ?>
                                <input type="text" class="form-control" value="Siswa" readonly>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Jenjang</label>
                            <input type="text" class="form-control" value="<?= $user["jenjang"] ?>" readonly>
                        </div>
                    </div>
                    <?php if($_SESSION["role"] != 1) : ?>
                    <div class="mt-3 text-right"><button class="btn btn-primary profile-button" type="submit" name="updateprof">Simpan Perubahan</button></div>
                    <?php endif; ?>
                </div>
            </form>
            <form action="" class="col-md-4" method="POST">
                
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience">
                        <span><strong>Ubah password</strong></span>
                        <span class="border px-3 p-1 add-experience">&nbsp;Danger Zone</span>
                    </div><br>
                        <div class="col-md-14">
                            <label class="labels">Password Sekarang</label>
                            <input type="password" class="form-control" placeholder="********" name="password" required>
                        </div>
                        <div class="col-md-14 mt-3">
                            <label class="labels">Password Baru</label>
                            <input type="password" class="form-control" placeholder="password" name="password1" required>
                        </div>
                        <div class="col-md-14">
                            <label class="labels">Password Baru</label>
                            <input type="password" class="form-control" placeholder="password" name="password2" required>
                        </div>
                        <?php if($_SESSION["role"] != 1) : ?>
                        <div class="mt-3 text-right"><button class="btn btn-primary profile-button" type="submit" name="changepass">Simpan Perubahan</button></div>
                        <?php endif; ?>
                </div>
            </form>
            </>
        </div>
    </div>
    <!-- <script src="js/profile.js"></script> -->
</body>
</html>