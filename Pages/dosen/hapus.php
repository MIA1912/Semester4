

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}
require_once 'function.php';
require_once '../utility/conSQL.php';

$dsn_nidn = $_GET["dsn_nidn"];

if (hapus($dsn_nidn) > 0) {
    echo "
    <script>
    alert('data berhasil di hapus');
    document.location.href = 'dosen.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal di hapus');
    document.location.href = 'dosen.php';
    </script>
    ";
}
