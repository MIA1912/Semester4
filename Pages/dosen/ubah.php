<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}
require_once 'function.php';
require_once '../utility/conSQL.php';

// tampil data di URL
$nidn = $_GET['dsn_nidn'];
$dsn = query("SELECT * FROM dosen WHERE dsn_nidn = '$nidn'")[0];
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
                <td><label for="dsn_nidn">NIDN</label></td>
                <td>:</td>
                <td><input type="text" id="dsn_nidn" name="dsn_nidn" value="<?= $dsn['dsn_nidn'] ?>">
                </td>
            </tr>
            <tr>
                <td><label for="dsn_nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" id="dsn_nama" name="dsn_nama" value="<?= $dsn['dsn_nama'] ?>"></td>
            </tr>
            <tr>
                <td><label for="dsn_alamat">Alamat</label></td>
                <td>:</td>
                <td>
                    <textarea name="dsn_alamat" id="dsn_alamat" rows=" 5"><?= $dsn['dsn_alamat'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td><label for="dsn_jenkel">Jenis Kelamin</label></td>
                <td>:</td>
                <td>
                    <input type="radio" id="dsn_jenkel" name="dsn_jenkel" value="Pria" <?php
                                                                                        if ($dsn['dsn_jenkel'] == "Pria") {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>>Pria
                    <input type="radio" id="dsn_jenkel" name="dsn_jenkel" value="Wanita" <?php
                                                                                            if ($dsn['dsn_jenkel'] == "Wanita") {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>Wanita
                </td>
            </tr>
            <tr>
                <td>
                    <label for=dsn_agama>Agama</label>
                </td>
                <td>:</td>
                <td>
                    <select name="dsn_agama" id="dsn_agama">
                        <?php
                        if ($dsn['dsn_agama'] == "Islam") {
                            echo '<option value="Islam" selected>Islam</option>';
                        } else {
                            echo '<option value="Islam" >Islam</option>';
                        }

                        if ($dsn['dsn_agama'] == "Kristen") {
                            echo '<option value="Kristen" selected>Kristen</option>';
                        } else {
                            echo '<option value="Kristen" >Kristen</option>';
                        }

                        if ($dsn['dsn_agama'] == "Katolik") {
                            echo '<option value="Katolik" selected>Katolik</option>';
                        } else {
                            echo '<option value="Katolik" >Katolik</option>';
                        }

                        if ($dsn['dsn_agama'] == "Buddha") {
                            echo '<option value="Buddha" selected>Buddha</option>';
                        } else {
                            echo '<option value="Buddha" >Buddha</option>';
                        }

                        if ($dsn['dsn_agama'] == "Hindu") {
                            echo '<option value="Hindu" selected>Hindu</option>';
                        } else {
                            echo '<option value="Hindu" >Hindu</option>';
                        }

                        if ($dsn['dsn_agama'] == "Konghucu") {
                            echo '<option value="Konghucu" selected>Konghucu</option>';
                        } else {
                            echo '<option value="Konghucu" >Konghucu</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="dsn_no_hp">No HP</label></td>
                <td>:</td>
                <td>
                    <input type="number" name="dsn_no_hp" id="dsn_no_hp" value="<?= $dsn['dsn_no_hp'] ?>">
                </td>
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