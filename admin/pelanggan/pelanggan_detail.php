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
                                Detail Pelanggan
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="fa fa-user fa-lg"></i>
                                        Pelanggan
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
                                    <h3 class="panel-title">Detail Pelanggan</h3>
                                </div>
                                <div class="panel-body">
                                    <?php
                                        include "../../db/database.php";
                                        koneksi_buka();
                                        $id_pelanggan = $_GET['id'];
                                        $dt = mysql_fetch_array(mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'"));
                                        koneksi_tutup();
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <tbody>
                                                <tr>
                                                    <td align="right">ID Pelanggan</td>
                                                    <td>:</td>
                                                    <td><?php echo"$dt[id_pelanggan]" ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Nama</td>
                                                    <td>:</td>
                                                    <td><?php echo"$dt[nama_pelanggan]" ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Alamat</td>
                                                    <td>:</td>
                                                    <td><?php echo"$dt[alamat]" ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Telp</td>
                                                    <td>:</td>
                                                    <td><?php echo"$dt[telepon]" ?></td>
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
    </body>
</html>
<?php } ?>