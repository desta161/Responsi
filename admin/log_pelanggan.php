<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_admin.php");
    exit;
}

    require 'function.php';
    $log_pelanggan = query("SELECT * FROM log_pelanggan");

    if(isset($_GET["Id_Log"])) {
        if(delete_log_pelanggan($_GET) > 0 ) {
            echo "
            <script>
                alert('Data Log Pelanggan berhasil dihapus');
                document.location.href = 'log_pelanggan.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Log Pelanggan gagal dihapus');
                document.location.href = 'log_pelanggan.php';
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
    <title>Log Pelanggan</title>
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
                <h2>Log Pelanggan</h2>

                <table class="table" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Id Log</th>
                        <th>Id Pelanggan</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>No Tlp</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Tanggal</th>
                        <th>Opsi</th>
                    </tr>
                    <?php foreach($log_pelanggan as $row) : ?>
                    <tr>
                        <td><?= $row["Id_Log"]; ?></td>
                        <td><?= $row["Id_Pelanggan"]; ?></td>
                        <td><?= $row["Username"]; ?></td>
                        <td><?= $row["Nama"]; ?></td>
                        <td><?= $row["No_Tlp"]; ?></td>
                        <td><?= $row["Alamat"]; ?></td>
                        <td><?= $row["Kota"]; ?></td>
                        <td><?= $row["Provinsi"]; ?></td>
                        <td><?= $row["Tanggal"]; ?></td>
                        <td>
                            <button type="button" class="btn">
                                <a href="log_pelanggan.php?Id_Log=<?= $row["Id_Log"]; ?>" onclick="
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