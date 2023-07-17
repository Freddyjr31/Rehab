<?php
	//Sintaxis de conexión de la base de datos de muestra para PHP y MySQL.
	
	//Conectar a la base de datos
	
	$hostname="127.0.0.1";
	$username="root";
	$password="";
	$dbname="bd_agendarcitas";

	
	# Comprobar si existe registro
	$query = "SELECT * FROM roles";
   
    $mysqli = new mysqli($hostname,$username, $password,$dbname,3306);

    if ($mysqli->connect_errno) {
        die("Conexión fallida: " . $mysqli->connect_errno);
    }

?>