<?php
session_start();
include "connect.php";
$no_janji = (isset($_POST['no_janji'])) ? htmlentities($_POST['no_janji']) : "";
$nama_dokter = (isset($_POST['nama_dokter'])) ? htmlentities($_POST['nama_dokter']) : "";
$spesialis = (isset($_POST['spesialis'])) ? htmlentities($_POST['spesialis']) : "";
$jadwal_temu = (isset($_POST['jadwal_temu'])) ? htmlentities($_POST['jadwal_temu']) : "";
$nama_pasien = (isset($_POST['nama_pasien'])) ? htmlentities($_POST['nama_pasien']) : "";
$proses_input_janji_validate = isset($_POST['input_janji_validate']);

$message = "";

if ($proses_input_janji_validate) {
    $select = mysqli_query($conn, "SELECT * FROM tb_janji WHERE no_janji = '$no_janji'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Order Yang Dimasukan Telah Ada");
                        window.location="../janji"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_janji (no_janji,nama_dokter,spesialis,jadwal_temu,nama_pasien) 
        value ('$no_janji','$nama_dokter','$spesialis','$jadwal_temu','$nama_pasien')");
        

        if ($query) {
            $message = '<script>alert("Data Berhasil Dimasukan");
                        window.location="../?x=janji"</script>';
        } else {
            $message = '<script>alert("Data Gagal Dimasukan")</script>';
        }
    }
}
echo $message;
