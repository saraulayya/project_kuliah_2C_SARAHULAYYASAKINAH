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
        $select = mysqli_query($conn,"SELECT * FROM tb_pasien WHERE nama_pasien = '$nama_pasien'");
        if(mysqli_num_rows($select) > 0){
            $message = '<script>alert("Data Yang Dimasukan Telah Ada");
                        window.location="../pasien"</script>';
        }else{
        $query = mysqli_query($conn, "INSERT INTO tb_pasien (nama_pasien,tipe_pasien,keluhan,nohp,alamat,asal_rujukan) 
        value ('$nama_pasien','$tipe_pasien','$keluhan','$nohp','$alamat','$asal_rujukan')");
        if($query) {
            $message = '<script>alert("Data Berhasil Dimasukan");
                        window.location="../pasien"</script>';
        }else{
            $message = '<script>alert("Data Gagal Dimasukan")</script>';
        }
    }
    }
    echo $message;
?>