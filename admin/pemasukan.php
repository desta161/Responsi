<?php
session_start();

if(!isset($_SESSION["Login"])) {
    header("Location: login_admin.php");
    exit;
}

    require 'function.php';
    $pemasukan = query("SELECT * FROM pemasukan_harian");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Pemasukan Harian</title>
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
                <h2>Pemasukan Harian</h2>

                <table class="table" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Tanggal</th>
                        <th>Total Pemasukan</th>
                    </tr>
                    <?php foreach($pemasukan as $row) : ?>
                    <tr>
                        <td><?= $row["Tanggal"]; ?></td>
                        <td><?= $row["Total_Pemasukan"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <script src="toggle.js"></script>
</body>
</html>