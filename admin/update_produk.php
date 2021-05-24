<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_admin.php");
    exit;
}

require 'function.php';
$id = $_GET["Id_Produk"];
$produk = query("SELECT * FROM produk WHERE Id_Produk = '$id'")[0];

if(isset($_POST["submit"])) {
    if(update_produk($_POST) > 0 ) {
        echo "
        <script>
            alert('Data Produk berhasil diubah');
            document.location.href = 'produk.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Produk gagal diubah');
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
    <title>Ubah Data Produk</title>
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
                <h2>Ubah Data Produk</h2>

                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="Id_Produk" id="Id_Produk"
                        value="<?= $produk["Id_Produk"]; ?>">

                        <input type="text" class="form" name="Nama" id="Nama" placeholder="Nama" required
                        value="<?= $produk["Nama"]; ?>">

                        <input type="text" class="form" name="Brand" id="Brand" placeholder="Brand" required
                        value="<?= $produk["Brand"]; ?>">

                        <input type="text" class="form" name="Kategori" id="Kategori" placeholder="Kategori" required
                        value="<?= $produk["Kategori"]; ?>">

                        <input type="text" class="form" name="By_Ingredient" id="By_Ingredient" placeholder="By Ingredients" required
                        value="<?= $produk["By_Ingredient"]; ?>">

                        <input type="text" class="form" name="By_Skincare_Goal" id="By_Skincare_Goal" placeholder="By Skincare Goal" required
                        value="<?= $produk["By_Skincare_Goal"]; ?>">

                        <input type="text" class="form" name="Harga" id="Harga" placeholder="Harga" required
                        value="<?= $produk["Harga"]; ?>">

                        <input type="text" class="form" name="Gambar" id="Gambar" placeholder="Gambar" required
                        value="<?= $produk["Gambar"]; ?>">

                        <button type="submit" class="btn" name="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="toggle.js"></script>
</body>
</html>