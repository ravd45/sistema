<?php include '../libs/header.php';?>
<?php 
$x = 11001;

if ($x>=6900 && $x<=11000) {
	if(strlen($x)<5){
	$x1 = substr($x, 0,1);
$x2 = substr($x, -3);
$arr = array($x1, $x2);
echo implode(",",$arr);
}else{
$x1 = substr($x, 0,2);
$x2 = substr($x, 2);
$arr = array($x1, $x2);
echo implode(",",$arr);}
}else{
	echo "ingreso no valido";
}


?>
