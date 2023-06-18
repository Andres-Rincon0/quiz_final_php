<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
//json_decode  ->  Takes a JSON encoded string and converts it into a PHP value.
//json_encode  ->  Returns the JSON representation of a value

//PDO_MYSQL 
//is a driver that implements the PHP Data Objects (PDO) interface to enable 
//access from PHP to MySQL databases.


//MySQLi
//PDO will work on 12 different database systems, whereas MySQLi will only work with MySQL databases


  $clientes = '[
    {
      "id_cliente": 1,
      "obra_clientes": "edificio",
      "nombre_clientes": "yisus",
      "telefono": 3123456778,
      "direccion_clientes":"calle 51"
    },
    {
      "id_cliente": 2,
      "obra_clientes": "colegio",
      "nombre_clientes": "Andres",
      "telefono": 3219413412,
      "direccion_clientes":"calle 50"
    }
  ]';



$datosclientes = json_decode($clientes, true);


$server = "localhost";
$user = "campus";
$pass = "campus2023";
$bd = "alquilartemis";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datosclientes as $cliente) {
    
    mysqli_query($conexion,"INSERT INTO clientes (id_cliente, obra_clientes,nombre_clientes, telefono, direccion_clientes) 
    VALUES ('".$cliente['id_cliente']."','".$cliente['obra_clientes']."','".$cliente['nombre_clientes']."','".$cliente['telefono']."','".$cliente['direccion_clientes']."')");	
        
}	


mysqli_close($conexion);

?>