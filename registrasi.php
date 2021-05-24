<?php
require 'function.php';
if(isset($_POST["Sign"])) {
    if(sign($_POST) > 0) {
        echo "
            <script>
                alert('Anda berhasil melakukan Sign Up!');
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Anda gagal melakukan Sign Up!');
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
    <title>Registrasi</title>
</head>
<body>
    <h1>Registrasi</h1>
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
            <label for="Password2">Konfirmasi Password :</label>
            <input type="password" name="Password2" id="Password2">
        </li>
        <li>
            <button type="submit" name="Sign">Sign Up</button>
        </li>
    </ul>
    </form>
</body>
</html>