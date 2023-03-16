<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once "function.php";
require_once "../utility/conSQL.php";

$jlhDataperHal = 4;
$jlhData = count(query("SELECT * FROM kelas"));
$jlhHal = ceil($jlhData / $jlhDataperHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jlhDataperHal * $halAktif) - $jlhDataperHal;

$kelas = query("SELECT * FROM kelas LIMIT $awalData,$jlhDataperHal");

if (isset($_POST['cari'])) {
    $kelas = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas</title>
    <link rel="stylesheet" type="text/css" href="../utility/index.css" />
    <link rel="stylesheet" href="../utility/table.css">
    <style>
        .cari table {
            margin-top: 25px;
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
                tambah data kelas
            </a>
        </div>
        <div class="cari">
            <table>
                <tr>
                    <td>
                        <input type="text" id="keyword" size="25" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off">
                    </td>
                </tr>
            </table>
        </div>
        <div class="pagination">
            <div>
                Jumlah Halaman : <?= $jlhHal ?>
            </div>
            <?php if ($_GET['hal'] > $jlhHal) : ?>
                <label for="pagination" style="color: red;">Halaman <?= $_GET['hal'] ?> tidak ada, hanya ada <?= $jlhHal ?> halaman </label>
            <?php else : ?>
                <label for="pagination">Halaman : <?= $_GET['hal'] ?></label>
            <?php endif ?>
            <br>
            <input style="width: 200px;padding: 5px;" type='number' name='pagination' id='pagination' placeholder="masukkan no halaman">
            <input type="button" value="Cari" name="submit" onclick="cariHal()">
            <br>
        </div>
        <div id="container">
            <table class="greenTable">
                <caption>
                    <h1>Table Data Kelas</h1>
                </caption>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($kelas as $kls) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $kls["kelas_kd"] ?></td>
                            <td><?= $kls["kelas_nama"] ?></td>
                            <td class="ubah">
                                <a href="ubah.php?kelas_kd=<?= $kls["kelas_kd"]; ?>">Ubah</a>
                            </td>
                            <td class="hapus">
                                <a href="hapus.php?kelas_kd=<?= $kls["kelas_kd"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
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
    <script src="js/script.js"></script>
</body>

</html>