<?php 
$user = $_POST["txtUser"];
$pass = $_POST["txtPass"];

$myfile = fopen("registros.txt", "r");
$fullmyfile = fread($myfile, filesize("registros.txt"));

/*Separo en lineas identificando los enter*/
$rows =explode(chr(13).chr(10), $fullmyfile);

/*Creo un identificador que cambiaremos a 1 si encontramos el usuario y su password*/

$ok =0;

for ($a=0; $a < count($rows)-1; $a++) 
{ 
/*Separo cada campo (Variable) con un pipe*/

	$range = explode("|", $rows[$a]);
    
/*Busco la localización de usuario y password en el archivo registros.txt ya que se tiene que cumplir la condición de ambos para localizar si existe el usuario*/

	if ($user == $range[3] && $pass == $range[4]) 
	{
		echo "Acceso permitido <br><br>";
		
		/* Al encontrar usuario, se cambia el identificador que se colocó para
		detectar que existe el usuario y hace match con el password*/
		$ok =1;
		
		/*Imprimimos el usuario, notificándole que tiene acceso y cerramos 
		el bucle*/
		
		echo "Nombre: ".$range[0]."<br>";
		echo "Apellido: ".$range[1]."<br>";
        break;

	}
	/*Si no se encuentra el usuario, no incrementamos el identificador*/
	else 
	{
		$ok = 0;	
	}
}
	/*Si no se incrementa el identificador, entonces se le solicita al usuario
	que se registre*/
	
	if ($ok ==0) 
	{
		echo "No tiene acceso, favor de registrarse";
	}
	
?>