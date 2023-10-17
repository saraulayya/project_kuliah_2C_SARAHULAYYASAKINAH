<HTML>
    <HEAD>
        <title>Koneksi Database MySQL</title>
    </HEAD>
    <BODY>
        <h1>Koneksi database dengan
        mysqli_fetch_array</h1>
        <?php
        $conn=mysqli_connect("localhost", "root", "", "db_saya")
            or die("koneksi gagal");
        $hasil=mysqli_query($conn, "select * from liga"); 
        while ($row = mysqli_fetch_array($hasil)) {
        echo "Liga". $row["negara"]; 
        echo "mempunyai".$row["2"];     //array asosiatif 
        echo "wakil di liga champion <br>"; //array numeris
        }
        ?>
    </BODY>
</HTML>