<?php
    include "connect.php";
    $nama_petugas = (isset($_POST['nama_petugas'])) ? htmlentities($_POST['nama_petugas']) : "";
    $username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
    $level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
    $password = md5('password');

    if(!empty($_POST['input_user_validate'])){
        $select = mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$username'");
        if(mysqli_num_rows($select) > 0){
            $message = '<script>alert("Username Yang Dimasukan Telah Ada");
                        window.location="../user"</script>';
        }else{
        $query = mysqli_query($conn, "INSERT INTO tb_user (nama_petugas,username,level,password) 
        value ('$nama_petugas','$username','$level','$password')");
        if($query) {
            $message = '<script>alert("Data Berhasil Dimasukan");
                        window.location="../user"</script>';
        }else{
            $message = '<script>alert("Data Gagal Dimasukan")</script>';
        }
    }
    }
    echo $message;
?>