<?php
session_start();

if (isset($_SESSION["login"])) {
    header('location:../home/index.php');
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
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <style>
        body {
            background-color: #b7cbda;
        }

        #parentBox {
            display: grid;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            width: max-content;
        }

        #childBox {
            align-self: center;
            justify-self: center;
            box-shadow: 0px 0px 5px 3px #000;
            background-color: white;
            color: black;
            padding: 10px;
        }

        @font-face {
            font-family: "Lato";
            src: url("G:\CSSwithW3School\Font\Lato\Lato-Regular.ttf");
        }

        @font-face {
            font-family: "cinzel";
            src: url("G:\CSSwithW3School\Font\Cinzel\Cinzel-VariableFont_wght.ttf");
        }

        h1 {
            font-family: "cinzel", sans-serif;
            text-align: center;
            color: #252525ff;
        }

        td {
            font-family: "Lato", sans-serif;
            padding: 5px;
        }


        table {
            width: fit-content;
            margin: auto;
        }

        .button {
            padding: 20px;
        }

        input[type="reset"] {
            padding: 10px 20px;
            color: red;
            text-transform: uppercase;
            transition: .5s;
            letter-spacing: 4px;
            border: 1px solid red;
            background-color: #1d1c21;
            margin: 5px 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            color: green;
            text-transform: uppercase;
            transition: .5s;
            letter-spacing: 4px;
            border: 1px solid green;
            background-color: #1d1c21;
            margin: 5px 10px;
        }

        input[type="reset"]:hover {
            background: red;
            color: white;
            border-radius: 5px;
            box-shadow: 0 0 5px red, 0 0 25px red, 0 0 50px red, 0 0 100px red;
        }

        input[type="submit"]:hover {
            background: green;
            color: white;
            border-radius: 5px;
            box-shadow: 0 0 5px green, 0 0 25px green, 0 0 50px green, 0 0 100px green;
        }
    </style>
</head>

<body>
    <div id="parentBox">
        <div id="childBox">
            <h1>Login</h1>
            <?php if (isset($error)) : ?>
                <div style="color: red;">
                    Mohon maaf, username atau password anda ada yang salah
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Username</td>
                        <td>&nbsp;</td>
                        <td><input type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>&nbsp;</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                </table>
                <div class="button">
                    <input type="reset" value="Reset" />
                    <input type="submit" value="Submit" name="login" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>