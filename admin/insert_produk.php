<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_admin.php");
    exit;
}

require 'function.php';
if(isset($_POST["submit"])) {
    if(insert_produk($_POST) > 0 ) {
        echo "
        <script>
            alert('Data Produk berhasil ditambahkan');
            document.location.href = 'produk.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Produk gagal ditambahkan');
            document.location.href = 'produk.php';
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
    <title>Tambah Data Produk</title>
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
                <h2>Tambah Data Produk</h2>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" class="form" name="Id_Produk" id="Id_Produk" placeholder="Id Produk">

                        <input type="text" class="form" name="Nama" id="Nama" placeholder="Nama" required>

                        <input type="text" class="form" name="Brand" id="Brand" placeholder="Brand" required>

                        <input type="text" class="form" name="Kategori" id="Kategori" placeholder="Kategori" required>

                        <input type="text" class="form" name="By_Ingredient" id="By_Ingredient" placeholder="By Ingredient" required>

                        <input type="text" class="form" name="By_Skincare_Goal" id="By_Skincare_Goal" placeholder="By Skincare Goal" required>

                        <input type="text" class="form" name="Harga" id="Harga" placeholder="Harga" required>

                        <input type="text" class="form" name="Gambar" id="Gambar" placeholder="Gambar" required>

                        <button type="submit" class="btn" name="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="toggle.js"></script>
</body>
</html>