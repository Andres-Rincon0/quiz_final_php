<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    class Constructoras extends Conectar{
        
       

        public function get_constructora(){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM constructoras");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_constructora_id($id_constructora){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM constructora WHERE  id_constructora=?");
            $stm->bindValue(1,$id_constructora);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_constructora($id_constructora,$nombre_constructora,$direccion_constructora ){
            $conectar=parent::Conexion();
            parent::set_name();
            $stm="INSERT INTO empleado(id_constructora,nombre_constructora,direccion_constructora) VALUES(?,?,?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$id_constructora);
            $stm->bindValue(2,$nombre_constructora);
            $stm->bindValue(3,$direccion_constructora);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
    
        }
    }
?>