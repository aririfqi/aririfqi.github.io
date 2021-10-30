<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$conn = mysqli_connect("localhost", "root", "", "edin");

function query($data) {
	global $conn;
	
	$result = mysqli_query($conn, $data);
	$rows = [];

	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function login($data) {
	global $conn;

	// ambil data
	$email = $data["email"];
	$password = $data["password"];

	// query cek email dan pass di database
	$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");

	// mengambil data yg didapat dari database
	if(mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		// set session
		$_SESSION["login"] = true;
		$_SESSION["role"] = $row["role"];
		$_SESSION["id_user"] = $row["id_user"];
		$_SESSION["username"] = $row["username"];
		$_SESSION["foto_profil"] = $row["foto_profil"];
		return true;
	}

	// mengembalikan nilai false jika data tidak ada
	return false;
}

function daftar($data) {
	global $conn;

	// ambil data
	$username = htmlspecialchars($data["username"]);
	$email = htmlspecialchars($data["email"]);
	$password = htmlspecialchars($data["password"]);
	$password2 = htmlspecialchars($data["password2"]);
	$role = $data["status"];
	$sekolah = $data["sekolah"];
	$derajat = $data["derajat"];

	// cek password
	if($password != $password2) {
		return false;
	}

	// upload gambar
	$gambar = upload();
	if(!$gambar) {
		return false;
	}

	// generate id users
	do {
		$id = "u".rand(100000000, 999999999);
		$result = mysqli_query($conn, "SELECT * FROM users WHERE id_user='$id'");
	} while(mysqli_num_rows($result) == 1);

	// tambahkan user baru ke database
	if($role == 2) {
		$queryus = "INSERT INTO guru VALUES ('$id', '$sekolah', '$derajat')";
	} else {
		$queryus = "INSERT INTO pelajar VALUES ('$id', '$sekolah', '$derajat')";
	}
	
	$query = "INSERT INTO users VALUES ('$id', '$username', '$email', '$password', '$gambar', '$role')";
	mysqli_query($conn, $query);
	mysqli_query($conn, $queryus);
	return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah ada gambar yang diupload
	if($error === 4) {
		return 'noimg.png';
	}

	// cek ektensi valid
	$ektensiValid = ['jpg', 'jpeg', 'png'];
	$ektensi = explode('.', $namaFile);
	$ektensi = strtolower(end($ektensi));
	if(!in_array($ektensi, $ektensiValid)) {
		echo "
			<script>
				alert('Ektensi Gambar: jpg, jpeg, png');
			</script>
		";
		return false;
	}

	// nama file baru
	$namaFile = uniqid().'.'.$ektensi;

	// gambar siap diupload
	move_uploaded_file($tmpName, 'img/fotouser/'.$namaFile);
	return $namaFile;
}

function hapusAkun() {
	global $conn;

	$id = $_SESSION["id_user"];
	mysqli_query($conn, "DELETE FROM users WHERE id_user='$id'");
}

function tambahKelas($data) {
	global $conn;

	// ambil data
	$guru = $_SESSION["id_user"];
	$nama = htmlspecialchars($data["namaKelas"]);
	$mapel = htmlspecialchars($data["mapel"]);
	$instansi = htmlspecialchars($data["Instansi"]);
	
	// generate id grup_belajar
	do {
		$id = "g".rand(100000000, 999999999);
		$result = mysqli_query($conn, "SELECT * FROM grup_belajar WHERE id_grupbelajar='$id'");
	} while(mysqli_num_rows($result) == 1);

	$query1 = "INSERT INTO grup_belajar VALUES ('$id', '$guru', '$nama', '$mapel', '$instansi')";
	$query2 = "INSERT INTO bergabung VALUES ('$id', '$guru')";
	$result = mysqli_query($conn, $query1);
	if($result) {
		mysqli_query($conn, $query2);
	}
	return mysqli_affected_rows($conn);
}

function gabungKelas($data) {
	global $conn;

	// ambil data
	$id = $_SESSION["id_user"];
	$id_grup = htmlspecialchars($data["kode"]);

	// cek apakah sudah bergabung
	$cek = mysqli_query($conn, "SELECT * FROM bergabung WHERE id_grupbelajar='$id_grup' AND id_user='$id'");
	if(mysqli_num_rows($cek)) {
		return false;
	}

	// insert data
	$query = "INSERT INTO bergabung VALUES('$id_grup','$id')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function updateProfile($data) {
	global $conn;

	// ambil data
	$id = $_SESSION["id_user"];
	$nama = htmlspecialchars($data["username"]);
	$email = htmlspecialchars($data["email"]);
	$sekolah = htmlspecialchars($data["sekolah"]);

	if($_SESSION["role"] == 2) {
		$query = "UPDATE users AS a, guru AS b SET a.username='$nama', a.email='$email', b.sekolah='$sekolah' WHERE a.id_user=b.id_user AND a.id_user='$id'";
	} else {
		$query = "UPDATE users AS a, pelajar AS b SET a.username='$nama', a.email='$email', b.sekolah='$sekolah' WHERE a.id_user=b.id_user AND a.id_user='$id'";
	}

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function updatePassword($data) {
	global $conn;

	// ambil data
	$id = $_SESSION["id_user"];
	$passlama = htmlspecialchars($data["password"]);
	$password1 = htmlspecialchars($data["password1"]);
	$password2 = htmlspecialchars($data["password2"]);

	// cek password
	$pass = query("SELECT password FROM users WHERE id_user='$id'")[0];

	if($passlama != $pass["password"] || $password1 != $password2) {
		return false;
	}

	$query = "UPDATE users SET password='$password1' WHERE id_user='$id'";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function kirimPesan($data) {
	global $conn;

	// ambil data
	$id = $_SESSION["id_user"];
	$id_grup = htmlspecialchars($data["id_grupbelajar"]);
	$pesan = htmlspecialchars($data["pesan"]);

	$query = "INSERT INTO chat VALUES('$id_grup','$id','$pesan',now());";
	mysqli_query($conn, $query);
}

function tambahTugas($data) {
	global $conn;

	// ambil data
	$id_grup = htmlspecialchars($data["id_grupbelajar"]);
	$tugas = htmlspecialchars($data["buatTugas"]);

	// generate id tugas
	do {
		$id = "t".rand(100000000, 999999999);
		$result = mysqli_query($conn, "SELECT * FROM tugas WHERE id_tugas='$id'");
	} while(mysqli_num_rows($result) == 1);

	$query = "INSERT INTO tugas VALUES('$id_grup','$id','$tugas',now());";
	mysqli_query($conn, $query);
}

function submitTugas($data) {
	global $conn;

	// ambil data
	$id_user = $_SESSION["id_user"];
	$id_tugas = htmlspecialchars($data["id_tugas"]);

	// upload file
	$tugas = upTugas($id_tugas);
	if(!$tugas) {
		return false;
	}
	$namaFile = $_FILES['tugas']['name'];

	// tambahkan path file ke database
	$query = "INSERT INTO pengumpulan VALUES ('$id_tugas', '$id_user', '$namaFile', '$tugas', now())";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function upTugas($id_tugas) {
	$namaFile = $_FILES['tugas']['name'];
	$error = $_FILES['tugas']['error'];
	$tmpName = $_FILES['tugas']['tmp_name'];

	// cek apakah ada file yang diupload
	if($error === 4) {
		echo "
			<script>
				alert('Upload Gagal!');
			</script>
		";
		return false;
	}

	// cek ektensi valid
	$ektensiValid = ['pdf', 'docx', 'doc', 'zip', 'rar'];
	$ektensi = explode('.', $namaFile);
	$ektensi = strtolower(end($ektensi));
	if(!in_array($ektensi, $ektensiValid)) {
		echo "
			<script>
				alert('Ektensi File Tidak Didukung');
			</script>
		";
		return false;
	}

	// nama file baru
	$namaBaru = $id_tugas.$_SESSION["id_user"].".".$ektensi;

	// file siap diupload
	move_uploaded_file($tmpName, '../file/'.$namaBaru);
	return $namaBaru;
}

function tambahPengumuman($data) {
	global $conn;

	// ambil data
	$id_grup = htmlspecialchars($data["id_grupbelajar"]);
	$konten = htmlspecialchars($data["konten"]);

	$query = "INSERT INTO pengumuman VALUES('$id_grup','$konten',now());";
	mysqli_query($conn, $query);
}

function postForum($data) {
	global $conn;

	// ambil data
	$id_user = $_SESSION["id_user"];
	$judul = htmlspecialchars($data["judul"]);
	$topik = htmlspecialchars($data["topik"]);

	// generate id diskusi
	do {
		$id = "f".rand(100000000, 999999999);
		$result = mysqli_query($conn, "SELECT * FROM diskusi WHERE id_diskusi='$id'");
	} while(mysqli_num_rows($result) == 1);

	$query = "INSERT INTO diskusi VALUES('$id_user','$id','$judul','$topik',now());";
	mysqli_query($conn, $query);
}

function postKomen($data) {
	global $conn;

	// ambil data
	$id_user = $_SESSION["id_user"];
	$id_diskusi = $data["id_diskusi"];
	$topik = htmlspecialchars($data["topik"]);

	// generate id diskusi
	do {
		$id = "d".rand(100000000, 999999999);
		$result = mysqli_query($conn, "SELECT * FROM komentar WHERE id_komentar='$id'");
	} while(mysqli_num_rows($result) == 1);

	$query = "INSERT INTO komentar VALUES('$id','$id_diskusi','$id_user','$topik',now());";
	mysqli_query($conn, $query);
}

function buatArtikel($data) {
	global $conn;
	
	// ambil data
	$id_user = $_SESSION["id_user"];
	$judul = $data["judul"];
	$isi = $data["isi"];

	// generate id artikel
	do {
		$id = "art".rand(1000000, 9999999);
		$result = mysqli_query($conn, "SELECT * FROM artikel WHERE id_artikel='$id'");
	} while(mysqli_num_rows($result) == 1);

	// upload file
	$gambar = upArtikel($id);
	if(!$gambar) {
		return false;
	}

	$query = "INSERT INTO artikel VALUES('$id_user','$id','$judul','$isi','$gambar',now())";
	mysqli_query($conn, $query);
}

function editArtikel($data) {
	global $conn;

	// ambil data
	$id_user = $_SESSION["id_user"];
	$id_artikel = $data["id_artikel"];
	$judul = $data["judul"];
	$isi = $data["isi"];
	if($_FILES['gambar']['error']) {
		$query = "UPDATE artikel SET id_user='$id_user', judul='$judul', isi_artikel='$isi', waktu=now() WHERE id_artikel='$id_artikel'";
	} else {
		$gambar = upArtikel($id_artikel);
		if(!$gambar) {
			return false;
		}
		$query = "UPDATE artikel SET id_user='$id_user', judul='$judul', isi_artikel='$isi', gambar='$gambar', waktu=now() WHERE id_artikel='$id_artikel'";
	}
	mysqli_query($conn, $query);
}

function upArtikel($id) {
	$namaFile = $_FILES['gambar']['name'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah ada gambar yang diupload
	if($error === 4) {
		return 'noimg.png';
	}

	// cek ektensi valid
	$ektensiValid = ['jpg', 'jpeg', 'png'];
	$ektensi = explode('.', $namaFile);
	$ektensi = strtolower(end($ektensi));
	if(!in_array($ektensi, $ektensiValid)) {
		echo "
			<script>
				alert('Ektensi Gambar: jpg, jpeg, png');
			</script>
		";
		return false;
	}

	// nama file baru
	$namaFile = $id.'.'.$ektensi;

	// gambar siap diupload
	move_uploaded_file($tmpName, '../img/artikel/'.$namaFile);
	return $namaFile;
}

?>