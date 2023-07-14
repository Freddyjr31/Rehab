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
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    echo $mysqli->host_info . "\n";

    $result = mysqli_query($mysqli,$query);
    echo "Numero de resultados: $result";
    $result->close();

?>