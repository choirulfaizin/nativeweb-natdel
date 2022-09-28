<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['id_kategori'];
    $id_satuan = $_POST['id_satuan'];
    $jenis_barang = $_POST['jenis_barang'];
    $harga_jual = $_POST['harga_jual'];
    $status = $_POST['status'];

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
            //Hapus foto_siswa yang lama jika ada
            $res = mysql_query("select file from barang where id_barang='$id_barang'");
            $d=mysql_fetch_object($res);
            if (strlen($d->file)>3)
            {
                if (file_exists($d->file)) unlink($d->gambar_barang);
            }					
            //update foto_siswa dengan yang baru
            mysql_query("UPDATE barang SET file='$file' WHERE id_barang='$id_barang'");
        }
        else { die("Jenis gambar yang anda kirim salah, harus .jpg .gif .png"); }
    } //end if cek file upload
    $myqry="UPDATE barang SET id_barang='$id_barang', nama_barang='$nama_barang', id_kategori='$id_kategori', id_satuan='$id_satuan',
    jenis_barang='$jenis_barang', harga_jual='$harga_jual', status='$status' WHERE id_barang='$id_barang'";
    mysql_query($myqry) or die(mysql_error());
    header("location: index.php");
    exit;
    koneksi_tutup();
?>