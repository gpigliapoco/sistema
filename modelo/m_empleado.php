<?php 

    require 'conexion1.php';

    class modelo_empleados extends conexionBD{

        public function listar_empleado(){
            $c= conexionBD::conexionPDO();
            $arreglo = array();
            $sql="CALL listar_empleados";
            $query->$c->prepare($sql);
            $query->execute();
            $result= $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $respuesta){
                $arreglo["data"][]=$respuesta;
            }
            return $arreglo;
            conexionBD=cerrar();
        }

        public function function Registrar_empleado($nombre,$apellido,$direccion,$ciudad,$dni,$movil,$sexo,$nacimiento,$estado,$ingreso,$cargo,$nombreBenef,$direccionBenef,$dniBenef,$movilBenef,
        $nombreEsposa,$dniEsposa,$movilEsposa,$hijos,$registroCombo,$registro,$vencimiento,$observacion,$ruta){

        $sql = "CALL addEmpleado('$nombre','$apellido','$direccion','$ciudad','$dni','$movil','$sexo','$nacimiento','$estado','$ingreso','$cargo','$nombreBenef','$direccionBenef',
                                            '$dniBenef','$movilBenef','$nombreEsposa','$dniEsposa','$movilEsposa','$hijos','$registroCombo','$registro','$vencimiento','$observacion','$ruta' ) ";	

            $c=conexionBd::conexionPDO();
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$nombre);
            $query->bindParam(2,$apellido);
            $query->bindParam(3,$direccion);
            $query->bindParam(4,$ciudad);
            $query->bindParam(5,$dni);
            $query->bindParam(6,$movil);
            $query->bindParam(7,$sexo);
            $query->bindParam(8,$nacimiento);
            $query->bindParam(9,$estado);
            $query->bindParam(10,$ingreso);
            $query->bindParam(11,$cargo);
            $query->bindParam(12,$nombreBenef);
            $query->bindParam(13,$direccionBenef);
            $query->bindParam(14,$dniBenef);
            $query->bindParam(15,$movilBenef);
            $query->bindParam(16,$nombreEsposa);
            $query->bindParam(17,$dniEsposa);
            $query->bindParam(18,$movilEsposa);
            $query->bindParam(19,$hijos);
            $query->bindParam(20,$registroCombo);
            $query->bindParam(21,$registro);
            $query->bindParam(22,$vencimiento);
            $query->bindParam(23,$observacion);
            $query->bindParam(24,$ruta);
            $result =$query->execute();
            if($result){
                return 1;
            }else {
                return 0;
            }
            conexionBD::cerrar();



    }


?>