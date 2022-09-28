<?php
    include "../../db/database.php";
    koneksi_buka();
    $data=mysql_query("select * from meja");
    $op=isset($_GET['op'])?$_GET['op']:null;

    if($op=='id_meja'){
        echo"<option>ID Meja</option>";
        while($r=mysql_fetch_array($data)){
            echo "<option value='$r[id_meja]'>$r[id_meja]</option>";
        }
    }elseif($op=='barang'){
        echo'
        <table id="barang" class="table table-striped">
            <thead>
                <tr>
                    <Td colspan="4">
                        <a href="?page=barang&act=tambah" class="btn btn-primary">Tambah Meja</a>
                    </td>
                </tr>
                <tr>
                    <th>ID Meja</th>
                    <th>No Meja</th>
                    <th>Ket</th>
                    <th>Status</th>
                </tr>
            </thead>';
        while($b=mysql_fetch_array($data)){
            echo"
            <tr>
                <td>$b[id_meja]</td>
                <td>$b[no_meja]</td>
                <td>$b[ket]</td>
                <td>$b[status]</td>
            </tr>";
        }
        echo "</table>";
    }elseif($op=='ambildata4'){
        $id_meja=$_GET['id_meja'];
        $dt=mysql_query("select * from meja where id_meja='$id_meja'");
        $d=mysql_fetch_array($dt);
        echo $d['no_meja']."|".$d['ket']."|".$d['status'];
    }elseif($op=='cek'){
        $id=$_GET['id'];
        $sql=mysql_query("select * from meja where id_meja='$id'");
        $cek=mysql_num_rows($sql);
        echo $cek;
    }elseif($op=='update'){
        $id_meja=$_GET['id_meja'];
        $no_meja=htmlspecialchars($_GET['no_meja']);
        $ket=htmlspecialchars($_GET['ket']);
        $status=htmlspecialchars($_GET['status']);

        $update=mysql_query("update meja set no_meja='$no_meja',ket='$ket',status='$status' where id_meja='$id_meja'");
        if($update){
            echo "Sukses";
        }else{
            echo "ERROR. . .";
        }
    }elseif($op=='delete'){
        $id_meja=$_GET['id_meja'];
        $del=mysql_query("delete from meja where id_meja='$id_meja'");
        if($del){
            echo "Sukses";
        }else{
            echo "ERROR";
        }
    }elseif($op=='simpan'){
        $id_meja=$_GET['id_meja'];
        $no_meja=htmlspecialchars($_GET['no_meja']);
        $ket=htmlspecialchars($_GET['ket']);
        $status=htmlspecialchars($_GET['status']);

        $tambah=mysql_query("insert into meja (id_meja,no_meja,ket,status) values ('$id_meja','$no_meja','$ket','$status')");
        if($tambah){
            echo "Sukses";
        }else{
            echo "Error";
        }
    }
    koneksi_tutup();
?>