<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

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
            //Hapus foto_siswa yang lama jika ada
            $res = mysql_query("select foto_karyawan from karyawan where id_karyawan='$id_karyawan'");
            $d=mysql_fetch_object($res);
            if (strlen($d->foto_karyawan)>3)
            {
                if (file_exists($d->foto_karyawan)) unlink($d->foto_karyawan);
            }					
            //update foto_siswa dengan yang baru
            mysql_query("UPDATE karyawan SET foto_karyawan='$foto_karyawan' WHERE id_karyawan='$id_karyawan'");
        } 
        else { die("Jenis gambar yang anda kirim salah. Harus .jpg .gif .png"); }
    } //end if cek file upload
    $myqry="UPDATE karyawan SET id_karyawan='$id_karyawan', nama_karyawan='$nama_karyawan', alamat='$alamat', telepon='$telepon'
            WHERE id_karyawan='$id_karyawan'";
    mysql_query($myqry) or die(mysql_error());
    header("location: index.php");
    exit;
    koneksi_tutup();
?>