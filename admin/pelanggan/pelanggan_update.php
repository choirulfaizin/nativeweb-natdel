<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql = mysql_query("UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', telepon='$telepon'
    WHERE id_pelanggan='$id_pelanggan'");

    if($sql){
        header("location:index.php");
    }
    else{
        echo"Error";
    }
?>