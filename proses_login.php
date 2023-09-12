<?php
require_once ('koneksi.php');
session_start();

$username = $_POST['username'];
$password = SHA1($_POST['password']);

$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$data = mysqli_query($con,$sql);

$result = mysqli_num_rows($data);

// var_dump($result);
if ($result === 1) {
    $_SESSION['username'] = $username;
    header('location:index.php');
} else {
    echo "username atau password anda salah";
}
