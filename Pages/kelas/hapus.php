

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}
require_once 'function.php';
require_once '../utility/conSQL.php';

$kelas_kd = $_GET["kelas_kd"];

if (hapus($kelas_kd) > 0) {
    echo "
    <script>
    alert('data berhasil di hapus');
    document.location.href = 'kelas.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal di hapus');
    document.location.href = 'kelas.php';
    </script>
    ";
}
