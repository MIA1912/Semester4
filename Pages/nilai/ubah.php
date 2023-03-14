<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once 'function.php';
require_once '../utility/conSQL.php';

$nl_id = $_GET['nilai_id'];
$nl = query("SELECT * FROM nilai WHERE nilai_id = '$nl_id'")[0];


if (isset($_POST['submit'])) : ?>
    <?php
    if (ubah($_POST) > 0) {
        echo "
    <script>
    alert('data berhasil di ubah');
    document.location.href = 'nilai.php';
    </script>
    ";
    } else {
        echo "
    <script>
    alert('data gagal di ubah');
    document.location.href = 'nilai.php';
    </script>
    ";
    }

    ?>
<?php endif ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Nilai</title>
    <link rel="stylesheet" type="text/css" href="../utility/index.css" />
    <style>

    </style>

</head>

<body>
    <!--
        encytype digunakan untuk membuat jalur untuk
        $_post untuk text dan $_file nya itu untuk file
        jadi jika di vardump $_post maka input bertype file tidak akan ditampilkan atau dikelola
    -->
    <?php
    include_once "../home/header.php";
    ?>
    <form action="" method="post" style="margin-left: 20px;">
        <table>
            <caption>
                <h1>Ubah Data Nilai</h1>
            </caption>
            <tr>
                <td><label for="nilai_sem">Semester</label></td>
                <td>:</td>
                <td><input type="number" id="nilai_sem" name="nilai_sem" value="<?= $nl['nilai_sem'] ?>"></td>
            </tr>
            <tr>
                <td><label for="mhs_nim">NIM</label></td>
                <td>:</td>
                <td><input type="text" id="mhs_nim" name="mhs_nim" value="<?= $nl['mhs_nim'] ?>"></td>
            </tr>
            <tr>
                <td><label for="matkul_kd">Kode Matkul</label></td>
                <td>:</td>
                <td><input type="text" id="matkul_kd" name="matkul_kd" value="<?= $nl['matkul_kd'] ?>"></td>
            </tr>
            <tr>
                <td><label for="dsn_nidn">Kode Dosen</label></td>
                <td>:</td>
                <td><input type="text" id="dsn_nidn" name="dsn_nidn" value="<?= $nl['dsn_nidn'] ?>"></td>
            </tr>
            <tr>
                <td>
                    <label for="hadir">Hadir</label>
                </td>
                <td>:</td>
                <td>
                    <input type="number" name="hadir" id="hadir" value="<?= $nl['hadir'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tugas">Tugas</label>
                </td>
                <td>:</td>
                <td>
                    <input type="number" name="tugas" id="tugas" value="<?= $nl['tugas'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kuis">Kuis</label>
                </td>
                <td>:</td>
                <td>
                    <input type="number" name="kuis" id="kuis" value="<?= $nl['kuis'] ?>">
                </td>
            </tr>
            <tr>
            <tr>
                <td><label for="uts">UTS</label></td>
                <td>:</td>
                <td><input type="number" id="uts" name="uts" value="<?= $nl['uts'] ?>"></td>
            </tr>
            <tr>
                <td><label for="uas">UAS</label></td>
                <td>:</td>
                <td><input type="number" id="uas" name="uas" value="<?= $nl['uas'] ?>"></td>
            </tr>
            <td>
                <button type="reset" name="reset" class="reset">Batal</button>
            </td>
            <td></td>
            <td>
                <button type="submit" name="submit" class="submit">Kirim</button>
            </td>
            </tr>
        </table>
    </form>
    <?php
    include_once "../home/footer.php";
    ?>
</body>

</html>