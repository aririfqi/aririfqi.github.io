<?php 
require 'ceklogin.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootsrap/bootstrap.css">
    <link rel="stylesheet" href="AdminCSS/editmateri.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include('nav.php')  ?>

    <main>
        <h3>Edit Daftar Service</h3>
        <script src="https://cdn.tiny.cloud/1/oeucx615z49568xoewf93k7skh74hgleifdggh6151f4mrvi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#mytextarea'
            });
        </script>
        <form method="post">

            <div class="judulBerita">
                <input type="text form-control" placeholder="Judul">
            </div>

            <textarea id="mytextarea" ; placeholder="Tulis sesuatu di sini"></textarea>
            <button class="btn btn-primary mt-4 float-right" type="submit">Kirim</button>
        </form>

    </main>

</body>

</html>