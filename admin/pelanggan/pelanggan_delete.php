<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_pelanggan = $_GET['id_pelanggan'];
    $id = $_GET['id'];
    $sql = "DELETE FROM pelanggan WHERE id_pelanggan =  '$id'";
    $result = mysql_query($sql);

    if ($result){
        header ("location: index.php?id=$id_pelanggan");
    } else {
        echo "Error";
    }
    koneksi_tutup();
?>