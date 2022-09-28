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
        $data=mysql_query("select * from supplier");
        echo"<option>Nama Supplier</option>";
        while($a=mysql_fetch_array($data)){
            echo "<option value='$a[id_supplier]'>$a[nama_supplier]</option>";
        }
    }
    elseif($op=='ambilbarang3'){
        $data=mysql_query("select * from karyawan");
        echo"<option>Nama Karyawan</option>";
        while($a=mysql_fetch_array($data)){
            echo "<option value='$a[id_karyawan]'>$a[nama_karyawan]</option>";
        }
    }
    elseif($op=='ambildata'){
        $nama_barang=$_GET['nama_barang'];
        $dt=mysql_query("select * from barang where nama_barang='$nama_barang'");
        $d=mysql_fetch_array($dt);
        echo $d['id_barang']."|".$d['nama_kategori']."|".$d['nama_satuan']."|".$d['harga_jual'];
    }elseif($op=='barang'){
        $brg=mysql_query("select * from sementara2");
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
        $total=mysql_fetch_array(mysql_query("select sum(subtotal) as total from sementara2"));
        $no=1;
        while($r=mysql_fetch_array($brg)){
            echo"
            <tr>
                <td>$no</td>
                <td>$r[id_barang]</td>
                <td>$r[nama_barang]</td>
                <td>$r[jumlah_beli]</td>
                <td>".number_format($r['harga_jual'],2,',','.')."</td>
                <td>".number_format($r['diskon'],2,',','.')."</td>
                <td>".number_format($r['subtotal'],2,',','.')."</td>
                <td>
                    <div class='btn-group'>
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
            <td></td>
        </tr>
        <tr>
            <td colspan='6'></td>
            <th colspan='1'>Total</th>
            <td colspan='3'>
                <input type='text' class='form-control' name='total' id='total' value='$total[total]' class='span2' disabled>
            </td>
            <td colspan='1'></td>
        </tr>";
    }elseif($op=='tambah'){
        $id_barang=$_GET['id_barang'];
        $nama_barang=$_GET['nama_barang'];
        $jumlah_beli=$_GET['jumlah_beli'];
        $harga_jual=$_GET['harga_jual'];
        $diskon=$_GET['diskon'];
        $subtotal=($jumlah_beli*$harga_jual)-$diskon;

        $tambah=mysql_query("INSERT into sementara2 (id_barang,nama_barang,jumlah_beli,harga_jual,diskon,subtotal)
        values ('$id_barang','$nama_barang','$jumlah_beli','$harga_jual','$diskon','$subtotal')");

        if($tambah){
            echo "Sukses";
        }else{
            echo "ERROR";
        }
    }elseif($op=='hapus'){
        $nama_barang=$_GET['nama_barang'];
        $del=mysql_query("delete from sementara2 where nama_barang='$nama_barang'");
        if($del){
            echo "<script>window.location='pembelian_transaksi.php?page=pembelian&act=tambah';</script>";
        }else{
            echo "<script>alert('Hapus Data Berhasil');
            window.location='pembelian_transaksi.php?page=pembelian&act=tambah';</script>";
        }
    }elseif($op=='proses'){
        $id_pembelian=$_GET['id_pembelian'];
        $id_supplier=$_GET['id_supplier'];
        $id_karyawan=$_GET['id_karyawan'];
        $no_nota=$_GET['no_nota'];
        $tgl_pembelian=$_GET['tgl_pembelian'];
        $to=mysql_fetch_array(mysql_query("select sum(subtotal) as total from tabel_sementara_2"));
        $tot=$to['total'];

        $simpan=mysql_query("insert into pembelian(id_pembelian,tgl_pembelian,total,no_nota,id_supplier,id_karyawan)
        values ('$id_pembelian','$tgl_pembelian','$tot','$no_nota','$id_supplier','$id_karyawan')");
        if($simpan){
            $query=mysql_query("select * from sementara2");
            //hapus seluruh isi tabel sementara_2
            mysql_query("truncate table sementara2");
            echo "Sukses";
        }else{
            echo "ERROR";
        }
    }
    koneksi_tutup();
?>