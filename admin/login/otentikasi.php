<?php
    include "../../db/database.php";
    koneksi_buka();
    session_start();
    $user = $_POST['user'];
    $password = $_POST['password'];

    $user = mysql_real_escape_string($user);
    $password = mysql_real_escape_string($password);

        if (empty($user) && empty($password)) {
            header('location:login.php?error=1');
            break;
        } else if (empty($user)) {
            header('location:login.php?error=2');
            break;
        } else if (empty($password)) {
            header('location:login.php?error=3');
            break;
        }

    $sql = mysql_query("SELECT user, password FROM user where user='$user' and password=md5('$password')");

        if (mysql_num_rows($sql) == 1) {
            $_SESSION['user'] = $user;
            header('location:../barang/index.php');
        } else {
            header('location:login.php?error=4');
        }
    koneksi_tutup();
?>