<?php
    include "../../db/database.php";
    koneksi_buka();
    $data=mysql_query("select * from pelanggan");
    $op=isset($_GET['op'])?$_GET['op']:null;

    if($op=='id_pelanggan'){
        echo"<option>ID Pelanggan</option>";
        while($r=mysql_fetch_array($data)){
            echo "<option value='$r[id_pelanggan]'>$r[id_pelanggan]</option>";
        }
    }elseif($op=='barang'){
        echo'
        <table id="barang" class="table table-striped">
            <thead>
                <tr>
                    <Td colspan="4">
                        <a href="?page=barang&act=tambah" class="btn btn-primary">Tambah Pelanggan</a>
                    </td>
                </tr>
                <tr>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Telephone</th>
                </tr>
            </thead>';
        while($b=mysql_fetch_array($data)){
            echo"
            <tr>
                <td>$b[id_pelanggan]</td>
                <td>$b[nama_pelanggan]</td>
                <td>$b[alamat]</td>
				<td>$b[telepon]</td>
            </tr>";
        }
        echo "</table>";
    }elseif($op=='ambildata2'){
        $id_pelanggan=$_GET['id_pelanggan'];
        $dt=mysql_query("select * from pelanggan where id_pelanggan='$id_pelanggan'");
        $d=mysql_fetch_array($dt);
        echo $d['nama_pelanggan']."|".$d['alamat']."|".$d['telepon'];
    }elseif($op=='cek'){
        $id=$_GET['id'];
        $sql=mysql_query("select * from pelanggan where id_pelanggan='$id'");
        $cek=mysql_num_rows($sql);
        echo $cek;
    }elseif($op=='update'){
        $id_pelanggan=$_GET['id_pelanggan'];
        $nama_pelanggan=htmlspecialchars($_GET['nama_pelanggan']);
        $alamat=htmlspecialchars($_GET['alamat']);
        $telepon=htmlspecialchars($_GET['telepon']);

        $update=mysql_query("update pelanggan set nama_pelanggan='$nama_pelanggan',alamat='$alamat',telepon='$telepon'
        where id_pelanggan='$id_pelanggan'");
        if($update){
            echo "Sukses";
        }else{
            echo "ERROR. . .";
        }
    }elseif($op=='delete'){
        $id_pelanggan=$_GET['id_pelanggan'];
        $del=mysql_query("delete from pelanggan where id_pelanggan='$id_pelanggan'");
        if($del){
            echo "Sukses";
        }else{
            echo "ERROR";
        }
    }elseif($op=='simpan'){
        $id_pelanggan=$_GET['id_pelanggan'];
        $nama_pelanggan=htmlspecialchars($_GET['nama_pelanggan']);
        $alamat=htmlspecialchars($_GET['alamat']);
        $telepon=htmlspecialchars($_GET['telepon']);

        $tambah=mysql_query("insert into pelanggan (id_pelanggan,nama_pelanggan,alamat,telepon)
        values ('$id_pelanggan','$nama_pelanggan','$alamat','$telepon')");
        if($tambah){
            echo "Sukses";
        }else{
            echo "Error";
        }
    }
    koneksi_tutup();
?>