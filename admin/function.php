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

function insert_produk($data) {
    global $db;
    $Id_Produk = htmlspecialchars($data["Id_Produk"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Brand = htmlspecialchars($data["Brand"]);
    $Kategori = htmlspecialchars($data["Kategori"]);
    $By_Ingredient = htmlspecialchars($data["By_Ingredient"]);
    $By_Skincare_Goal = htmlspecialchars($data["By_Skincare_Goal"]);
    $Harga = htmlspecialchars($data["Harga"]);
    $Gambar = htmlspecialchars($data["Gambar"]);
    mysqli_query($db, "CALL insert_produk('$Id_Produk', '$Nama', '$Brand', '$Kategori', '$By_Ingredient', '$By_Skincare_Goal', '$Harga', '$Gambar')");
    return mysqli_affected_rows($db);
}

function insert_transaksi($data) {
    global $db;
    $Id_Transaksi = htmlspecialchars($data["Id_Transaksi"]);
    $Id_Produk = htmlspecialchars($data["Id_Produk"]);
    $Id_Pelanggan = htmlspecialchars($data["Id_Pelanggan"]);
    $Username = htmlspecialchars($data["Username"]);
    $Jumlah = htmlspecialchars($data["Jumlah"]);
    $Total = htmlspecialchars($data["Total"]);
    $Tanggal = htmlspecialchars($data["Tanggal"]);
    mysqli_query($db, "CALL insert_transaksi('$Id_Transaksi', '$Id_Produk', '$Id_Pelanggan', '$Username', '$Jumlah', '$Total', '$Tanggal')");
    return mysqli_affected_rows($db);
}

function insert_pelanggan($data) {
    global $db;
    $Username = htmlspecialchars($data["Username"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $No_Tlp = htmlspecialchars($data["No_Tlp"]);
    $Alamat = htmlspecialchars($data["Alamat"]);
    $Kota = htmlspecialchars($data["Kota"]);
    $Provinsi = htmlspecialchars($data["Provinsi"]);
    mysqli_query($db, "CALL insert_pelanggan('', '$Username', '$Nama', '$No_Tlp', '$Alamat', '$Kota', '$Provinsi')");
    return mysqli_affected_rows($db);
}

function update_produk($data) {
    global $db;
    $Id_Produk = htmlspecialchars($data["Id_Produk"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Brand = htmlspecialchars($data["Brand"]);
    $Kategori = htmlspecialchars($data["Kategori"]);
    $By_Ingredient = htmlspecialchars($data["By_Ingredient"]);
    $By_Skincare_Goal = htmlspecialchars($data["By_Skincare_Goal"]);
    $Harga = htmlspecialchars($data["Harga"]);
    $Gambar = htmlspecialchars($data["Gambar"]);
    mysqli_query($db, "CALL update_produk('$Id_Produk', '$Nama', '$Brand', '$Kategori', '$By_Ingredient', '$By_Skincare_Goal', '$Harga', '$Gambar')");
    return mysqli_affected_rows($db);
}

function update_transaksi($data) {
    global $db;
    $Id_Transaksi = htmlspecialchars($data["Id_Transaksi"]);
    $Id_Produk = htmlspecialchars($data["Id_Produk"]);
    $Id_Pelanggan = htmlspecialchars($data["Id_Pelanggan"]);
    $Username = htmlspecialchars($data["Username"]);
    $Jumlah = htmlspecialchars($data["Jumlah"]);
    $Total = htmlspecialchars($data["Total"]);
    $Tanggal = htmlspecialchars($data["Tanggal"]);
    mysqli_query($db, "CALL update_transaksi('$Id_Transaksi', '$Id_Produk', '$Id_Pelanggan', '$Username', '$Jumlah', '$Total', '$Tanggal')");
    return mysqli_affected_rows($db);
}

function update_pelanggan($data) {
    global $db;
    $Id_Pelanggan = htmlspecialchars($data["Id_Pelanggan"]);
    $Username = htmlspecialchars($data["Username"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $No_Tlp = htmlspecialchars($data["No_Tlp"]);
    $Alamat = htmlspecialchars($data["Alamat"]);
    $Kota = htmlspecialchars($data["Kota"]);
    $Provinsi = htmlspecialchars($data["Provinsi"]);
    mysqli_query($db, "CALL update_pelanggan('$Id_Pelanggan', '$Username', '$Nama', '$No_Tlp', '$Alamat', '$Kota', '$Provinsi')");
    return mysqli_affected_rows($db);
}

function delete_produk($data) {
    global $db;
    $Id_Produk = $data["Id_Produk"];
    mysqli_query($db, "CALL delete_produk('$Id_Produk')");
    return mysqli_affected_rows($db);
}

function delete_transaksi($data) {
    global $db;
    $Id_Transaksi = $data["Id_Transaksi"];
    mysqli_query($db, "CALL delete_transaksi('$Id_Transaksi')");
    return mysqli_affected_rows($db);
}

function delete_pelanggan($data) {
    global $db;
    $Id_Pelanggan = $data["Id_Pelanggan"];
    mysqli_query($db, "CALL delete_pelanggan('$Id_Pelanggan')");
    return mysqli_affected_rows($db);
}

function delete_log_produk($data) {
    global $db;
    $Id_Log = $data["Id_Log"];
    mysqli_query($db, "CALL delete_log_produk('$Id_Log')");
    return mysqli_affected_rows($db);
}

function delete_log_transaksi($data) {
    global $db;
    $Id_Log = $data["Id_Log"];
    mysqli_query($db, "CALL delete_log_transaksi('$Id_Log')");
    return mysqli_affected_rows($db);
}

function delete_log_pelanggan($data) {
    global $db;
    $Id_Log = $data["Id_Log"];
    mysqli_query($db, "CALL delete_log_pelanggan('$Id_Log')");
    return mysqli_affected_rows($db);
}
function delete_user($data) {
    global $db;
    $Id_User = $data["Id_User"];
    mysqli_query($db, "CALL delete_user('$Id_User')");
    return mysqli_affected_rows($db);
}
?>