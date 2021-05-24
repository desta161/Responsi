<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_admin.php");
    exit;
}

require 'function.php';
if(isset($_POST["submit"])) {
    if(insert_transaksi($_POST) > 0 ) {
        echo "
        <script>
            alert('Data Transaksi berhasil ditambahkan');
            document.location.href = 'transaksi.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Transaksi gagal ditambahkan');
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
    <title>Tambah Data Transaksi</title>
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
                <h2>Tambah Data Transaksi</h2>

                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form" name="Id_Transaksi" id="Id_Transaksi" placeholder="Id Transaksi">

                        <label for="Id_Produk" class="label">Id Produk</label><br>
                        <?php
                            $list_produk = query("SELECT * FROM produk");
                        ?>
                        <select class="form" name="Id_Produk" id="Id_Produk" require>
                            <?php
                            foreach($list_produk as $produk) {
                                echo "<option value=".$produk['Id_Produk'].">".$produk['Nama']."</option>";
                            }
                            ?>
                        </select>

                        <label for="Id_Pelanggan" class="label">Id Pelanggan</label><br>
                        <?php
                            $list_pelanggan = query("SELECT * FROM pelanggan");
                        ?>
                        <select class="form" name="Id_Pelanggan" id="Id_Pelanggan" require>
                            <?php
                            foreach($list_pelanggan as $pelanggan) {
                                echo "<option value=".$pelanggan['Id_Pelanggan'].">".$pelanggan['Nama']."</option>";
                            }
                            ?>
                        </select>

                        <input type="text" class="form" name="Username" id="Username" placeholder="Username" required>

                        <input type="text" class="form" name="Jumlah" id="Jumlah" placeholder="Jumlah" required>

                        <input type="text" class="form" name="Total" id="Total" placeholder="Total" required>

                        <input type="date" class="form" name="Tanggal" id="Tanggal" placeholder="Tanggal" required>

                        <button type="submit" class="btn" name="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="toggle.js"></script>
</body>
</html>
