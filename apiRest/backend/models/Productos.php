<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    class Productos extends Conectar{
        
       

        public function get_producto(){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM productos");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_producto_id($id_producto){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM producto WHERE  id_producto=?");
            $stm->bindValue(1,$id_producto);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_producto($id_producto,$nombre_productos,$precio_dia ){
            $conectar=parent::Conexion();
            parent::set_name();
            $stm="INSERT INTO producto(id_producto,nombre_productos,precio_dia) VALUES(?,?,?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$id_producto);
            $stm->bindValue(2,$nombre_productos);
            $stm->bindValue(3,$precio_dia);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
    
        }
    }
?>