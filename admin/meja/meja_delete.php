<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_meja = $_GET['id_meja'];
    $id = $_GET['id'];
    $sql = "DELETE FROM meja WHERE id_meja =  '$id'";
    $result = mysql_query($sql);

    if ($result){
        header ("location: index.php?id=$id_meja");
    } else {
        echo "Error";
    }
    koneksi_tutup();
?>