<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_register.php");
    exit;
}

require 'admin/function.php';
include("layout/link_web.php");

if(isset($_POST["submit"])) {
    if(insert_transaksi($_POST) > 0 ) {
        echo "
        <script>
            alert('Anda berhasil melakukan transaksi');
            document.location.href = 'shop.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Anda gagal melakukan transaksi');
            document.location.href = 'shop.php';
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
                <h3>Shopping</h3><br>
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
                        </select><br><br>

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
                        </select><br><br>

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
</body>
</html>