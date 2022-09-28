<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_kategori = $_GET['id_kategori'];
    $id = $_GET['id'];
    $sql = "DELETE FROM kategori WHERE id_kategori =  '$id'";
    $result = mysql_query($sql);

    if ($result){
        header ("location: index.php?id=$id_kategori");
    } else {
        echo "Error";
    }
    koneksi_tutup();
?>