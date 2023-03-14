<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once "function.php";
require_once "../utility/conSQL.php";
$dosen = query("SELECT * FROM dosen");


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
    <link rel="stylesheet" type="text/css" href="../utility/style.css" />
    <link rel="stylesheet" href="../SCSS/CSS/table.css">
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
    </main>
    <?php
    include_once "../home/footer.php";
    ?>
</body>

</html>