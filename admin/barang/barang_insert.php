<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_barang=$_POST['id_barang'];
    $nama_barang=$_POST['nama_barang'];
    $id_kategori=$_POST['id_kategori'];
    $id_satuan=$_POST['id_satuan'];
    $jenis_barang=$_POST['jenis_barang'];
    $harga_jual=$_POST['harga_jual'];
    $status=$_POST['status'];

    if (!empty($_FILES["gambar_barang"]["tmp_name"]))
    {
        $namafolder="../../assets/img/gambar_barang/"; //tempat menyimpan file
        $jenis_gambar=$_FILES['gambar_barang']['type'];

        if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
        {
            $gambar_barang = $namafolder . basename($_FILES['gambar_barang']['name']);
            $file = basename($_FILES['gambar_barang']['name']);
            if (!move_uploaded_file($_FILES['gambar_barang']['tmp_name'], $gambar_barang)) 
            {
                die("Gambar gagal dikirim");
            }
        } 
        else { die("Jenis gambar yang anda kirim salah, harus .jpg .gif .png"); }

    } //end if cek file upload

    $sql = mysql_query("insert into barang( id_barang, nama_barang, id_kategori, id_satuan, jenis_barang, harga_jual, status, file)".
                       "values('$id_barang','$nama_barang','$id_kategori','$id_satuan','$jenis_barang','$harga_jual','$status','$file')")
        or die(mysql_error());
    if(sql){
        header('location:index.php');
    }
    koneksi_tutup();
?>