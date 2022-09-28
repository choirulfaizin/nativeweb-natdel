<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql = mysql_query("UPDATE supplier SET nama_supplier='$nama_supplier', alamat='$alamat', telepon='$telepon'
    WHERE id_supplier='$id_supplier'");

    if($sql){
        header("location:index.php");
    }
    else{
        echo"Error";
    }
    koneksi_tutup();
?>