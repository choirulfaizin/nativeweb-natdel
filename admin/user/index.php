<?php
    session_start();
    if(isset($_SESSION['user']) == 0){
?>
<script>alert('Silahkan Melakukan Login dahulu !!');document.location.href="../index.php"</script>
<?php } else { ?>
<html>
    <head>
        <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                Tabel User
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <span class="glyphicon glyphicon-user"></span>
                                    User
                                </li>
                            </ol>
                        </div>
                    </div><!-- /.row -->
                    <a href="user_form.php">
                        <button class="btn btn-primary" role="button" style="background-color:#00395E;border-color:#00395E;">Tambah User</button>
                    </a>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:20px">No</th>
                                        <th>User</th>
                                        <th>Password</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include "../../db/database.php";
                                        koneksi_buka();
                                        $sql = mysql_query("SELECT * FROM user ORDER BY user ASC");
                                        $no=1;
                                        while($dt = mysql_fetch_array($sql))
                                        {
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$dt[user]</td>
                                                <td>**********</td>
                                                <td>
                                                    <a class='btn btn-success' href='user_edit.php?id=".$dt['user']."'>
                                                        <i class='fa fa-edit fa-lg'></i>
                                                    </a>
                                                    <a class='btn btn-danger' href='user_delete.php?id=".$dt['user']."'>
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