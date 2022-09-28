<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_satuan = $_GET['id_satuan'];
    $id = $_GET['id'];
    $sql = "DELETE FROM satuan WHERE id_satuan =  '$id'";
    $result = mysql_query($sql);

    if ($result){
        header ("location: index.php?id=$id_satuan");
    } else {
        echo "Error";
    }
    koneksi_tutup();
?>