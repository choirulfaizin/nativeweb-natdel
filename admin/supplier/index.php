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
                                Tabel Supplier
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-user-md fa-lg"></i>
                                    Supplier
                                </li>
                            </ol>
                        </div>
                    </div><!-- /.row -->
                    <a href="supplier_form.php">
                        <button class="btn btn-primary" role="button" style="background-color:#00395E;border-color:#00395E;">Tambah Supplier</button>
                    </a>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width:20px">No</th>
                                            <th>ID Supplier</th>
                                            <th>Nama Supplier</th>
                                            <th>Alamat</th>
                                            <th>Telp</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "../../db/database.php";
                                            koneksi_buka();
                                            $sql = mysql_query("SELECT * FROM supplier ORDER BY id_supplier ASC");
                                            $no=1;
                                            while($dt = mysql_fetch_array($sql))
                                            {
                                                echo "
                                                <tr>
                                                    <td>$no</td>
                                                    <td>$dt[id_supplier]</td>
                                                    <td>$dt[nama_supplier]</td>
                                                    <td>$dt[alamat]</td>
                                                    <td>$dt[telepon]</td>
                                                    <td>
                                                        <a class='btn btn-info' href='supplier_detail.php?id=".$dt['id_supplier']."'>
                                                            <i class='fa fa-eye fa-lg'></i>
                                                        </a>
                                                        <a class='btn btn-success' href='supplier_edit.php?id=".$dt['id_supplier']."'>
                                                            <i class='fa fa-edit fa-lg'></i>
                                                        </a>
                                                        <a class='btn btn-danger' href='supplier_delete.php?id=".$dt['id_supplier']."'>
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