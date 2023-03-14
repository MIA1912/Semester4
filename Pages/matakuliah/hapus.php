

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once 'function.php';
require_once '../utility/conSQL.php';

$matkul_kd = $_GET["matkul_kd"];

if (hapus($matkul_kd) > 0) {
    echo "
    <script>
    alert('data berhasil di hapus');
    document.location.href = 'matakuliah.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal di hapus');
    document.location.href = 'matakuliah.php';
    </script>
    ";
}
