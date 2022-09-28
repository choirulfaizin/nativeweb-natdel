<?php
    include "../../db/database.php";
    koneksi_buka();
    $op=isset($_GET['op'])?$_GET['op']:null;
    if($op=='ambilbarang'){
        $data=mysql_query("select * from barang");
        echo"<option>Nama Barang</option>";
        while($r=mysql_fetch_array($data)){
            echo "<option value='$r[id_barang]'>$r[nama_barang]</option>";
        }
    }
    elseif($op=='ambilbarang2'){
        $data=mysql_query("select * from pelanggan");
        echo"<option>Nama Pelanggan</option>";
        while($a=mysql_fetch_array($data)){
            echo "<option value='$a[id_pelanggan]'>$a[nama_pelanggan]</option>";
        }
    }
    elseif($op=='ambilbarang3'){
        $data=mysql_query("select * from karyawan");
        echo"<option>Nama Karyawan</option>";
        while($a=mysql_fetch_array($data)){
            echo "<option value='$a[id_karyawan]'>$a[nama_karyawan]</option>";
        }
    }
    elseif($op=='ambilbarang4'){
        $data=mysql_query("select * from meja");
        echo"<option>No Meja</option>";
        while($a=mysql_fetch_array($data)){
            echo "<option value='$a[id_meja]'>$a[no_meja]</option>";
        }
    }
    elseif($op=='ambildata'){
        $nama_barang=$_GET['nama_barang'];
        $dt=mysql_query("select * from barang where nama_barang='$nama_barang'");
        $d=mysql_fetch_array($dt);
        echo $d['id_barang']."|".$d['id_kategori']."|".$d['id_satuan']."|".$d['harga_jual'];
    }elseif($op=='barang'){
        $brg=mysql_query("select * from penjualan");
        echo"
        <thead>
            <tr>
                <th>No</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Diskon</th>
                <th>Subtotal</th>
                <th></th>
                <td colspan='1'></td>
            </tr>
        </thead>";
        $total=mysql_fetch_array(mysql_query("select sum(subtotal) as total from penjualan"));
        $no=1;
        while($r=mysql_fetch_array($brg)){
            echo"
            <tr>
                <td>$no</td>
                <td>$r[id_barang]</td>
                <td>$r[nama_barang]</td>
                <td>$r[jumlah_jual]</td>
                <td>".number_format($r['harga_jual'],2,',','.')."</td>
                <td>".number_format($r['diskon'],2,',','.')."</td>
                <td>".number_format($r['subtotal'],2,',','.')."</td>
                <td>
                    <div class='btn-group'>
                        <div class='col-md-4'>
                            <button type='button' class='btn btn-xs btn-success'>
                                <a href='#myModal' class='ubah' data-toggle='modal'>
                                    <font color='white'>
                                        <i class='fa fa-edit fa-lg'></i>
                                        Edit
                                    </font>
                                </a>
                            </button>
                        </div>
                        <div class='col-md-4'>
                            <button type='button' class='btn btn-xs btn-danger'>
                                <a href='pk.php?op=hapus&nama_barang=$r[nama_barang]' id='hapus'>
                                    <font color='white'>    
                                        <i class='fa fa-trash-o fa-lg'></i>
                                        Hapus
                                    </font>
                                </a>
                            </button>
                        </div>
                    </div>
                </td>
                <td colspan='1'></td>
            </tr>";
            $no++;
        }
        echo"
        <tr>
            <td colspan='10'></td>
        </tr>
        <tr>
            <td colspan='6'></td>
            <th colspan='1'>Total</th>
            <td colspan='3'>
                <input type='text' class='form-control' name='total' id='total' value='$total[total]' class='span2' disabled>
            </td>
        </tr>";
    }elseif($op=='tambah'){
        $id_barang=$_GET['id_barang'];
        $nama_barang=$_GET['nama_barang'];
        $jumlah_jual=$_GET['jumlah_jual'];
        $harga_jual=$_GET['harga_jual'];
        $diskon=$_GET['diskon'];
        $subtotal=($jumlah_jual*$harga_jual)-$diskon;

        $tambah=mysql_query("INSERT into penjualan (id_barang,nama_barang,jumlah_jual,harga_jual,diskon,subtotal)
        values ('$id_barang','$nama_barang','$jumlah_jual','$harga_jual','$diskon','$subtotal')");

        if($tambah){
            echo "Sukses";
        }else{
            echo "ERROR";
        }
    }elseif($op=='hapus'){
        $nama_barang=$_GET['nama_barang'];
        $del=mysql_query("delete from penjualan where nama_barang='$nama_barang'");
        if($del){
            echo "<script>window.location='penjualan_transaksi.php?page=penjualan&act=tambah&id_meja=$id_meja';</script>";
        }else{
            echo "<script>alert('Hapus Data Berhasil');
            window.location='penjualan_transaksi.php?page=penjualan&act=tambah&id_meja=$id_meja';</script>";
        }
    }elseif($op=='proses'){
        $id_penjualan=$_GET['id_penjualan'];
        $id_barang=$_GET['id_barang'];
        $nama_barang=$_GET['nama_barang'];
        $id_karyawan=$_GET['id_karyawan'];
        $id_pelanggan=$_GET['id_pelanggan'];
        $no_meja=$_GET['no_meja'];
        $jumlah_jual=$_GET['jumlah_jual'];
        $harga_jual=$_GET['harga_jual'];
        $diskon=$_GET['diskon'];
        $status=$_GET['status'];
        $subtotal=$_GET['subtotal'];
        $tgl_penjualan=$_GET['tgl_penjualan'];
        $to=mysql_fetch_array(mysql_query("select sum(subtotal) as total from penjualan"));
        $tot=$to['total'];

        $simpan=mysql_query("insert into penjualan(id_penjualan,id_barang,nama_barang,id_karyawan,id_pelanggan,no_meja,jumlah_jual,
        harga_jual,diskon,status,subtotal,tgl_penjualan,total) values ('$id_penjualan','$id_barang','$nama_barang','$id_karyawan',
        '$id_pelanggan','$no_meja','$jumlah_jual','$harga_jual','$diskon','$status','$subtotal','$tgl_penjualan','$tot')");
        if($simpan){
            $query=mysql_query("select * from penjualan");
            echo "Sukses";
        }else{
            echo "ERROR";
        }
    }elseif($op=='meja'){
        $id_meja=$_GET['id_meja'];
        $status=$_GET['status'];

        $update=mysql_query("update meja set status='terpakai' where id_meja='$id_meja'");
        if($update){
            echo "Sukses";
        }else{
            echo"ERROR";
        }
    }
    koneksi_tutup();
?>