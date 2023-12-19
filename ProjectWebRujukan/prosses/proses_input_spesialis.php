<?php
    include "connect.php";
    $nama_dokter = (isset($_POST['nama_dokter'])) ? htmlentities($_POST['nama_dokter']) : "";
    $spesialis = (isset($_POST['spesialis'])) ? htmlentities($_POST['spesialis']) : "";
    $no_asisten = (isset($_POST['no_asisten'])) ? htmlentities($_POST['no_asisten']) : "";
    $penempatan = (isset($_POST['penempatan'])) ? htmlentities($_POST['penempatan']) : "";
    $jadwal_kerja= (isset($_POST['jadwal_kerja'])) ? htmlentities($_POST['jadwal_kerja']) : "";

    if(!empty($_POST['input_spesialis_validate'])){
        $select = mysqli_query($conn,"SELECT * FROM tb_spesialis WHERE nama_dokter = '$nama_dokter'");
        if(mysqli_num_rows($select) > 0){
            $message = '<script>alert("Data Yang Dimasukan Telah Ada");
                        window.location="../spesialis"</script>';
        }else{
        $query = mysqli_query($conn, "INSERT INTO tb_spesialis (nama_dokter,spesialis,no_asisten,penempatan,jadwal_kerja) 
        value ('$nama_dokter','$spesialis','$no_asisten','$penempatan','$jadwal_kerja')");
        if($query) {
            $message = '<script>alert("Data Berhasil Dimasukan");
                        window.location="../spesialis"</script>';
        }else{
            $message = '<script>alert("Data Gagal Dimasukan")</script>';
        }
    }
    }
    echo $message;
?>