<?php 
session_start();
include "connect.php";
$nama_petugas = (isset($_POST['nama_petugas'])) ? htmlentities($_POST['nama_petugas']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$ubah_profile_validate= isset($_POST['ubah_profile_validate']);

if (!empty($_POST['ubah_profile_validate'])) {
            $query = mysqli_query($conn, "UPDATE tb_user SET nama_petugas='$nama_petugas', username='$username', level='$level' WHERE username = '$_SESSION[username_rujukan]'");
            if($query){
                $message = '<script>alert("Data Profile Berhasil Diupdate");
                window.history.back()</script>';
            }else{
                $message = '<script>alert("Data Profile Gagal Diupdate");
                window.history.back()</script>';
            }
        }else{
            $message = '<script>alert("Terjadi Kesalahan");
            window.history.back()</script>';
        }
echo $message;
?>
