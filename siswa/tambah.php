<?php
require_once '../koneksi.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas_id'];
    $orangtua = $_POST['orangtua_id'];
    $kota = $_POST['kota_id'];

    $sql = "INSERT INTO siswa VALUES(NULL, '$nama','$jk','$no_hp','$alamat','$kelas','$orangtua','$kota')";

    $prosesquery = mysqli_query($con,$sql);
    if ($prosesquery) {
        header('location:index.php');
    }
}
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
                <td><input type="text" value="" name="nama" required></td>
            </tr>

            <tr>
            <td><label for="status">Jenis Kelamin</label></td>
            <td><input type="radio" name="jk" value="Laki-laki" required>Laki-Laki <br> <input type="radio" name="jk" value="Perempuan" required>Perempuan</td>
        </tr>

            <tr>
                <td><label for="no_hp"> No.Hp:</label></td>
                <td><input type="number" value="" name="no_hp" required></td>
            </tr>

            <tr>
                <td><label for="alamat"> Alamat:</label></td>
                <td><input type="text" value="" name="alamat" required></td>
            </tr>

            <tr>
                <td><label for="kelas_id"> Nama Kelas:</label></td>
                <select name="kelas_id" value="kelas_id" id="kelas_id">
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
                <td><label for="orangtua_id"> Nama Bapak:</label></td>
                <select name="orangtua_id" value="orangtua_id" id="orangtua_id">
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
                <td><label for="orangtua_id"> Nama Ibuk:</label></td>
                <select name="orangtua_id" value="orangtua_id" id="orangtua_id">
                    <?php
                    $sql = "SELECT * FROM orangtua";
                    $data = mysqli_query($con,$sql);
                    while ($tampil = mysqli_fetch_assoc($data)) {
                    ?>
                    <option value="<?= $tampil['id']?>"> <?= $tampil['nama_ibu'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </tr>
            <tr>
                <td><label for="kota_id"> Nama Kota:</label></td>
                <select name="kota_id" value="kota_id" id="kota_id">
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