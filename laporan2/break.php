<html>
    <body> 
        <?php 
        // Melakukan break pada $i == 2
        for ($i = 0; $i <= 4; $i++)
        {
            if ($i == 2)
            {
                break;
            }
            echo ("Nilai i : $i <br>");
        }
        echo ("Loop Selesai");
        ?>
    </body>
</html