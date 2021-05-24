<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_register.php");
    exit;
}

require 'admin/function.php';
include("layout/link_web.php");

if(isset($_POST["submit"])) {
    if(insert_pelanggan($_POST) > 0 ) {
        echo "
        <script>
            alert('Anda berhasil mendaftarkan akun customer');
            document.location.href = 'customer.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Anda gagal mendaftarkan akun customer');
            document.location.href = 'customer.php';
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
    <link rel="stylesheet" href="layout/web.css"/>
    <title>Register Account Customer</title>
</head>
<body>
    <div class="container-fluid">
        <div class="header">
            <?php
                include("navbar.php");
            ?>
        </div>
        <div class="container">
            <div class="container-tiga">
                <h3>Register Account Customer</h3><br>
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form" name="Id_Pelanggan" id="Id_Pelanggan" placeholder="Id Pelanggan">

                        <input type="text" class="form" name="Username" id="Username" placeholder="Username" required>

                        <input type="text" class="form" name="Nama" id="Nama" placeholder="Nama" required>

                        <input type="text" class="form" name="No_Tlp" id="No_Tlp" placeholder="No Telepon" required>

                        <input type="text" class="form" name="Alamat" id="Alamat" placeholder="Alamat" required>

                        <input type="text" class="form" name="Kota" id="Kota" placeholder="Kota" required>

                        <input type="text" class="form" name="Provinsi" id="Provinsi" placeholder="Provinsi" required>

                        <button type="submit" class="btn" name="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>