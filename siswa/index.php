<?php
require_once '../koneksi.php';
$sql = "SELECT siswa.id AS code, siswa.nama,jk,siswa.no_hp,siswa.alamat,kelas.nama_kelas,orangtua.nama_ayah,kota.nama_kota
FROM siswa 
JOIN kelas ON siswa.kelas_id=kelas.id 
JOIN orangtua on siswa.orangtua_id=orangtua.id 
JOIN kota ON siswa.kota_id=kota.id";
$querydata = mysqli_query($con,$sql);
echo mysqli_error($con);
$no = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link rel="stylesheet" href="../dats.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <h1>Data Siswa</h1>
    <hr>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th>No.Hp</th>
            <th>Alamat</th>
            <th>Kelas</th>
            <th>Nama Bapak</th>
            <th>Kota</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <a href="tambah.php" class="tambah"><button> TAMBAH FILE </button></a>

        <?php foreach ($querydata as $key => $data) { ?>
                
            <tr  class="ter">
                <td><?= $no++ ?></td>
                <td><?= $data['nama']?></td>
                <td><?= $data['jk']?></td>
                <td><?= $data['no_hp']?></td>
                <td><?= $data['alamat']?></td>
                <td><?= $data['nama_kelas']?></td>
                <td><?= $data['nama_ayah']?></td>
                <td><?= $data['nama_kota']?></td>
                <td>
                    <a href="edit.php?id=<?= $data['code']?>"><button class="edit"><i data-feather="edit"></i></button></a>
                </td>
                <td>
                    <a onclick="return confirm('Apakah Yakin Data Akan Dihapus?')" href="hapus.php?id=<?= $data['code']?>"><button><i data-feather="trash-2"></i></button></a>
                </td>
            </tr>
        <?php } ?>

    </table>
    <script>
        feather.replace();
    </script>
</body>

</html>