<?php
  header('Content-Type: application/json');

  require_once("../config/conectar.php");
  require_once("../models/Clientes.php");

  $clientes = new Clientes();

  $body = json_decode(file_get_contents("php://input"),true); 

  switch($_GET['op']){
      case "GetAll":
          $datos = $clientes->get_cliente();
          echo json_encode($datos);
      break;
      
      case "GetId":
          $dato = $clientes->get_clliente_id($body['id_cliente']);
          echo json_encode($dato);
      break;

      case "insert":
          $datos = $clientes->insert_cliente($body['id_cliente'],
          $body['obra_clientes'],
          $body['nombre_clientes'],
          $body['telefono'],
          $body['direccion_clientes'],
          );
          echo json_encode("Insertado Correctamente");
      break;
  }


?>