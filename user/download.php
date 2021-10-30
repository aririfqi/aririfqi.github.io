<?php  
require 'ceklogin.php';
require '../function.php';

if(!isset($_GET["filename"])) {
	echo "<script> window.location.href='kelas.php'; </script>";
} else {
	$filename = $_GET['filename'];
    $file = "../file/".$filename;

    $oriname = query("SELECT nama_file FROM pengumpulan WHERE file='$filename'")[0];
     
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($oriname["nama_file"]));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: private');
        header('Pragma: private');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        
        exit;
    } 
    else {
        echo "
        <script> 
        	alert('File Tidak Ditemukan!');
        	window.history.back();
        </script>
        ";
    }
}

?>