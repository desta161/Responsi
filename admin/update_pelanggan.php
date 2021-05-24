<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_admin.php");
    exit;
}

require 'function.php';
$id = $_GET["Id_Pelanggan"];
$Pelanggan = query("SELECT * FROM pelanggan WHERE Id_Pelanggan = '$id'")[0];

if(isset($_POST["submit"])) {
    if(update_pelanggan($_POST) > 0 ) {
        echo "
        <script>
            alert('Data Pelanggan berhasil diubah');
            document.location.href = 'pelanggan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Pelanggan gagal diubah');
            document.location.href = 'pelanggan.php';
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
    <link rel="stylesheet" href="style.css"/>
    <title>Ubah Data Pelanggan </title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div id="sidebar-wrapper">
            <?php
                include("link.php");
                include("sidebar.php");
            ?>
        </div>
        <div id="page-content-wrapper">
            <?php include("header.php"); ?>
            <div class="container-fluid px-4">
                <h2>Ubah Data Pelanggan </h2>
                <form action="" method="POST">
                    <input type="hidden" name="Id_Pelanggan" id="Id_Pelanggan"
                    value="<?= $Pelanggan["Id_Pelanggan"]; ?>">

                    <input type="text" class="form" name="Username" id="Username" placeholder="Username" required
                    value="<?= $Pelanggan["Username"]; ?>">

                    <input type="text" class="form" name="Nama" id="Nama" placeholder="Nama" required
                    value="<?= $Pelanggan["Nama"]; ?>">

                    <input type="text" class="form" name="No_Tlp" id="No_Tlp" placeholder="No Telepon" required
                    value="<?= $Pelanggan["Alamat"]; ?>">

                    <input type="text" class="form" name="Alamat" id="Alamat" placeholder="Alamat" required
                    value="<?= $Pelanggan["Alamat"]; ?>">

                    <input type="text" class="form" name="Kota" id="Kota" placeholder="Kota" required
                    value="<?= $Pelanggan["Alamat"]; ?>">

                    <input type="text" class="form" name="Provinsi" id="Provinsi" placeholder="Provinsi" required
                    value="<?= $Pelanggan["Alamat"]; ?>">

                    <button type="submit" class="btn" name="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script src="toggle.js"></script>
</body>
</html>