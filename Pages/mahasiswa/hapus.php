

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}
require_once 'function.php';
require_once '../utility/conSQL.php';

$mhs_nim = $_GET["mhs_nim"];

if (hapus($mhs_nim) > 0) {
    echo "
    <script>
    alert('data berhasil di hapus');
    document.location.href = 'mahasiswa.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal di hapus');
    document.location.href = 'mahasiswa.php';
    </script>
    ";
}
