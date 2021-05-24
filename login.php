<?php
session_start();

if(isset($_SESSION["Login"])) {
    header("Location: produk.php");
    exit;
}

require 'function.php';
if(isset($_POST["Login"])) {
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    $result = mysqli_query($db, "SELECT * FROM USER WHERE Username = '$Username'");
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($Password, $row["Password"])) {

            $_SESSION["Login"] = true;

            header("Location: produk.php");
            exit;
        }
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
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if(isset($error)) : ?>
        <p>Username atau Password salah</p>
    <?php endif; ?>

    <form action="" method="POST">
    <ul>
        <li>
            <label for="Username">Username :</label>
            <input type="text" name="Username" id="Username">
        </li>
        <li>
            <label for="Password">Password :</label>
            <input type="password" name="Password" id="Password">
        </li>
        <li>
            <button type="submit" name="Login">Login</button>
        </li>
    </ul>
    </form>
</body>
</html>