<?php
session_start();

require 'function_web.php';
include("layout/link_web.php");

if(isset($_SESSION["Login"])) {
    header("Location: index.php");
    exit;
}

if(isset($_POST["Login"])) {
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    $result = mysqli_query($db, "SELECT * FROM User WHERE Username = '$Username'");
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($Password, $row["Password"])) {

            $_SESSION["Login"] = true;

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

if(isset($_POST["Register"])) {
    if(Register($_POST) > 0) {
        echo "
            <script>
                alert('Anda berhasil mendaftarkan akun!');
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Anda gagal mendaftarkan akun!');
            </script>
            ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="layout/form.css" rel="stylesheet">
    <title>Login and Register</title>
</head>
<body>
    <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()">Log In</button>
            <button type="button" class="toggle-btn" onclick="register()">Register</button>
        </div>
        <form id="login" class="input-group" action="" method="POST">
            <input type="text" class="input-field" name="Username" id="Username" placeholder="Username" required>
            <input type="password" class="input-field" name="Password" id="Password" placeholder="Password" required>
            <?php if(isset($error)) : ?>
                <p>Username atau Password salah</p>
            <?php endif; ?>
            <a href="admin/login_admin.php">Admin?</a>
            <button type="submit" class="submit-btn" name="Login">Log In</button>
        </form>
        <form id="register" class="input-group" action="" method="POST">
            <input type="text" class="input-field" name="Username" id="Username" placeholder="Username" required>
            <input type="password" class="input-field" name="Password" id="Password" placeholder="Password" required>
            <input type="password" class="input-field" name="Password2" id="Password2" placeholder="Configuration Password" required>
            <button type="submit" class="submit-btn" name="Register">Register</button>
        </form>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>
</body>
</html>