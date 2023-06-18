<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    class Cotizaciones extends Conectar{
        
       

        public function get_cotizacion(){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM cotizaciones");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_cotizacion_id($id_cotizacion){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM cotizacion WHERE  id_cotizacion=?");
            $stm->bindValue(1,$id_cotizacion);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_cotizacion($id_cotizacion,$id_empleado,$id_constructora,$fecha, $total){
            $conectar=parent::Conexion();
            parent::set_name();
            $stm="INSERT INTO cotizacion(id_cotizacion,id_empleado,id_constructora,fecha, total) VALUES(?,?,?,?,?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$id_cotizacion);
            $stm->bindValue(2,$id_empleado);
            $stm->bindValue(3,$id_constructora);
            $stm->bindValue(4,$fecha);
            $stm->bindValue(5,$total);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
    
        }
    }
?>