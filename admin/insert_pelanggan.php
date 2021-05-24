<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_admin.php");
    exit;
}

require 'function.php';
if(isset($_POST["submit"])) {
    if(insert_pelanggan($_POST) > 0 ) {
        echo "
        <script>
            alert('Data Pelanggan berhasil ditambahkan');
            document.location.href = 'pelanggan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Pelanggan gagal ditambahkan');
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
    <title>Tambah Data Pelanggan</title>
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
                <h2>Tambah Data Pelanggan</h2>

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
    <script src="toggle.js"></script>
</body>
</html>