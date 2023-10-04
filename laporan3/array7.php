<?php
    $str = "Belajar PHP ternyata Menangkan";
    echo strtolower($str); //Ubah huruf ke kecil semua
    echo "<br>";
    echo strtoupper($str); //Ubah huruf ke besar semua
    echo "<br>";
    echo str_replace("Menyenangkan", "mudah lho",$str);
    //mengganti string
?>