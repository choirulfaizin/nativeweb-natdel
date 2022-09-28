<?php
    include"../../db/database.php";
    koneksi_buka();
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql = mysql_query("INSERT INTO supplier (id_supplier, nama_supplier, alamat, telepon)
    VALUES ('$id_supplier', '$nama_supplier', '$alamat', '$telepon')");

    if($sql){
        header("location:index.php");
    }
    else{
        echo"Error";
    }
    koneksi_tutup();
?>