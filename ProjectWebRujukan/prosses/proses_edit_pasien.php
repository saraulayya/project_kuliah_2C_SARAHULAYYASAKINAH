<?php 
include "connect.php";
$nama_pasien = (isset($_POST['nama_pasien'])) ? htmlentities($_POST['nama_pasien']) : "";
$tipe_pasien = (isset($_POST['tipe_pasien'])) ? htmlentities($_POST['tipe_pasien']) : "";
$keluhan = (isset($_POST['keluhan'])) ? htmlentities($_POST['keluhan']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$asal_rujukan = (isset($_POST['asal_rujukan '])) ? htmlentities($_POST['asal_rujukan ']) : "";
$input_pasien_validate= isset($_POST['input_pasien_validate']);

if(!empty($_POST['input_pasien_validate'])){
    $query = mysqli_query($conn, "UPDATE tb_pasien SET nama_pasien='$nama_pasien', tipe_pasien='$tipe_pasien', keluhan='$keluhan', nohp='$nohp', alamat='$alamat', asal_rujukan='$asal_rujukan' WHERE nama_pasien='$nama_pasien'");
    if($query){
        $message = '<script>alert("Data berhasil diupdate")
        window.location="../pasien"</script>';
    }else{
        $message = '<script>alert("Data gagal diupdate")
        window.location="../pasien"</script>';
    }
}echo $message;
?>