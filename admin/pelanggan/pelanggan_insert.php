<?php
    include"../../db/database.php";
    koneksi_buka();
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql = mysql_query("INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, alamat, telepon)
    VALUES ('$id_pelanggan', '$nama_pelanggan', '$alamat', '$telepon')");

    if($sql){
        header("location:index.php");
    }
    else{
        echo"Error";
    }
    koneksi_tutup();
?>