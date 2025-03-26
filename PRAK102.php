<?php
$jari_jari = 4.2;
$tinggi = 5.4;

function volumeTabung($r, $t)
{
    return pi() * pow($r, 2) * $t;
}

$volume = volumeTabung($jari_jari, $tinggi);
echo number_format($volume, 3) . " m3";
?>