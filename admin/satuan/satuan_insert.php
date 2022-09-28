<?php
    include "../../db/database.php";
    koneksi_buka();

    $id_satuan = $_POST['id_satuan'];
    $nama_satuan = $_POST['nama_satuan'];

    $sql = mysql_query("INSERT INTO satuan (id_satuan, nama_satuan)
    VALUES ('$id_satuan', '$nama_satuan')");

    if($sql){
        header("location:index.php");
    }
    else{
        echo"Error";
    }
    koneksi_tutup();
?>