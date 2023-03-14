<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once 'function.php';
require_once '../utility/conSQL.php';

// tampil data di URL
$kd_kls = $_GET['kelas_kd'];
$kls = query("SELECT * FROM kelas WHERE kelas_kd = '$kd_kls'")[0];
// $dsn = mysqli_query($conn, "SELECT * FROM dosen WHERE dsn_nidn = $dsn_nidn");

if (isset($_POST['submit'])) : ?>
    <?php
    if (ubah($_POST) > 0) {
        echo "
    <script>
    alert('data berhasil di ubah');
    document.location.href = 'dosen.php';
    </script>
    ";
    } else {
        echo "
    <script>
    alert('data gagal di ubah');
    document.location.href = 'dosen.php';
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
    <title>Ubah Data Dosen</title>
    <link rel="stylesheet" type="text/css" href="../utility/index.css" />
</head>

<body>
    <?php
    include_once "../home/header.php";
    ?>
    <form action="" method="post" style="margin-left: 20px;">
        <table>
            <caption>
                <h1>Ubah Data Dosen</h1>
            </caption>
            <tr>
                <td><label for="kelas_kd">Kode</label></td>
                <td>:</td>
                <td><input type="text" id="kelas_kd" name="kelas_kd" required value="<?= $kls['kelas_kd'] ?>"></td>
            </tr>
            <tr>
                <td><label for="kelas_nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" id="kelas_nama" name="kelas_nama" required value="<?= $kls['kelas_nama'] ?>"></td>
            </tr>
            <tr>
                <td>
                    <button type="reset" name="reset" class="reset">Batal</button>
                </td>
                <td></td>
                <td>
                    <button type="submit" name="submit" class="submit">Ubah Data!</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    include_once "../home/footer.php";
    ?>
</body>

</html>