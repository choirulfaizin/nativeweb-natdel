<?php
    include "../../db/database.php";
    koneksi_buka();
    $data=mysql_query("select * from karyawan");
    $op=isset($_GET['op'])?$_GET['op']:null;

    if($op=='id_karyawan'){
        echo"<option>ID Karyawan</option>";
        while($r=mysql_fetch_array($data)){
            echo "<option value='$r[id_karyawan]'>$r[id_karyawan]</option>";
        }
    }elseif($op=='barang'){
        echo'
        <table id="barang" class="table table-striped">
            <thead>
                <tr>
                    <Td colspan="4">
                        <a href="?page=barang&act=tambah" class="btn btn-primary">Tambah Karyawan</a>
                    </td>
                </tr>
                <tr>
                    <th>ID Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Foto Karyawan</th>
                    <th>Alamat</th>
                    <th>Telephone</th>
                </tr>
            </thead>';
        while($b=mysql_fetch_array($data)){
            echo"
            <tr>
                <td>$b[id_karyawan]</td>
                <td>$b[nama_karyawan]</td>
				<td>$b[foto_karyawan]</td>
                <td>$b[alamat]</td>
				<td>$b[telepon]</td>
            </tr>";
        }
        echo "</table>";
    }elseif($op=='ambildata3'){
        $id_karyawan=$_GET['id_karyawan'];
        $dt=mysql_query("select * from karyawan where id_karyawan='$id_karyawan'");
        $d=mysql_fetch_array($dt);
        echo $d['nama_karyawan']."|".$d['foto_karyawan']."|".$d['alamat']."|".$d['telepon'];
    }elseif($op=='cek'){
        $idk=$_GET['idk'];
        $sql=mysql_query("select * from karyawan where id_karyawan='$idk'");
        $cek=mysql_num_rows($sql);
        echo $cek;
    }elseif($op=='update'){
        $id_karyawan=$_GET['id_karyawan'];
        $nama_karyawan=htmlspecialchars($_GET['nama_karyawan']);
        $foto_karyawan=htmlspecialchars($_GET['foto_karyawan']);
        $alamat=htmlspecialchars($_GET['alamat']);
        $telepon=htmlspecialchars($_GET['telepon']);

        $update=mysql_query("update karyawan set nama_karyawan='$nama_karyawan',foto_karyawan='$foto_karyawan',alamat='$alamat',
        telepon='$telepon' where id_karyawan='$id_karyawan'");
        if($update){
            echo "Sukses";
        }else{
            echo "ERROR. . .";
        }
    }elseif($op=='delete'){
        $id_karyawan=$_GET['id_karyawan'];
        $del=mysql_query("delete from karyawan where id_karyawan='$id_karyawan'");
        if($del){
            echo "Sukses";
        }else{
            echo "ERROR";
        }
    }elseif($op=='simpan'){
        $id_karyawan=$_GET['id_karyawan'];
        $nama_karyawan=htmlspecialchars($_GET['nama_karyawan']);
        $foto_karyawan=htmlspecialchars($_GET['foto_karyawan']);
        $alamat=htmlspecialchars($_GET['alamat']);
        $telepon=htmlspecialchars($_GET['telepon']);

        $tambah=mysql_query("insert into karyawan (id_karyawan,nama_karyawan,foto_karyawan,alamat,telepon)
        values ('$id_karyawan','$nama_karyawan','$foto_karyawan','$alamat','$telepon')");
        if($tambah){
            echo "Sukses";
        }else{
            echo "Error";
        }
    }
    koneksi_tutup();
?>