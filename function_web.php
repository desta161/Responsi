<?php
require 'db.php';

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function Register ($data) {
    global $db;
    global $result;
    $Username = strtolower(stripslashes($data["Username"]));
    $Password = mysqli_real_escape_string($db, $data["Password"]);
    $Password2 = mysqli_real_escape_string($db, $data["Password2"]);
    $result = mysqli_query($db, "SELECT Username FROM user WHERE Username = '$Username'");
    if(mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username sudah terdaftar');
            </script>
            ";
        return false;
    }

    if($Password !== $Password2) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai');
            </script>
            ";
        return false;
    }
    $Password = password_hash($Password, PASSWORD_DEFAULT);
    mysqli_query($db, "CALL insert_user('', '$Username', '$Password')");
    return mysqli_affected_rows($db);
}
?>