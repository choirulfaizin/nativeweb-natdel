<?php
    session_start();
    if(isset($_SESSION['user']) == 0){
?>
<script>alert('Silahkan Melakukan Login dahulu !!');document.location.href="../index.php"</script>
<?php } else { ?>
<html>
    <head>
        <?php include "../include/style.php" ?>
    </head>
    <body>
        <div id="wrapper">
            <?php include "../include/navbar.php" ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Tabel Penjualan
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-exchange fa-lg"></i>
                                    Penjualan
                                </li>
                            </ol>
                        </div>
                    </div><!-- /.row -->
                    <a href="penjualan_transaksi.php">
                        <button class="btn btn-primary" role="button" style="background-color:#00395E;border-color:#00395E;">Tambah Transaksi</button>
                    </a>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Penjualan</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Total</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "../../db/database.php";
                                            koneksi_buka();
                                            $sql = mysql_query("SELECT * FROM penjualan ORDER BY id_penjualan ASC");
                                            $no=1;
                                            while($dt = mysql_fetch_array($sql))
                                            {
                                                echo "
                                                <tr>
                                                    <td>$no</td>
                                                    <td>$dt[id_penjualan]</td>
                                                    <td>$dt[nama_barang]</td>
                                                    <td>$dt[jumlah_jual]</td>
                                                    <td>$dt[harga_jual]</td>
                                                    <td>$dt[diskon]</td>
                                                    <td>$dt[total]</td>
                                                    <td>
                                                        <a class='btn btn-info' href='pelanggan_detail.php?id=".$dt['id_pelanggan']."'>
                                                            <i class='fa fa-eye fa-lg'></i>
                                                        </a>
                                                        <a class='btn btn-success' href='pelanggan_edit.php?id=".$dt['id_pelanggan']."'>
                                                            <i class='fa fa-edit fa-lg'></i>
                                                        </a>
                                                        <a class='btn btn-danger' href='pelanggan_delete.php?id=".$dt['id_pelanggan']."'>
                                                            <i class='fa fa-trash-o fa-lg'></i>
                                                        </a>
                                                    </td>
                                                </tr>";
                                                $no++;
                                            }
                                            koneksi_tutup();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--.row-->
                </div><!--.container-fluid-->
            </div><!--#page-wrapper-->
        </div>
        <?php include "../include/script.php" ?>
    </body>
</html>
<?php } ?>