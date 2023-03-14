<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once "function.php";
require_once "../utility/conSQL.php";
$matkul = query("SELECT * FROM matkul");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Kuliah</title>
    <link rel="stylesheet" href="../SCSS/CSS/table.css">
    <link rel="stylesheet" type="text/css" href="../utility/style.css" />
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
                tambah data matakuliah
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
        <table>
            <caption>
                <h1>Table Data Mata Kuliah</h1>
            </caption>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>matkul_kd</th>
                    <th>matkul_nama</th>
                    <th>matkul_sks</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($matkul as $mk) :
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $mk["matkul_kd"] ?></td>
                        <td><?= $mk["matkul_nama"] ?></td>
                        <td><?= $mk["matkul_sks"] ?></td>
                        <td class="ubah">
                            <a href="ubah.php?matkul_kd=<?= $mk["matkul_kd"]; ?>">Ubah</a>
                        </td>
                        <td class="hapus">
                            <a href="hapus.php?matkul_kd=<?= $mk["matkul_kd"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php
    include_once "../home/footer.php";
    ?>
</body>

</html>