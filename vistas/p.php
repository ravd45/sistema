<?php 

$curp = 'VEDR940504MVZLZB01';

$fn = substr($curp, 4, 6);
$anio = substr($fn,0,2);
$mes = substr($fn, 2, 2);
$dia = substr($fn, 4);
$genero = substr($curp, 10, 1);
// echo $curp;
// echo $genero;
// echo $anio."<br>";

// if ($anio >= 00 && $anio <= 18) {
// 	echo "20".$anio."-".$mes."-".$dia;
// }else{
// 	echo "19".$anio."-".$mes."-".$dia;
// }

echo $genero;



 ?>