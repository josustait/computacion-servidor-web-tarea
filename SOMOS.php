<?php 
$Acerca = $_GET["SOMOS"];

$myfile = fopen("somos.txt", "r") or die ("falla al abrir");
/*$fullfile = fread($file, filesize("somos.txt"));*/
/*Mostramos salida de texto*/
while (!feof ($myfile))
{
	echo fgets ($myfile)."<br>";
}
fclose ($myfile);
?>