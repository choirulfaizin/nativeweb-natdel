<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_supplier = $_GET['id_supplier'];
    $id = $_GET['id'];
    $sql = "DELETE FROM supplier WHERE id_supplier =  '$id'";
    $result = mysql_query($sql);

    if ($result){
        header ("location: index.php?id=$id_supplier");
    } else {
        echo "Error";
    }
    koneksi_tutup();
?>