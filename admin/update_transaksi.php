<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_admin.php");
    exit;
}

require 'function.php';
$id = $_GET["Id_Transaksi"];
$transaksi = query("SELECT * FROM transaksi WHERE Id_Transaksi = '$id'")[0];

if(isset($_POST["submit"])) {
    if(update_transaksi($_POST) > 0 ) {
        echo "
        <script>
            alert('Data Transaksi berhasil diubah');
            document.location.href = 'transaksi.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Transaksi gagal diubah');
            document.location.href = 'transaksi.php';
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
    <title>Ubah Data Transaksi </title>
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
                <h2>Ubah Data Transaksi </h2>

                <form action="" method="POST">
                    <input type="hidden" name="Id_Transaksi" id="Id_Transaksi"
                    value="<?= $transaksi["Id_Transaksi"]; ?>">

                    <input type="text" class="form" name="Id_Produk" id="Id_Produk" placeholder="Id Produk" required
                    value="<?= $transaksi["Id_Produk"]; ?>">

                    <input type="text" class="form" name="Id_Pelanggan" id="Id_Pelanggan" placeholder="Id Pelanggan" required
                    value="<?= $transaksi["Id_Pelanggan"]; ?>">

                    <input type="text" class="form" name="Username" id="Username" placeholder="Username" required
                    value="<?= $transaksi["Username"]; ?>">

                    <input type="text" class="form" name="Jumlah" id="Jumlah" placeholder="Jumlah" required
                    value="<?= $transaksi["Jumlah"]; ?>">

                    <input type="text" class="form" name="Total" id="Total" placeholder="Total" required
                    value="<?= $transaksi["Total"]; ?>">

                    <input type="date" class="form" name="Tanggal" id="Tanggal" placeholder="Tanggal" required
                    value="<?= $transaksi["Tanggal"]; ?>">

                    <button type="submit" class="btn" name="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script src="toggle.js"></script>
</body>
</html>