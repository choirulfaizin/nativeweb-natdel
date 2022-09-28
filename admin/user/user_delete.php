<?php
    include "../../db/database.php";
    koneksi_buka();
    $user = $_GET['user'];
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE user =  '$id'";
    $result = mysql_query($sql);

    if ($result){
        header ("location: index.php?id=$user");
    } else {
        echo "Error";
    }
    koneksi_tutup();
?>