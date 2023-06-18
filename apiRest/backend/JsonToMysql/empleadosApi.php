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


  $empleados = '[
    {
      "id_empleado":  1,
      "nombre_empleados": "yisus",
      "salario_mensual": 1200000,
      "sexo": "Masculino"
    },
    {
      "id_empleado":  2,
      "nombre_empleados": "Andres",
      "salario_mensual": 1200000,
      "sexo": "Masculino"
    }
  ]';



$datosempleados = json_decode($empleados, true);


$server = "localhost";
$user = "campus";
$pass = "campus2023";
$bd = "alquilartemis";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


foreach ($datosempleados as $empleado) {
    
    mysqli_query($conexion,"INSERT INTO empleados (id_empleado,nombre_empleados,salario_mensual,sexo) 
    VALUES ('".$empleado['id_empleado']."','".$empleado['nombre_empleados']."','".$empleado['salario_mensual']."','".$empleado['sexo']."')");	
        
}	


mysqli_close($conexion);

?>