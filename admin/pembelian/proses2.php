<?php
    include "../../db/database.php";
    koneksi_buka();
    $data=mysql_query("select * from supplier");
    $op=isset($_GET['op'])?$_GET['op']:null;

    if($op=='id_supplier'){
        echo"<option>ID Supplier</option>";
        while($r=mysql_fetch_array($data)){
            echo "<option value='$r[id_supplier]'>$r[id_supplier]</option>";
        }
    }elseif($op=='barang'){
        echo'
        <table id="barang" class="table table-striped">
            <thead>
                <tr>
                    <Td colspan="4">
                        <a href="?page=barang&act=tambah" class="btn btn-primary">Tambah Supplier</a>
                    </td>
                </tr>
                <tr>
                    <th>ID Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Telephone</th>
                </tr>
            </thead>';
        while($b=mysql_fetch_array($data)){
            echo"
            <tr>
                <td>$b[id_supplier]</td>
                <td>$b[nama_supplier]</td>
                <td>$b[alamat]</td>
				<td>$b[telepon]</td>
            </tr>";
        }
        echo "</table>";
    }elseif($op=='ambildata2'){
        $id_supplier=$_GET['id_supplier'];
        $dt=mysql_query("select * from supplier where id_supplier='$id_supplier'");
        $d=mysql_fetch_array($dt);
        echo $d['nama_supplier']."|".$d['alamat']."|".$d['telepon'];
    }elseif($op=='cek'){
        $id=$_GET['id'];
        $sql=mysql_query("select * from supplier where id_supplier='$id'");
        $cek=mysql_num_rows($sql);
        echo $cek;
    }elseif($op=='update'){
        $id_supplier=$_GET['id_supplier'];
        $nama_supplier=htmlspecialchars($_GET['nama_supplier']);
        $alamat=htmlspecialchars($_GET['alamat']);
        $telepon=htmlspecialchars($_GET['telepon']);

        $update=mysql_query("update supplier set nama_supplier='$nama_supplier',alamat='$alamat',telepon='$telepon'
        where id_supplier='$id_supplier'");
        if($update){
            echo "Sukses";
        }else{
            echo "ERROR. . .";
        }
    }elseif($op=='delete'){
        $id_supplier=$_GET['id_supplier'];
        $del=mysql_query("delete from supplier where id_supplier='$id_supplier'");
        if($del){
            echo "Sukses";
        }else{
            echo "ERROR";
        }
    }elseif($op=='simpan'){
        $id_supplier=$_GET['id_supplier'];
        $nama_supplier=htmlspecialchars($_GET['nama_supplier']);
        $alamat=htmlspecialchars($_GET['alamat']);
        $telepon=htmlspecialchars($_GET['telepon']);

        $tambah=mysql_query("insert into supplier (id_supplier,nama_supplier,alamat,telepon)
        values ('$id_supplier','$nama_supplier','$alamat','$telepon')");
        if($tambah){
            echo "Sukses";
        }else{
            echo "Error";
        }
    }
    koneksi_tutup();
?>