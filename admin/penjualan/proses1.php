<?php
    include "../../db/database.php";
    koneksi_buka();
    $data=mysql_query("select * from barang");
    $op=isset($_GET['op'])?$_GET['op']:null;

    if($op=='id_barang'){
        echo"<option>ID Barang</option>";
        while($r=mysql_fetch_array($data)){
            echo "<option value='$r[id_barang]'>$r[id_barang]</option>";
        }
    }elseif($op=='barang'){
        echo'
        <table id="barang" class="table table-striped">
            <thead>
                <tr>
                    <Td colspan="4">
                        <a href="?page=barang&act=tambah" class="btn btn-primary">Tambah Barang</a>
                    </td>
                </tr>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Gambar Barang</th>
                    <th>Jumlah jenis_barang</th>
                    <th>Harga Jual</th>
                </tr>
            </thead>';
        while($b=mysql_fetch_array($data)){
            echo"
            <tr>
                <td>$b[id_barang]</td>
                <td>$b[nama_barang]</td>
                <td>$b[id_kategori]</td>
                <td>$b[id_satuan]</td>
                <td>$b[gambar_barang]</td>
                <td>$b[jenis_barang]</td>
                <td>$b[harga_jual]</td>
            </tr>";
        }
        echo "</table>";
    }elseif($op=='ambildata'){
        $id_barang=$_GET['id_barang'];
        $dt=mysql_query("select * from barang where id_barang='$id_barang'");
        $d=mysql_fetch_array($dt);
        echo $d['nama_barang']."|".$d['id_kategori']."|".$d['id_satuan']."|".$d['gambar_barang']."|".
             $d['jenis_barang']."|".$d['harga_jual'];
    }elseif($op=='cek'){
        $id=$_GET['id'];
        $sql=mysql_query("select * from barang where id_barang='$id'");
        $cek=mysql_num_rows($sql);
        echo $cek;
    }elseif($op=='update'){
        $id_barang=$_GET['id_barang'];
        $nama_barang=htmlspecialchars($_GET['nama_barang']);
        $id_kategori=htmlspecialchars($_GET['id_kategori']);
        $id_satuan=htmlspecialchars($_GET['id_satuan']);
        $gambar_barang=htmlspecialchars($_GET['gambar_barang']);
        $jenis_barang=htmlspecialchars($_GET['jenis_barang']);
        $harga_jual=htmlspecialchars($_GET['harga_jual']);

        $update=mysql_query("update barang set nama_barang='$nama_barang',id_kategori='$id_kategori',id_satuan='$id_satuan',
        gambar_barang='$gambar_barang',jenis_barang='$jenis_barang',harga_jual='$harga_jual' where id_barang='$id_barang'");
        if($update){
            echo "Sukses";
        }else{
            echo "ERROR. . .";
        }
    }elseif($op=='delete'){
        $id_barang=$_GET['id_barang'];
        $del=mysql_query("delete from barang where id_barang='$id_barang'");
        if($del){
            echo "Sukses";
        }else{
            echo "ERROR";
        }
    }elseif($op=='simpan'){
        $id_barang=$_GET['id_barang'];
        $nama_barang=htmlspecialchars($_GET['nama_barang']);
        $id_kategori=htmlspecialchars($_GET['id_kategori']);
        $id_satuan=htmlspecialchars($_GET['id_satuan']);
        $gambar_barang=htmlspecialchars($_GET['gambar_barang']);
        $jenis_barang=htmlspecialchars($_GET['jenis_barang']);
        $harga_jual=htmlspecialchars($_GET['harga_jual']);

        $tambah=mysql_query("insert into barang (id_barang,nama_barang,id_kategori,id_satuan,gambar_barang,jenis_barang,harga_jual)
        values ('$id_barang','$nama_barang','$id_kategori','$id_satuan','$gambar_barang','$jenis_barang','$harga_jual')");
        if($tambah){
            echo "Sukses";
        }else{
            echo "Error";
        }
    }
    koneksi_tutup();
?>