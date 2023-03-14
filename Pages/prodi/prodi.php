<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once "function.php";
require_once "../utility/conSQL.php";
$prodi = query("SELECT * FROM prodi");

if (isset($_POST['cari'])) {
    $prodi = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodi</title>
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
                tambah data prodi
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
                <h1>Table Data Prodi</h1>
            </caption>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenjang</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($prodi as $prd) :
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $prd["prodi_kd"] ?></td>
                        <td><?= $prd["prodi_nama"] ?></td>
                        <td><?= $prd["prodi_jenjang"] ?></td>
                        <td class="ubah">
                            <a href="ubah.php?prodi_kd=<?= $prd["prodi_kd"]; ?>">Ubah</a>
                        </td>
                        <td class="hapus">
                            <a href="hapus.php?prodi_kd=<?= $prd["prodi_kd"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
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