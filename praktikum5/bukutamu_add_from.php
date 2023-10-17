<!DOCTYPE html>
<html>
<head>
    <title>Simpan Buku Tamu</title>
</head>
<body>
    <h1>Simpan Buku Tamu MySQL</h1>

    <?php
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $komentar = $_POST["komentar"];
    $conn = mysqli_connect("localhost", "root", "", "db_saya") or die("Koneksi gagal");

    echo "Nama: $nama <br>";
    echo "Email: $email <br>";
    echo "Komentar: $komentar <br>";

    $hasil = mysqli_query($conn, "INSERT INTO bukutamu (nama, email, komentar) VALUES ('$nama', '$email', '$komentar')");

    if ($hasil) {
        echo "Simpan bukutamu berhasil dilakukan";
    } else {
        echo "Simpan bukutamu gagal dilakukan";
    }
    ?>
</body>
</html>