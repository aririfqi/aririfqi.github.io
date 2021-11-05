<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$_SESSION["base_url"] = "http://localhost/DISERA/";

$login = false;
if (isset($_SESSION["login"])) {
  $login = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DISERA</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <style>
    <?php
    // include('css/reset.css');
    // include('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">');
    // include('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">');
    include('css/animation.css');
    include('css/header.css');
    ?>
  </style>
</head>

<body>
  <header>
    <div class="judul">
      <h1>Digital Service App</h1>
      <div class="tulisan">
        <?php if (!$login) : ?>
          <a href="<?= $_SESSION["base_url"]; ?>login.php">
            <p>Login</p>
          </a>
        <?php else : ?>
          <p><?php echo $_SESSION["username"]; ?></p>
        <?php endif; ?>

      </div>


      <div class="fotoProfil">
        <?php if (!$login) : ?>
          <a href="<?= $_SESSION["base_url"]; ?>login.php"><img src="<?= $_SESSION["base_url"]; ?>img/fotouser/noimg.png" alt="" /></a>
        <?php else : ?>
          <img src="<?= $_SESSION["base_url"]; ?>img/fotouser/<?= $_SESSION["foto_profil"]; ?>" alt="" />
        <?php endif; ?>

      </div>
    </div>
    <div class="logout">
      <ul>
        <a href="<?= $_SESSION["base_url"]; ?>profile.php?id=<?= $_SESSION["id_user"]; ?>">
          <li> Profil</li>
        </a>
        <a href="">
          <li>Todo List</li>
        </a>
        <a href="<?= $_SESSION["base_url"]; ?>logout.php">
          <li> Log Out</li>
        </a>
        <a href="<?= $_SESSION["base_url"]; ?>hapusAkun.php" onclick="return confirm('Apakah Kamu yakin?')">
          <li> Hapus Akun</li>
        </a>
      </ul>

    </div>
    <nav>
      <div class="slogan">
        <h2>DISERA</h2>
        <p>Do the best serving</p>
      </div>

      <ul>
        <li><a href="<?= $_SESSION["base_url"]; ?>index.php">Home</a></li>
        <li><a href="<?= $_SESSION["base_url"]; ?>user/kelas.php">Service</a></li>
        <li><a href="<?= $_SESSION["base_url"]; ?>user/materi.php">Informasi Service</a></li>
        <li><a href="<?= $_SESSION["base_url"]; ?>user/artikel.php">Artikel</a></li>
        <li><a href="<?= $_SESSION["base_url"]; ?>user/forum.php">Forum</a></li>

      </ul>
    </nav>
  </header>
</body>
<?php if ($login) : ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="<?= $_SESSION["base_url"]; ?>js/logut.js"></script> -->
<?php endif; ?>

<script>
  const foto = document.querySelector('.fotoProfil');
  const logout = document.querySelector('.logout');
  const html = document.querySelector('html');
  foto.addEventListener('click', function() {
    if (logout.style.display == 'block') {
      logout.style.display = 'none';
    } else {
      logout.style.display = 'block';
    }
  })

  
    // $(document).click(function() {
    //   if (logout.style.display == 'block') {
    //     logout.style.display = 'none';
    //   }
    // });
  
//   $(document).click(function() {
//     alert("me");
// });
// $(".logout").click(function(e) {
//     e.stopPropagation(); // This is the preferred method.
//     return false;        // This should not be used unless you do not want
//                          // any click events registering inside the div
// });
</script>

</html>