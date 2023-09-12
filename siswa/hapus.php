<?php
require_once '../koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM siswa WHERE id = $id";
$data = mysqli_query($con,$sql);
if ($data == TRUE) {
    header('location:index.php');
}
?>