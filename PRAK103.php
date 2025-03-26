<?php
$celcius = 37.841;

$reamur = $celcius * 0.8;
$fahrenheit = ($celcius * 1.8) + 32;
$kelvin = $celcius + 273.15;

printf("Fahrenheit (F) = %.4f<br>", $fahrenheit);
printf("Reamur (R) = %.4f<br>", $reamur);
echo "Kelvin (K) = " . rtrim(sprintf("%.4f", $kelvin), '0') . "\n";
?>
