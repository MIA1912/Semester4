<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login/login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Administrator</title>
    <link rel="stylesheet" type="text/css" href="../utility/index.css" />
    <link rel="stylesheet" href="../utility/animation.css">
</head>

<body>
    <?php
    include_once "header.php";
    ?>
    <main>
        <h2 class="animate__animated animate__infinite animate__slower animate__shakeX">Selamat datang di Halaman Administrator</h2>
        <p>Ini adalah halaman administrator untuk mengelola situs web.</p>
        <table class="a">
            <tr>
                <th>Company</th>
                <th>Contact</th>
                <th>Country</th>
            </tr>
            <tr>
                <td>Ini adalah halaman administrator untuk mengelola situs web.</td>
                <td>Maria Anders</td>
                <td>Germany</td>
            </tr>
            <tr>
                <td>Berglunds snabbköp</td>
                <td>Christina Berglund</td>
                <td>Sweden</td>
            </tr>
            <tr>
                <td>Centro comercial Moctezuma</td>
                <td>Francisco Chang</td>
                <td>Mexico</td>
            </tr>
            <tr>
                <td>Ernst Handel</td>
                <td>Roland Mendel</td>
                <td>Austria</td>
            </tr>
            <tr>
                <td>Island Trading</td>
                <td>Helen Bennett</td>
                <td>UK</td>
            </tr>
            <tr>
                <td>Königlich Essen</td>
                <td>Philip Cramer</td>
                <td>Germany</td>
            </tr>
            <tr>
                <td>Laughing Bacchus Winecellars</td>
                <td>Yoshi Tannamuri</td>
                <td>Canada</td>
            </tr>
            <tr>
                <td>Magazzini Alimentari Riuniti</td>
                <td>Giovanni Rovelli</td>
                <td>Italy</td>
            </tr>
            <tr>
                <td>North/South</td>
                <td>Simon Crowther</td>
                <td>UK</td>
            </tr>
            <tr>
                <td>Paris spécialités</td>
                <td>Marie Bertrand</td>
                <td>France</td>
            </tr>
        </table>
        <h1>Login</h1>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <label for="agama"><b>Agama</b></label>
        <select name="agama">
            <option value="Islam">Islam</option>
            <option value="Protestan">Protestan</option>
            <option value="Khatolik">Khatolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
        </select>

        <button type="submit">Login</button>

    </main>
    <?php
    include_once "footer.php";
    ?>
</body>

</html>