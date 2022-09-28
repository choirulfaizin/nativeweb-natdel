<?php
    session_start();
    if(isset($_SESSION['user']) == 0){
?>
<script>alert('Silahkan Melakukan Login dahulu !!');document.location.href="../index.php"</script>
<?php } else { ?>
<html lang="en">
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
                                Detail Barang
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="fa fa-dashboard"></i>
                                        Barang
                                    </a>
                                </li>
                                <li class="active">Detail</li>
                            </ol>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Detail Barang</h3>
                                </div>
                                <div class="panel-body">
                                    <?php
                                        include "../../db/database.php";
                                        koneksi_buka();
                                        $id_barang = $_GET['id'];
                                        $dt = mysql_fetch_array(mysql_query("SELECT barang.*, kategori.nama_kategori, satuan.nama_satuan
                                        FROM (barang LEFT JOIN kategori on barang.id_kategori=kategori.id_kategori) LEFT JOIN satuan
                                        on barang.id_satuan=satuan.id_satuan WHERE id_barang = '$id_barang'"));
                                        koneksi_tutup();
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <tbody>
                                                <tr>
                                                    <td align="right">ID Barang</td>
                                                    <td>:</td>
                                                    <td><?php echo"$dt[id_barang]" ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Nama</td>
                                                    <td>:</td>
                                                    <td><?php echo"$dt[nama_barang]" ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Kategori</td>
                                                    <td>:</td>
                                                    <td><?php echo"$dt[id_kategori]" ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Satuan</td>
                                                    <td>:</td>  
                                                    <td><?php echo"$dt[id_satuan]" ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Jenis</td>
                                                    <td>:</td>  
                                                    <td><?php echo"$dt[jenis_barang]" ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Harga</td>
                                                    <td>:</td>  
                                                    <td><?php echo"$dt[harga_jual]" ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Status</td>
                                                    <td>:</td>  
                                                    <td><?php echo"$dt[status]" ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Gambar</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo"
                                                            <img src='../../assets/img/gambar_barang/". $dt['file']."' class='img-rounded zoom'
                                                            style='width:150px;height:100px;'>";
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="form-group">
                                            <div style="text-align:right;padding-right: 15px;">
                                                <a href="index.php">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            style="background-color:#C0392B;border-color:#C0392B;">
                                                        Kembali
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div><!--row-->
                </div>
            </div><!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php include "../include/script.php" ?>
        <script src="../../assets/js/zoomerang.js"></script>
        <script>
            Array.prototype.forEach.call(document.querySelectorAll('p'), function (p, i) {
                
            })
            Zoomerang
                .config({
                    bgColor: '#000',
                    bgOpacity: .90,
                    onOpen: openCallback,
                    onClose: closeCallback
                })
                .listen('.zoom')

            function openCallback (el) {
                console.log('zoomed in on: ')
                console.log(el)
            }

            function closeCallback (el) {
                console.log('zoomed out on: ')
                console.log(el)
            }
        </script>
    </body>
</html>
<?php } ?>