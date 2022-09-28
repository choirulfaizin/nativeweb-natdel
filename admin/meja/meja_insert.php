<?php
    include "../../db/database.php";
    koneksi_buka();

    $id_meja = $_POST['id_meja'];
    $no_meja = $_POST['no_meja'];
    $ket = $_POST['ket'];
    $status = $_POST['status'];

    $sql = mysql_query("INSERT INTO meja (id_meja, no_meja, ket, status) VALUES ('$id_meja', '$no_meja', '$ket', '$status')");

    if($sql){
        header("location:index.php");
    }
    else{
        echo"Error";
    }
    koneksi_tutup();
?>