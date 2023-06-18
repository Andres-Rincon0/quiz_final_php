<?php
  header('Content-Type: application/json');

  require_once("../config/conectar.php");
  require_once("../models/Productos.php");

  $productos = new Productos();

  $body = json_decode(file_get_contents("php://input"),true); 

  switch($_GET['op']){
      case "GetAll":
          $datos = $productos->get_producto();
          echo json_encode($datos);
      break;
      
      case "GetId":
          $dato = $productos->get_producto_id($body['id_producto']);
          echo json_encode($dato);
      break;

      case "insert":
          $datos = $productos->insert_producto($body['id_producto'],
          $body['nombre_productos'],
          $body['precio_dia']
          );
          echo json_encode("Insertado Correctamente");
      break;
  }


?>