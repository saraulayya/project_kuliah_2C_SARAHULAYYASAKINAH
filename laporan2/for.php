<html>
    <body> 
        <?php
        echo "Mencari huruf vokal dalam suatu kata";
        echo "<br>"; 
        $jumlah = 0;
        $kata = "Belajar PHP"; 
        $huruf = "r"; 
        for ($i = 0; $i < strlen($kata); $i++) {
            if (substr($kata, $i, 1) == $huruf) {
                $jumlah++;
            }
        }
        echo "Jumlah huruf " . $huruf . " dalam kata " . $kata . " :"; 
        echo " ";
        echo $jumlah;
        ?>
    </body>
</html>