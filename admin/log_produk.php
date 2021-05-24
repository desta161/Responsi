<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_admin.php");
    exit;
}

    require 'function.php';
    $log_produk = query("SELECT * FROM log_produk");

    if(isset($_GET["Id_Log"])) {
        if(delete_log_produk($_GET) > 0 ) {
            echo "
            <script>
                alert('Data Log Produk berhasil dihapus');
                document.location.href = 'log_produk.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Log Produk gagal dihapus');
                document.location.href = 'log_produk.php';
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
    <title>Log Produk</title>
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
                <h2>Log Produk</h2>

                <table class="table" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Id Log</th>
                        <th>Id Produk</th>
                        <th>Nama</th>
                        <th>Brand</th>
                        <th>Kategori</th>
                        <th>By Ingredient</th>
                        <th>By Skincare Goal</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Gambar</th>
                        <th>Opsi</th>
                    </tr>
                    <?php foreach($log_produk as $row) : ?>
                    <tr>
                        <td><?= $row["Id_Log"]; ?></td>
                        <td><?= $row["Id_Produk"]; ?></td>
                        <td><?= $row["Nama"]; ?></td>
                        <td><?= $row["Brand"]; ?></td>
                        <td><?= $row["Kategori"]; ?></td>
                        <td><?= $row["By_Ingredient"]; ?></td>
                        <td><?= $row["By_Skincare_Goal"]; ?></td>
                        <td><?= $row["Harga"]; ?></td>
                        <td><?= $row["Tanggal"]; ?></td>
                        <td><?= $row["Gambar"]; ?></td>
                        <td>
                            <button type="button" class="btn">
                                <a href="log_produk.php?Id_Log=<?= $row["Id_Log"]; ?>" onclick="
                                    return confirm('Apakah Anda yakin akan menghapus data?');" >Delete</a>
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