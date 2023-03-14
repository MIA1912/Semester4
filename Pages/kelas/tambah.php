<?php

session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once 'function.php';
require_once '../utility/conSQL.php';

if (isset($_POST['submit'])) {
    // ketikkan vardump untuk melihat index arraynya
    // var_dump($_POST);
    // var_dump($_FILES);

    if (tambah($_POST) > 0) {
        echo "
    <script>
    alert('data berhasil di tambah');
    document.location.href = 'kelas.php';
    </script>
    ";
    } else {
        echo "
    <script>
    alert('data gagal di tambah');
    </script>
    ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kelas</title>
    <link rel="stylesheet" type="text/css" href="../utility/index.css" />
    <style>
        .reset {
            color: red;
            border: 1px solid red;
            background-color: white;
        }

        .submit {
            color: green;
            border: 1px solid green;
            background-color: white;
        }

        .reset:hover {
            color: white;
            border: 1px solid white;
            background-color: red;
        }

        .submit:hover {
            color: white;
            border: 1px solid white;
            background-color: green;
        }
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
                <h1>Tambah Data Kelas</h1>
            </caption>
            <tr>
                <td><label for="kelas_kd">Kode</label></td>
                <td>:</td>
                <td><input type="text" id="kelas_kd" name="kelas_kd" required></td>
            </tr>
            <tr>
                <td><label for="kelas_nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" id="kelas_nama" name="kelas_nama" required></td>
            </tr>
            <tr>
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