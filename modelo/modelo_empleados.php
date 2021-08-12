<?php 

    Class modelo_empleados{

        private $conexion;


        function __construct(){
            require_once 'conexion.php';
            $this->conexion =new Conexion();
        $this->conexion->conectar();
        }


          function listar_empleados(){
            $consulta = "CALL listarEmpleado";
            $arreglo = array();
            if ($resultado = $this->conexion->conexion->query($consulta)) {
                while ($consulta_VU = mysqli_fetch_assoc($resultado)) {
                    $arreglo["data"][]=$consulta_VU;
    
                }
                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        function listarEditar($id){
            $consulta = "CALL listarEmpleados('$id')";
            $arreglo = array();
		    if ($resultado = $this->conexion->conexion->query($consulta)) {
			    while ($consulta_VU = mysqli_fetch_array($resultado)) {
				    $arreglo[]=$consulta_VU;

		    	}
		    	return $arreglo;
			    $this->conexion->cerrar();
	    	}
        }

        function Registrar_empleado($nombre,$apellido,$direccion,$ciudad,$dni,$movil,$sexo,$nacimiento,$estado,$ingreso,$cargo,$nombreBenef,$direccionBenef,$dniBenef,$movilBenef,
        $nombreEsposa,$dniEsposa,$movilEsposa,$hijos,$registroCombo,$registro,$vencimiento,$observacion,$ruta){
            $consulta = "CALL addEmpleado('$nombre','$apellido','$cargo','$direccion','$ciudad','$dni','$movil','$nacimiento','$sexo','$estado','$ingreso','$nombreEsposa','$dniEsposa','$movilEsposa',
                                            '$hijos','$nombreBenef','$dniBenef','$movilBenef','$direccionBenef','$registroCombo','$registro','$vencimiento','$observacion','$ruta' ) ";	
            
            $resultado=$this->conexion->conexion->prepare($consulta);
            if ($resultado->execute()) {                 
              return 1;                 
                 }else {
                    return 0;
                 }
    
                 $this->conexion->cerrar();
        }

        function listar_combo(){
            $consulta = "CALL listarSector";
            $arreglo = array();
		    if ($resultado = $this->conexion->conexion->query($consulta)) {
			    while ($consulta_VU = mysqli_fetch_array($resultado)) {
				    $arreglo[]=$consulta_VU;

		    	}
		    	return $arreglo;
			    $this->conexion->cerrar();
	    	}
        }

        function modificarStatus($idemple,$status){
            $consulta = "CALL updateStatus('$idemple','$status')";	
            
            $resultado=$this->conexion->conexion->prepare($consulta);
            if ($resultado->execute()) {                 
              return 1;                 
                 }
                 $this->conexion->cerrar();
          }	

          function editar_empleado($id,$nombre,$apellido,$direccion,$ciudad,$dni,$movil,$sexo,$nacimiento,$estado,$ingreso,$cargo,$nombreBenef,$direccionBenef,$dniBenef,$movilBenef,
          $nombreEsposa,$dniEsposa,$movilEsposa,$hijos,$registroCombo,$registro,$vencimiento,$observacion){
              $consulta = "CALL updateEmpleado('$id','$nombre','$apellido','$cargo','$direccion','$ciudad','$dni','$movil','$nacimiento','$sexo','$estado','$ingreso','$nombreEsposa','$dniEsposa','$movilEsposa',
                                              '$hijos','$nombreBenef','$dniBenef','$movilBenef','$direccionBenef','$registroCombo','$registro','$vencimiento','$observacion') ";	
              
              $resultado=$this->conexion->conexion->prepare($consulta);
              if ($resultado->execute()) {                 
                return 1;                 
                   }else {
                      return 0;
                   }
      
                   $this->conexion->cerrar();
          }

          function updateFoto_empleado($id,$ruta){
              $consulta = "CALL updateFotoEmpleado('$id','$ruta') ";	
              
              $resultado=$this->conexion->conexion->prepare($consulta);
              if ($resultado->execute()) {                 
                return 1;                 
                   }else {
                      return 0;
                   }
      
                   $this->conexion->cerrar();
          }



    }



?>