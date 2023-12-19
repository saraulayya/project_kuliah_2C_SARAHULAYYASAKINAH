<?php
include "connect.php";
$id = (isset($_POST['id_petugas'])) ? htmlentities($_POST['id_petugas']) : "";
$nama_petugas = (isset($_POST['nama_petugas'])) ? htmlentities($_POST['nama_petugas']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$password = md5('password');


if (!empty($_POST['input_user_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Username Yang Dimasukan Telah Ada");
                        window.location="../user"</script>';
    } else {

        $query = mysqli_query($conn, "UPDATE tb_user SET nama_petugas = '$nama_petugas', username = '$username', level='$level', password = '$password' WHERE id_petugas = '$id'");

            $message = '<script>alert("Data Berhasil Diedit");
                        window.location="../user"</script>';

    }
}
echo $message;
