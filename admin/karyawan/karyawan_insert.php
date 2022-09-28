<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_karyawan=$_POST['id_karyawan'];
    $nama_karyawan=$_POST['nama_karyawan'];
    $alamat=$_POST['alamat'];
    $telepon=$_POST['telepon'];

    if (!empty($_FILES["foto_karyawan"]["tmp_name"]))
    {
        $namafolder="../../assets/img/foto/"; //tempat menyimpan file
        $jenis_gambar=$_FILES['foto_karyawan']['type'];

        if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
        {           
            $foto_karyawan = $namafolder . basename($_FILES['foto_karyawan']['name']);

            if (!move_uploaded_file($_FILES['foto_karyawan']['tmp_name'], $foto_karyawan)) 
            {
                die("Gambar gagal dikirim");
            }
        } 
        else { die("Jenis gambar yang anda kirim salah, harus .jpg .gif .png"); }

    } //end if cek file upload

    $sql=mysql_query("insert into karyawan( id_karyawan, nama_karyawan, alamat, telepon, foto_karyawan)". 
                     "values('$id_karyawan','$nama_karyawan','$alamat','$telepon','$foto_karyawan')") or die(mysql_error());
    if(sql){
        header('location:index.php');
    }
    koneksi_tutup();
?>