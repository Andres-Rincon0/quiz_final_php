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


  $detalle_cotizaciones = '[
    {
      "id_detalle": 1,
      "id_cotizacion":  1,
      "id_producto":1,
      "fecha_alquiler": "01/23/24",
      "duracion_alquiler": 12
    },
    {
      "id_detalle": 2,
      "id_cotizacion":  2,
      "id_producto": 2,
      "fecha_alquiler": "02/12/23",
      "duracion_alquiler": 24
    }
  ]';



$datosdetalle_cotizaciones = json_decode($detalle_cotizaciones, true);


$server = "localhost";
$user = "campus";
$pass = "campus2023";
$bd = "alquilartemis";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datosdetalle_cotizaciones as $detalle_cotizacion) {
    
    mysqli_query($conexion,"INSERT INTO detalle_cotizaciones (id_detalle, id_cotizacion,id_producto,fecha_alquiler,duracion_alquiler) 
    VALUES ('".$detalle_cotizacion['id_detalle']."','".$detalle_cotizacion['id_cotizacion']."','".$detalle_cotizacion['id_producto']."','".$detalle_cotizacion['fecha_alquiler']."','".$detalle_cotizacion['duracion_alquiler']."')");	
        
}	


mysqli_close($conexion);

?>