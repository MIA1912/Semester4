<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once "function.php";
require_once "../utility/conSQL.php";
$nilai = query("SELECT * FROM nilai");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai</title>
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
                tambah data nilai
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
                <h1>Table Data Nilai</h1>
            </caption>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Semester</th>
                    <th>NIM</th>
                    <th>Kode Matkul</th>
                    <th>NIDN</th>
                    <th>Hadir</th>
                    <th>Tugas</th>
                    <th>Kuis</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($nilai as $nl) :
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $nl["nilai_sem"] ?></td>
                        <td><?= $nl["mhs_nim"] ?></td>
                        <td><?= $nl["matkul_kd"] ?></td>
                        <td><?= $nl["dsn_nidn"] ?></td>
                        <td><?= $nl["hadir"] ?></td>
                        <td><?= $nl["tugas"] ?></td>
                        <td><?= $nl["kuis"] ?></td>
                        <td><?= $nl["uts"] ?></td>
                        <td><?= $nl["uas"] ?></td>
                        <td class="ubah">
                            <a href="ubah.php?nilai_id=<?= $nl["nilai_id"]; ?>">Ubah</a>
                        </td>
                        <td class="hapus">
                            <a href="hapus.php?nilai_id=<?= $nl["nilai_id"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
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