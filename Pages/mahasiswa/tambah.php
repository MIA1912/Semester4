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
    document.location.href = 'mahasiswa.php';
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
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="../utility/index.css" />

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
    <form action="" method="post" style="margin-left: 20px;" enctype="multipart/form-data">
        <table>
            <caption>
                <h1>Tambah Data Mahasiswa</h1>
            </caption>
            <tr>
                <td><label for="mhs_nim">NIM</label></td>
                <td>:</td>
                <td><input type="text" id="mhs_nim" name="mhs_nim" required></td>
            </tr>
            <tr>
                <td><label for="mhs_nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" id="mhs_nama" name="mhs_nama" required></td>
            </tr>
            <tr>
                <td><label for="mhs_alamat">Alamat</label></td>
                <td>:</td>
                <td>
                    <textarea name="mhs_alamat" id="mhs_alamat" cols="30" rows="5" required></textarea>
                </td>
            </tr>
            <tr>
                <td><label for="mhs_tempat_lahir">Tempat Lahir</label></td>
                <td>:</td>
                <td><input type="text" id="mhs_tempat_lahir" name="mhs_tempat_lahir" required></td>
            </tr>
            <tr>
                <td><label for="mhs_tgl_lahir">Tanggal Lahir</label></td>
                <td>:</td>
                <td><input type="date" id="mhs_tgl_lahir" name="mhs_tgl_lahir" required></td>
            </tr>
            <tr>
                <td><label for="mhs_jenkel">Jenis Kelamin</label></td>
                <td>:</td>
                <td>
                    <input type="radio" id="mhs_jenkel" name="mhs_jenkel" value="Pria" required>Pria
                    <input type="radio" id="mhs_jenkel" name="mhs_jenkel" value="Wanita" required>Wanita
                </td>
            </tr>
            <tr>
                <td><label for="mhs_agama">Agama</label></td>
                <td>:</td>
                <td>
                    <select name="mhs_agama" id="mhs_agama">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mhs_foto">Foto</label>
                </td>
                <td>:</td>
                <td>
                    <input type="file" id="mhs_foto" name="mhs_foto">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kelas_kd">Kode Kelas</label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="kelas_kd" id="kelas_kd">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prodi_kd">Kode Prodi</label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="prodi_kd" id="prodi_kd">
                </td>
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