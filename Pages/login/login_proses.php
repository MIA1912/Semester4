<?php
session_start();

if (isset($_SESSION["login"])) {
    header('location: ../home/index.php');
    exit;
}
$conn = mysqli_connect("localhost", "root", "", "db_ilham");
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

    $cek = mysqli_num_rows($result);
    if ($cek === 1) {
        $_SESSION['login'] = true;
        header('location:../home/index.php');
        exit;
    } else {
        header('location:login.php');
    }
}
