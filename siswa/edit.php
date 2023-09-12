<?php
require_once '../koneksi.php';
$id = $_GET['id'];

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas_id'];
    $orangtua = $_POST['orangtua_id'];
    $kota = $_POST['kota_id'];

    $sql = "UPDATE siswa SET
    nama = '$nama',
    jk = '$jk',
    no_hp = '$no_hp',
    alamat = '$alamat',
    kelas_id = '$kelas',
    orangtua_id = '$orangtua',
    kota_id = $kota
    WHERE id = $id";

    $prosesquery = mysqli_query($con,$sql);
    if ($prosesquery) {
        header('location:index.php');
    }
}
$sql_siswa = "SELECT * FROM siswa WHERE id = $id";
$query = mysqli_query($con,$sql_siswa);
$data_siswa = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah</title>
    <link rel="stylesheet" href="ploss.css">
</head>

<body>
    <center>
        <h1>Tambah Data Orang Tua</h1>
    </center>
    <form action="" method="post">
        <table border="1">
            <thead>
                <th>Column</th>
                <th>Value</th>
            </thead>

            <tr>
                <td><label for="nama bapak"> Nama Siswa:</label></td>
                <td><input type="text" id="nama" value="<?= $data_siswa['nama']?>"  name="nama" required></td>
            </tr>

            <tr>
            <td><label for="status">Jenis Kelamin</label></td>
            <td><input type="radio" name="jk" value="Laki_Laki" required>Laki-Laki <br> <input type="radio" name="jk" value="Perempuan" required>Perempuan</td>
        </tr>

            <tr>
                <td><label for="no_hp"> No.Hp:</label></td>
                <td><input type="number" id="no_hp" value="<?= $data_siswa['no_hp']?>" name="no_hp" required></td>
            </tr>

            <tr>
                <td><label for="alamat"> Alamat:</label></td>
                <td><input type="text" id="alamat" value="<?= $data_siswa['alamat']?>" name="alamat" required></td>
            </tr>

            <tr>
                <td><label for="kota_id"> Nama Kelas:</label></td>
                <select name="kelas_id" id="kelas_id" value="<?= $data_siswa['kelas_id']?>" id="kelas_id">
                    <?php
                    $sql = "SELECT * FROM kelas";
                    $data = mysqli_query($con,$sql);
                    while ($tampil = mysqli_fetch_assoc($data)) {
                        ?>
                    <option value="<?= $tampil['id']?>"> <?= $tampil['nama_kelas'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </tr>
            <tr>
                <td><label for="kota_id"> Nama Orangtua:</label></td>
                <select name="orangtua_id" id="orangtua_id" value="<?= $data_siswa['orangtua_id']?>" id="orangtua_id">
                    <?php
                    $sql = "SELECT * FROM orangtua";
                    $data = mysqli_query($con,$sql);
                    while ($tampil = mysqli_fetch_assoc($data)) {
                    ?>
                    <option value="<?= $tampil['id']?>"> <?= $tampil['nama_ayah'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </tr>
            <tr>
                <td><label for="kota_id"> Nama Kota:</label></td>
                <select name="kota_id" id="kota_id" value="<?= $data_siswa['kota_id']?>" id="kota_id">
                    <?php
                    $sql = "SELECT * FROM kota";
                    $data = mysqli_query($con,$sql);
                    while ($tampil = mysqli_fetch_assoc($data)) {
                    ?>
                    <option value="<?= $tampil['id']?>"> <?= $tampil['nama_kota'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </tr>
        </table>
        <button type="submit" value="submit" name="submit">Tambah File</button>
    </form>

</body>
</html>
