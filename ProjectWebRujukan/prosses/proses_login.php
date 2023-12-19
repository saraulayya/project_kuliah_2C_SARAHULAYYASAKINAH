<?php
session_start();
include "connect.php";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username'])  : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : "";
if (!empty($_POST['submit-validate'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        $_SESSION['username_rujukan'] = $hasil['username'];
        $_SESSION['level_rujukan'] = $hasil['level'];
        $_SESSION['id_rujukan'] = $hasil['id'];
        header('location:../home');
    } else { 
        header('location:../login.php?status=gagal');
    }
}else{
    echo 'empty';
}
?>