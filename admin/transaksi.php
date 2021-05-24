<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_admin.php");
    exit;
}

    require 'function.php';
    $transaksi = query("SELECT * FROM transaksi");

    if(isset($_GET["Id_Transaksi"])) {
        if(delete_transaksi($_GET) > 0 ) {
            echo "
            <script>
                alert('Data Transaksi  berhasil dihapus');
                document.location.href = 'transaksi.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Transaksi  gagal dihapus');
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
    <link rel="stylesheet" href="style.css" />
    <title>Transaksi</title>
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
                <h2>Transaksi</h2>
                <button type="button" class="btn">
                    <a href="insert_transaksi.php">Add</a>
                </button><br>

                <table cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Id Transaksi</th>
                        <th>Id Produk</th>
                        <th>Id Pelanggan</th>
                        <th>Username</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Opsi</th>
                    </tr>
                    <?php foreach($transaksi as $row) : ?>
                    <tr>
                        <td><?= $row["Id_Transaksi"]; ?></td>
                        <td><?= $row["Id_Produk"]; ?></td>
                        <td><?= $row["Id_Pelanggan"]; ?></td>
                        <td><?= $row["Username"]; ?></td>
                        <td><?= $row["Jumlah"]; ?></td>
                        <td><?= $row["Total"]; ?></td>
                        <td><?= $row["Tanggal"]; ?></td>
                        <td>
                            <button type="button" class="btn">
                                <a href="transaksi.php?Id_Transaksi=<?= $row["Id_Transaksi"]; ?>" onclick="
                                return confirm('Apakah Anda yakin akan menghapus data?');">Delete</a>
                            </button>
                            <button type="button" class="btn">
                                <a href="update_transaksi.php?Id_Transaksi=<?= $row["Id_Transaksi"]; ?>">Update</a>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <script src="toggle.js"></script>
</body>
</html>