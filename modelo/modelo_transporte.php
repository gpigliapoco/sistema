<?php
    Class modelo_transporte{

        private $conexion;


        function __construct(){
            require_once 'conexion.php';
            $this->conexion =new Conexion();
        $this->conexion->conectar();
        }

        function listar_transporte(){
            $consulta = "CALL listarTransporte";
            $arreglo = array();
            if ($resultado = $this->conexion->conexion->query($consulta)) {
                while ($consulta_VU = mysqli_fetch_assoc($resultado)) {
                    $arreglo["data"][]=$consulta_VU;
    
                }
                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        function registrar_vehiculo($tipo,$marca,$patente,$vtv,$ruta,$poliza,$bramatologia,$observacion,$destino){
            $consulta="CALL addVehiculo('$tipo','$marca','$patente','$vtv','$ruta','$poliza','$bramatologia','$observacion','$destino' )";
            $resultado=$this->conexion->conexion->prepare($consulta);
            if ($resultado->execute()) {                 
              return 1;                 
                 }else {
                    return 0;
                 }
    
                 $this->conexion->cerrar();
        }

        function editar_vehiculo($id,$tipo,$marca,$patente,$vtv,$ruta,$poliza,$bramatologia,$observacion){
            $consulta="CALL updateTranpsorte('$id','$tipo','$marca','$patente','$vtv','$ruta','$poliza','$bramatologia','$observacion' )";
            $resultado=$this->conexion->conexion->prepare($consulta);
            if ($resultado->execute()) {                 
              return 1;                 
                 }else {
                    return 0;
                 }
    
                 $this->conexion->cerrar();
        }


        function modificarStatus($idtrans,$status){
            $consulta = "CALL updateStatusTransp('$idtrans','$status')";	
            
            $resultado=$this->conexion->conexion->prepare($consulta);
            if ($resultado->execute()) {                 
              return 1;                 
                 }
                 $this->conexion->cerrar();
          }	

  
        function ver_vehiculo($id){
            $consulta = "CALL verVehiculo('$id')";
            $arreglo = array();
		    if ($resultado = $this->conexion->conexion->query($consulta)) {
			    while ($consulta_VU = mysqli_fetch_array($resultado)) {
				    $arreglo[]=$consulta_VU;

		    	}
		    	return $arreglo;
			    $this->conexion->cerrar();
	    	}
        }  

    }



?>