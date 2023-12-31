<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    class Empleados extends Conectar{
        
       

        public function get_empleado(){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM empleados");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_empleado_id($id_empleado){
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM empleado WHERE  id_empleado=?");
            $stm->bindValue(1,$id_empleado);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_empleado($id_empleado,$nombre_empleados,$salario_mensual,$sexo ){
            $conectar=parent::Conexion();
            parent::set_name();
            $stm="INSERT INTO empleado(id_empleado,nombre_empleados,salario_mensual,sexo) VALUES(?,?,?,?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$id_empleado);
            $stm->bindValue(2,$nombre_empleados);
            $stm->bindValue(3,$salario_mensual);
            $stm->bindValue(4,$sexo);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
    
        }
    }
?>