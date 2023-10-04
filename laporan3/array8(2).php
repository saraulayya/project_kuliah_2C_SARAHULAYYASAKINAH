<?php
    function psgjg ($pjg, $lbr) {
        $luas = $pjg * $lbr;
        return $luas;
    }
    $bil1 = 5;
    $bil2 = 3;
    echo "Luas persegi panjang dengan pjg 5 dan lebar 3=";
    echo psgjg($bil1, $bil2);
?>