<?php
include('html.php');
 
ob_start();
$html = '';
$html .= naglowek('Moja strona');

$html .= wczytajPlik($_GET['id'].'.txt');

$html .= stopka();
echo "$html";
ob_flush();


 
?>
