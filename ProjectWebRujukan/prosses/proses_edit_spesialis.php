<?php 
include "connect.php";
$nama_dokter = (isset($_POST['nama_dokter'])) ? htmlentities($_POST['nama_dokter']) : "";
$spesialis = (isset($_POST['spesialis'])) ? htmlentities($_POST['spesialis']) : "";
$no_asisten = (isset($_POST['no_asisten'])) ? htmlentities($_POST['no_asisten']) : "";
$penempatan = (isset($_POST['penempatan'])) ? htmlentities($_POST['penempatan']) : "";
$jadwal_kerja = (isset($_POST['jadwal_kerja'])) ? htmlentities($_POST['jadwal_kerja']) : "";
$input_spesialis_validate= isset($_POST['input_spesialis_validate']);

if(!empty($_POST['input_pasien_validate'])){
    $query = mysqli_query($conn, "UPDATE tb_spesialis SET nama_dokter='$nama_dokter', spesialis='$spesialis', no_asisten='$no_asisten', penempatan='$penempatan', jadwal_kerja='$jadwal_kerja' WHERE nama_dokter='$nama_dokter'");
    if($query){
        $message = '<script>alert("Data berhasil diupdate")
        window.location="../spesialis"</script>';
    }else{
        $message = '<script>alert("Data gagal diupdate")
        window.location="../spesialis"</script>';
    }
}echo $message;
?>