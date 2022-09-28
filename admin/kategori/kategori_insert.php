<?php
    include "../../db/database.php";
    koneksi_buka();

    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $sql = mysql_query("INSERT INTO kategori (id_kategori, nama_kategori)
    VALUES ('$id_kategori', '$nama_kategori')");

    if($sql){
        header("location:index.php");
    }
    else{
        echo"Error";
    }
    koneksi_tutup();
?>