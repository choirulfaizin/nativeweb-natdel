<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AWResto | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="../assets/img/awbest.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="../assets/img/awbest.png">
        <link href="../assets/css/admin/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/admin/font-awesome.min.css" rel="stylesheet">
        <link href="../assets/css/admin/AdminLTE.css" rel="stylesheet">
        <link href="../assets/css/admin/animate.css" rel="stylesheet">
        <style>
            form span label.show-password
            {
                margin:8px 0 0 1px;
            }
            form span label.show-password input
            {
                cursor:default;
                position:relative;
                top:-1px;
            }
            form span label.show-password span
            {
                white-space:nowrap;
                font-size:0.95em;
                margin:0 0 0 8px;
                padding:0 15px 0 0;
                letter-spacing:-0.05em;
                background:url(alert10x10.png) no-repeat 100% 60%;
            }
        </style>
    </head>
    <?php include "../db/database.php" ?>
    <body class="login-page bg-black">
        <div class="form-box scrollable animated fadeInDown" id="login-box">
            <div class="header">
                <b style="font-family: serif;">Sign In</b>
            </div>
            <?php
                koneksi_buka();
                if (!empty($_GET['error'])) {
                    if ($_GET['error'] == 1) {
                        echo'<h5 style="font-style: italic;font-family: cursive;">ID User dan Password belum di isi !!</h5>';
                    } else if ($_GET['error'] == 2) {
                        echo'<h5 style="font-style: italic;font-family: cursive;">ID User belum di isi !!</h5>';
                    } else if ($_GET['error'] == 3) {
                        echo'<h5 style="font-style: italic;font-family: cursive;">Password belum di isi !!</h5>';
                    } else if ($_GET['error'] == 4) {
                        echo'<h5 style="font-style: italic;font-family: cursive;">ID User dan Password tidak terdaftar !!</h5>';
                    }
                }
                $p=isset($_GET['act'])?$_GET['act']:null;
                switch($p){
                    default:
                    echo "
                    <form name='login' action='login/cek_login.php' method='post'>
                        <div class='body bg-gray'>
                            <div class='form-group'>
                                <input type='text' name='user' class='form-control' placeholder='User ID' required>
                            </div>
                            <div class='form-group'>
                                <input type='password' name='password' class='form-control' placeholder='Password' id='demo-field' required>
                            </div>
                        </div>
                        <div class='footer'>                                                               
                            <button type='submit' class='btn bg-olive btn-block'>Sign me in</button>
                        </div>
                    </form>
                    ";
                    break;
                }
                koneksi_tutup();
            ?>
        </div>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery-1.8.3.min.js"></script>
        <script src="../assets/pwd/ShowPasswordCheckbox.js"></script>
        <script src="../assets/js/admin/modernizr.js"></script>
        <script src="../assets/js/admin/jquery.cookie.js"></script>
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
    </body>
</html> 