

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php ');
}

require_once 'function.php';
require_once '../utility/conSQL.php';

$nilai_id = $_GET["nilai_id"];

if (hapus($nilai_id) > 0) {
    echo "
    <script>
    alert('data berhasil di hapus');
    document.location.href = 'nilai.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal di hapus');
    document.location.href = 'nilai.php';
    </script>
    ";
}
