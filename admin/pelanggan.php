<?php
    session_start();

    if(!isset($_SESSION["Login"])) {
        header("Location: login_admin.php");
        exit;
    }

    require 'function.php';
    $pelanggan = query("SELECT * FROM pelanggan");

    if(isset($_GET["Id_Pelanggan"])) {
        if(delete_pelanggan($_GET) > 0 ) {
            echo "
            <script>
                alert('Data Pelanggan berhasil dihapus');
                document.location.href = 'pelanggan.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Pelanggan gagal dihapus');
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
    <link rel="stylesheet" href="style.css" />
    <title>Pelanggan</title>
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
                <h2>Pelanggan</h2>
                <button type="button" class="btn">
                    <a href="insert_pelanggan.php">Add</a>
                </button><br>

                <table class="table" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Id Pelanggan</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>No Tlp</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Opsi</th>
                    </tr>
                    <?php foreach($pelanggan as $row) : ?>
                    <tr>
                        <td><?= $row["Id_Pelanggan"]; ?></td>
                        <td><?= $row["Username"]; ?></td>
                        <td><?= $row["Nama"]; ?></td>
                        <td><?= $row["No_Tlp"]; ?></td>
                        <td><?= $row["Alamat"]; ?></td>
                        <td><?= $row["Kota"]; ?></td>
                        <td><?= $row["Provinsi"]; ?></td>
                        <td>
                            <button type="button" class="btn">
                                <a href="pelanggan.php?Id_Pelanggan=<?= $row["Id_Pelanggan"]; ?>" onclick="
                                    return confirm('Apakah Anda yakin akan menghapus data?');" >Delete</a>
                            </button>
                            <button type="button" class="btn">
                                <a href="update_pelanggan.php?Id_Pelanggan=<?= $row["Id_Pelanggan"]; ?>" >Update</a>
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