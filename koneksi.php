<?php 
$host = "localhost";
$user = "root";
$pass = '';
$db = "db_siswa";

$con = mysqli_connect($host,$user,$pass,$db);
if (!$con) {
    echo "Gagal Koneksi";
}
?>