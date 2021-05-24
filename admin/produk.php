<?php
    session_start();

    if(!isset($_SESSION["Login"])) {
        header("Location: login_admin.php");
        exit;
    }
    require 'function.php';

    $produk = query("SELECT * FROM produk");

    if(isset($_GET["Id_Produk"])) {
        if(delete_produk($_GET) > 0 ) {
            echo "
            <script>
                alert('Data Produk berhasil dihapus');
                document.location.href = 'produk.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Produk gagal dihapus');
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
    <link rel="stylesheet" href="style.css" />
    <title>Tabel Produk</title>
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
                <h2>Produk</h2>
                <button type="button" class="btn">
                    <a href="insert_produk.php">Add</a>
                </button><br>

                <table class="table" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Id Produk</th>
                        <th>Nama</th>
                        <th>Brand</th>
                        <th>Kategori</th>
                        <th>By Ingredient</th>
                        <th>By Skincare Goal</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Opsi</th>
                    </tr>
                    <?php foreach($produk as $row) : ?>
                    <tr>
                        <td><?= $row["Id_Produk"]; ?></td>
                        <td><?= $row["Nama"]; ?></td>
                        <td><?= $row["Brand"]; ?></td>
                        <td><?= $row["Kategori"]; ?></td>
                        <td><?= $row["By_Ingredient"]; ?></td>
                        <td><?= $row["By_Skincare_Goal"]; ?></td>
                        <td><?= $row["Harga"]; ?></td>
                        <td><?="<img src='../img/$row[Gambar]'width='70' height='90'/>"; ?></td>
                        <td>
                            <button type="button" class="btn">
                                <a href="produk.php?Id_Produk=<?= $row["Id_Produk"]; ?>" onclick="
                                    return confirm('Apakah Anda yakin akan menghapus data?');" >Delete</a>
                            </button>
                            <button type="button" class="btn">
                                <a href="update_produk.php?Id_Produk=<?= $row["Id_Produk"]; ?>" >Update</a>
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