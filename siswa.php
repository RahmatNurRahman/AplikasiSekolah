<?php
session_start();


require_once 'koneksi.php';
$sql = "SELECT siswa.id AS code, siswa.nama,jk,siswa.no_hp,siswa.alamat,kelas.nama_kelas,orangtua.nama_ayah,kota.nama_kota
FROM siswa 
JOIN kelas ON siswa.kelas_id=kelas.id 
JOIN orangtua on siswa.orangtua_id=orangtua.id 
JOIN kota ON siswa.kota_id=kota.id";
$querydata = mysqli_query($con,$sql);
echo mysqli_error($con);
$no = 1;


if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>

<?php
include "header.php";
include "sidebar.php";
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Striped Table</h4>
                  <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Use</th>
                          <th>Nama Siswa</th>
                          <th>Jenis Kelamin</th>
                          <th>No.Hp</th>
                          <th>Alamat</th>
                          <th>Kelas</th>
                          <th>Nama Bapak</th>
                          <th>Kota</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <a href="siswa/tambah.php"><button>Tambah File</button></a>

                      <?php foreach ($querydata as $key => $data) { ?>
                      <tbody>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $data['nama']?></td>
                          <td><?= $data['jk']?></td>
                          <td><?= $data['no_hp']?></td>
                          <td><?= $data['alamat']?></td>
                          <td><?= $data['nama_kelas']?></td>
                          <td><?= $data['nama_ayah']?></td>
                          <td><?= $data['nama_kota']?></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
<?php include "footer.php";?>