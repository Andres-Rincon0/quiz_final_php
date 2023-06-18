<?php
  header('Content-Type: application/json');

  require_once("../config/conectar.php");
  require_once("../models/Cotizaciones.php");

  $cotizaciones = new Cotizaciones();

  $body = json_decode(file_get_contents("php://input"),true); 

  switch($_GET['op']){
      case "GetAll":
          $datos = $cotizaciones->get_cotizacion();
          echo json_encode($datos);
      break;
      
      case "GetId":
          $dato = $cotizaciones->get_cotizacion_id($body['id_cotizacion']);
          echo json_encode($dato);
      break;

      case "insert":
          $datos = $cotizaciones->insert_cotizacion($body['id_cotizacion'],
          $body['id_empleado'],
          $body['id_constructora'],
          $body['fecha'],
          $body['total'],
          );
          echo json_encode("Insertado Correctamente");
      break;
  }


?>