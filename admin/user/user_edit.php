<?php
    session_start();
    if(isset($_SESSION['user']) == 0){
?>
<script>alert('Silahkan Melakukan Login dahulu !!');document.location.href="../index.php"</script>
<?php } else { ?>
<html lang="en">
    <head>
        <?php include "../include/style.php" ?>
        <style>
            form span label.show-password
            {
                margin:8px 0 0 1px;
            }
            form span label.show-password input
            {
                cursor:default;
                position:static;
                top:-1px;
            }
            form span label.show-password span
            {
                white-space:nowrap;
                font-size:82%;
                margin:0 0 0 7px;
                padding:0 15px 0 0;
                letter-spacing:normal;
                background:url(alert10x10.png) no-repeat 100% 60%;
            }
        </style>
    </head>
    <?php include "../../db/database.php" ?>
    <body>
        <div id="wrapper">
            <?php include "../include/navbar.php" ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Edit Data User
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <span class="glyphicon glyphicon-user"></span>
                                        User
                                    </a>
                                </li>
                                <li class="active">Edit</li>
                            </ol>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Edit User</h3>
                                </div>
                                <?php
                                    koneksi_buka();
                                    $user = $_GET['id'];
                                    $dt = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE user = '$user'"));
                                    koneksi_tutup();
                                ?>
                                <div class="panel-body">
                                    <form action="aksi_update.php" method="post" class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align:start;">User :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="User" value="<?php echo"$dt[user]" ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: start;">Password Lama :</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="pwd_lama" required="required" class="form-control"
                                                       id="demo-field" placeholder="Password Lama">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: start;">Password Baru :</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="pwd_baru" required="required" class="form-control"
                                                       id="demo-field2" placeholder="Password Baru">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: start;">Ulang Password :</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="confirm" required="required" class="form-control"
                                                       id="demo-field3" placeholder="Konfirmasi Password">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div style="text-align:right;padding-right: 15px;">
                                                <button type="submit" class="btn btn-success btn-sm"
                                                        style="background-color:#00395E;border-color:#00395E;">Edit</button>
                                                <a href="index.php">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            style="background-color:#C0392B;border-color:#C0392B;">
                                                        Batal
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div><!--row-->
                </div>
            </div><!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php include "../include/script.php" ?>
        <script src="../../assets/pwd/ShowPasswordCheckbox.js"></script>
        <script type="text/javascript">
            //add a show password checkbox to the demo-field
            new ShowPasswordCheckbox(document.getElementById("demo-field"));
            
            //test the submitted value
            document.getElementById('demo-form').onsubmit = function()
            {
                alert('password = "' + this.password.value + '"');
                return false;
            };
        </script>
        <script type="text/javascript">
            //add a show password checkbox to the demo-field
            new ShowPasswordCheckbox(document.getElementById("demo-field2"));
            
            //test the submitted value
            document.getElementById('demo-form').onsubmit = function()
            {
                alert('password = "' + this.password.value + '"');
                return false;
            };
        </script>
        <script type="text/javascript">
            //add a show password checkbox to the demo-field
            new ShowPasswordCheckbox(document.getElementById("demo-field3"));
            
            //test the submitted value
            document.getElementById('demo-form').onsubmit = function()
            {
                alert('password = "' + this.password.value + '"');
                return false;
            };
        </script>
    </body>
</html>
<?php } ?>