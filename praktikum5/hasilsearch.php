<?php
// if(isset($_POST['kolom'])){
//     $kolom = $_POST['kolom'];
// }else{
//     $kolom ='';
// }
(isset($_POST['kolom'])) ? $kolom = $_POST['kolom']: $kolom ='' ;

if(isset($_POST['cari'])){
    $cari = $_POST['cari'];
}else{
    $cari = '';
}

$conn = mysqli_connect("localhost", "root", "", "db_saya");

$hasil = mysqli_query($conn, "SELECT * FROM bukutamu WHERE '$kolom' LIKE '%$cari%'");

$jumlah = mysqli_num_rows($hasil);

echo "<br>";
echo "Ditemukan: $jumlah";
echo "<br>";

while ($baris = mysqli_fetch_array($hasil)) {
    echo "Nama: ";
    echo $baris[0];
    echo "<br>";
    echo "Email: ";
    echo $baris[1];
    echo "<br>";
    echo "Komentar: ";
    echo $baris[2];
    echo "<br>";
}
?>