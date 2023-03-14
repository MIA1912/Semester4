<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once "function.php";
require_once "../utility/conSQL.php";
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="../utility/style.css" />
    <link rel="stylesheet" href="../SCSS/CSS/table.css">
    <style>
        img {
            height: 75px;
            width: auto;
        }
    </style>
</head>

<body>
    <?php
    include_once "../home/header.php";
    ?>
    <main>
        <div class="tambah-data">
            <a href="tambah.php">
                tambah data mahasiswa
            </a>
        </div>
        <div class="cari">
            <form action="" method="post">
                <table>
                    <tr>
                        <td>
                            <input type="text" name="keyword" size="25" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off">
                        </td>
                        <td>
                            <button type="submit" name="cari">
                                <img src="../utility/search.svg" alt="">
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div style="overflow: auto;">
            <table>
                <caption>
                    <h1>Table Data Mahasiswa</h1>
                </caption>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamain</th>
                        <th>Agama</th>
                        <th>Foto</th>
                        <th>Kode Kelas</th>
                        <th>Kode Prodi</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($mahasiswa as $mhs) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $mhs['mhs_nim'] ?></td>
                            <td><?= $mhs['mhs_nama'] ?></td>
                            <td><?= $mhs['mhs_alamat'] ?></td>
                            <td><?= $mhs['mhs_tempat_lahir'] ?></td>
                            <td><?= $mhs['mhs_tgl_lahir'] ?></td>
                            <td><?= $mhs['mhs_jenkel'] ?></td>
                            <td><?= $mhs['mhs_agama'] ?></td>
                            <td>
                                <img src="../Foto/<?= $mhs['mhs_foto']; ?>" alt="">
                            </td>
                            <td><?= $mhs['kelas_kd'] ?></td>
                            <td><?= $mhs['prodi_kd'] ?></td>
                            <td class="ubah">
                                <a href="ubah.php?mhs_nim=<?= $mhs["mhs_nim"]; ?>">Ubah</a>
                            </td>
                            <td class="hapus">
                                <a href="hapus.php?mhs_nim=<?= $mhs["mhs_nim"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php
    include_once "../home/footer.php";
    ?>
</body>

</html>