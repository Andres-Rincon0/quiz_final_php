<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    class Clientes extends Conectar{
        
       

        public function get_cliente(){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM clientes");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_clliente_id($id_cliente){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM cliente WHERE  id_cliente=?");
            $stm->bindValue(1,$id_cliente);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_cliente($id_cliente,$obra_clientes,$nombre_clientes, $telefono, $direccion_clientes ){
            $conectar=parent::Conexion();
            parent::set_name();
            $stm="INSERT INTO producto(id_cliente,obra_clientes,nombre_clientes,telefono, direccion_clientes) VALUES(?,?,?,?,?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$id_cliente);
            $stm->bindValue(2,$obra_clientes);
            $stm->bindValue(3,$nombre_clientes);
            $stm->bindValue(4,$telefono);
            $stm->bindValue(5,$direccion_clientes);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
    
        }
    }
?>