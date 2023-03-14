

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once 'function.php';
require_once '../utility/conSQL.php';

$prodi_kd = $_GET["prodi_kd"];

if (hapus($prodi_kd) > 0) {
    echo "
    <script>
    alert('data berhasil di hapus');
    document.location.href = 'prodi.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal di hapus');
    document.location.href = 'prodi.php';
    </script>
    ";
}
