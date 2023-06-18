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


  $cotizaciones = '[
    {
      "id_cotizacion": 1,
      "id_empleado":  1,
      "id_constructora":1,
      "fecha": "01/23/24",
      "total": 12000.00
    },
    {
      "id_cotizacion": 2,
      "id_empleado":  2,
      "id_constructora": 2,
      "fecha": "02/12/23",
      "total": 24000.00
    }
  ]';



$datoscotizaciones = json_decode($cotizaciones, true);


$server = "localhost";
$user = "campus";
$pass = "campus2023";
$bd = "alquilartemis";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datoscotizaciones as $cotizacion) {
    
    mysqli_query($conexion,"INSERT INTO cotizaciones (id_cotizacion, id_empleado,id_constructora,fecha,total) 
    VALUES ('".$cotizacion['id_cotizacion']."','".$cotizacion['id_empleado']."','".$cotizacion['id_constructora']."','".$cotizacion['fecha']."','".$cotizacion['total']."')");	
        
}	


mysqli_close($conexion);

?>