<?php
    session_start();

    if(!isset($_SESSION["Login"])) {
        header("Location: login_admin.php");
        exit;
    }
    require 'function.php';

    $produk = query("SELECT * FROM user");

    if(isset($_GET["Id_User"])) {
        if(delete_user($_GET) > 0 ) {
            echo "
            <script>
                alert('Data User berhasil dihapus');
                document.location.href = 'user.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data User gagal dihapus');
                document.location.href = 'user.php';
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
    <title>Tabel User</title>
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
                <h2>User</h2>

                <table class="table" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Id User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Opsi</th>
                    </tr>
                    <?php foreach($produk as $row) : ?>
                    <tr>
                        <td><?= $row["Id_User"]; ?></td>
                        <td><?= $row["Username"]; ?></td>
                        <td><?= $row["Password"]; ?></td>
                        <td>
                            <button type="button" class="btn">
                                <a href="user.php?Id_User=<?= $row["Id_User"]; ?>" onclick="
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