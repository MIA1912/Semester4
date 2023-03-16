<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once "function.php";
require_once "../utility/conSQL.php";

$jlhDataperHal = 4;
$jlhData = count(query("SELECT * FROM dosen"));
$jlhHal = ceil($jlhData / $jlhDataperHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jlhDataperHal * $halAktif) - $jlhDataperHal;

$dosen = query("SELECT * FROM dosen LIMIT $awalData,$jlhDataperHal");

if (isset($_POST['cari'])) {
    $dosen = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen</title>
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
                tambah data dosen
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
                    <h1>Table Data Dosen</h1>
                </caption>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>dsn_nidn</th>
                        <th>dsn_nama</th>
                        <th>dsn_alamat</th>
                        <th>dsn_jenkel</th>
                        <th>dsn_agama</th>
                        <th>dsn_no_hp</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($dosen as $dsn) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $dsn["dsn_nidn"] ?></td>
                            <td><?= $dsn["dsn_nama"] ?></td>
                            <td><?= $dsn["dsn_alamat"] ?></td>
                            <td><?= $dsn["dsn_jenkel"] ?></td>
                            <td><?= $dsn["dsn_agama"] ?></td>
                            <td><?= $dsn["dsn_no_hp"] ?></td>
                            <td class="ubah">
                                <a href="ubah.php?dsn_nidn=<?= $dsn["dsn_nidn"]; ?>">Ubah</a>
                            </td>
                            <td class="hapus">
                                <a href="hapus.php?dsn_nidn=<?= $dsn["dsn_nidn"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
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