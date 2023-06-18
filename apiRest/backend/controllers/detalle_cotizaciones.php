<?php
  header('Content-Type: application/json');

  require_once("../config/conectar.php");
  require_once("../models/Detalle_Cotizaciones.php");

  $detalle_cotizaciones = new Detalle_cotizaciones();

  $body = json_decode(file_get_contents("php://input"),true); 

  switch($_GET['op']){
      case "GetAll":
          $datos = $detalle_cotizaciones->get_detalle_cotizaciones();
          echo json_encode($datos);
      break;
      
      case "GetId":
          $dato = $detalle_cotizaciones->get_detalle_cotizaciones_id($body['id_detalle']);
          echo json_encode($dato);
      break;

      case "insert":
          $datos = $detalle_cotizaciones->insert_detalle_cotizaciones($body['id_detalle'],
          $body['id_cotizacion'],
          $body['id_producto'],
          $body['fecha_alquiler'],
          $body['duracion_alquiler'],
          );
          echo json_encode("Insertado Correctamente");
      break;
  }


?>