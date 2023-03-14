<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once 'function.php';
require_once '../utility/conSQL.php';

// tampil data di URL
$mhsNIM = $_GET['mhs_nim'];
$mhs = query("SELECT * FROM mahasiswa WHERE mhs_nim = '$mhsNIM'")[0];
// $mhs = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE mhs_nim = $mhs_nim");

if (isset($_POST['submit'])) : ?>
    <?php
    if (ubah($_POST) > 0) {
        echo "
    <script>
    alert('data berhasil di ubah');
    document.location.href = 'mahasiswa.php';
    </script>
    ";
    } else {
        echo "
    <script>
    alert('data gagal di ubah');
    document.location.href = 'mahasiswa.php';
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
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="../utility/index.css" />
</head>

<body>
    <?php
    include_once "../home/header.php";
    ?>
    <form action="" method="post" style="margin-left: 20px;" enctype="multipart/form-data">
        <input type="hidden" name="mhs_foto_lama" value="<?= $mhs['mhs_foto'] ?>">
        <table>
            <caption>
                <h1>Ubah Data Mahasiswa</h1>
            </caption>
            <tr>
                <td><label for="mhs_nim">NIM</label></td>
                <td>:</td>
                <td><input type="text" id="mhs_nim" name="mhs_nim" value="<?= $mhs['mhs_nim'] ?>">
                </td>
            </tr>
            <tr>
                <td><label for="mhs_nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" id="mhs_nama" name="mhs_nama" value="<?= $mhs['mhs_nama'] ?>"></td>
            </tr>
            <tr>
                <td><label for="mhs_alamat">Alamat</label></td>
                <td>:</td>
                <td>
                    <textarea name="mhs_alamat" id="mhs_alamat" rows="5"><?= $mhs['mhs_alamat'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td><label for="mhs_tempat_lahir">Tempat Lahir</label></td>
                <td>:</td>
                <td><input type="text" id="mhs_tempat_lahir" name="mhs_tempat_lahir" value="<?= $mhs['mhs_tempat_lahir'] ?>"></td>
            </tr>
            <tr>
                <td><label for="mhs_tgl_lahir">Tanggal Lahir</label></td>
                <td>:</td>
                <td><input type="date" id="mhs_tgl_lahir" name="mhs_tgl_lahir" value="<?= $mhs['mhs_tgl_lahir'] ?>"></td>
            </tr>
            <tr>
                <td><label for="mhs_jenkel">Jenis Kelamin</label></td>
                <td>:</td>
                <td>
                    <input type="radio" id="mhs_jenkel" name="mhs_jenkel" value="Pria" <?php
                                                                                        if ($mhs['mhs_jenkel'] == "Pria") {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>>Pria
                    <input type="radio" id="mhs_jenkel" name="mhs_jenkel" value="Wanita" <?php
                                                                                            if ($mhs['mhs_jenkel'] == "Wanita") {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>Wanita
                </td>
            </tr>
            <tr>
                <td>
                    <label for=mhs_agama>Agama</label>
                </td>
                <td>:</td>
                <td>
                    <select name="mhs_agama" id="mhs_agama">
                        <?php
                        if ($mhs['mhs_agama'] == "Islam") {
                            echo '<option value="Islam" selected>Islam</option>';
                        } else {
                            echo '<option value="Islam" >Islam</option>';
                        }

                        if ($mhs['mhs_agama'] == "Kristen") {
                            echo '<option value="Kristen" selected>Kristen</option>';
                        } else {
                            echo '<option value="Kristen" >Kristen</option>';
                        }

                        if ($mhs['mhs_agama'] == "Katolik") {
                            echo '<option value="Katolik" selected>Katolik</option>';
                        } else {
                            echo '<option value="Katolik" >Katolik</option>';
                        }

                        if ($mhs['mhs_agama'] == "Buddha") {
                            echo '<option value="Buddha" selected>Buddha</option>';
                        } else {
                            echo '<option value="Buddha" >Buddha</option>';
                        }

                        if ($mhs['mhs_agama'] == "Hindu") {
                            echo '<option value="Hindu" selected>Hindu</option>';
                        } else {
                            echo '<option value="Hindu" >Hindu</option>';
                        }

                        if ($mhs['mhs_agama'] == "Konghucu") {
                            echo '<option value="Konghucu" selected>Konghucu</option>';
                        } else {
                            echo '<option value="Konghucu" >Konghucu</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="mhs_foto">Foto</label></td>
                <td>:</td>
                <td>
                    <img src="../Foto/<?= $mhs['mhs_foto'] ?>" width="75px">
                    <br>
                    <input type="file" id="mhs_foto" name="mhs_foto">
                </td>
            </tr>
            <tr>
                <td><label for="kelas_kd">Kode Kelas</label></td>
                <td>:</td>
                <td><input type="text" id="kelas_kd" name="kelas_kd" value="<?= $mhs['kelas_kd'] ?>"></td>
            </tr>
            <tr>
                <td><label for="prodi_kd">Kode Prodi</label></td>
                <td>:</td>
                <td><input type="text" id="prodi_kd" name="prodi_kd" value="<?= $mhs['prodi_kd'] ?>"></td>
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