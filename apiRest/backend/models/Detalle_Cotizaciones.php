<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    class Detalle_cotizaciones extends Conectar{
        
       

        public function get_detalle_cotizaciones(){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM detalle_cotizacion");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_detalle_cotizaciones_id($id_detalle){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM detalle_cotizacion WHERE  id_detalle=?");
            $stm->bindValue(1,$id_detalle);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_detalle_cotizaciones($id_detalle,$id_cotizacion,$id_producto,$fecha_alquiler, $duracion_alquiler){
            $conectar=parent::Conexion();
            parent::set_name();
            $stm="INSERT INTO detalle_cotizacion(id_detalle,id_cotizacion,id_producto,fecha_alquiler, duracion_alquiler) VALUES(?,?,?,?,?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$id_detalle);
            $stm->bindValue(2,$id_cotizacion);
            $stm->bindValue(3,$id_producto);
            $stm->bindValue(4,$fecha_alquiler);
            $stm->bindValue(5,$duracion_alquiler);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
    
        }
    }
?>