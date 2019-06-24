<?php
/*Asigno mis variables las cuales coinciden con las del 
formulario html en este caso, registrar.html */

$Nombre = $_POST["txtName"];
$Apellido = $_POST["txtLName"];
$mailito = $_POST["txtmailito"];
$User = $_POST["txtUser"];
$Pass = $_POST["txtPass"];
/*$Pass = password_hash($_POST["txtPass"], PASSWORD_DEFAULT); /*codificamos
 password para proteger usuario*/


/*Asigno mi variable para crear el archivo, con el a+ si ya está
creado, solo sobreescribe */
$file = fopen("registros.txt", "a+");

/*Asigno mi variable para leer el archivo completo */
$fullfile = fread($file, filesize("registros.txt"));

/*Asigno el arreglo explode para poder identificar los saltos de
línea del archivo completo */
$rows = explode(chr(13).chr(10), $fullfile);

/*Con Echo $rows[x] se validan las líneas del arreglo, el cual para
x indica el número de línea a visualizar, así que la primera línea
 comienza en 0 y así suscesivamente */

 /*En caso de querer validar que se están imprimiendo los usuarios 
 un ciclo for para que pueda imprimir todas las líneas desde 0 
 hasta el conteo final de líneas
 for ($a=0; $a < count($rows); $a++) { 
 	echo $rows[$a]."<br>";
 }*/


/*Se agrega ciclo for para buscar por los separadores pipe line dentro
de cada línea*/
$exist = 0;
for ($b=0; $b < count($rows)-1; $b++) { 
	 	$range = explode("|", $rows[$b]);
        
	 /*Validar usuario:	echo $range[3]."<br>";*/
	 	if ($User == $range[3]) {
	 		
	 		echo "Usuario ya existe, intente de nuevo";
	 		$exist = 1;
	 		break;

	 	}

		else{
 		$exist = 0;
 	}
}
if ($exist == 0) {
	/*Antes de escribir los valores en el archivo, los concateno y los
guardo en una sola variable, para salto de línea utilizo los
caracteres hexadecimales */
$reg = $Nombre."|".$Apellido."|".$mailito."|".$User."|".$Pass."|".chr(13).chr(10);

/*Escribo en mi archivo, lo que se almacenó en las variables al llenar el formulario registrar.html */
fwrite($file, $reg);
echo "El usuario se ha registrado correctamente";

}

/*Cierro el archivo*/
fclose($file);

?>
