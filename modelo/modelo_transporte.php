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
            $consulta="CALL addVehiculo('$tipo','$marca','$patente','$vtv','$ruta','$poliza','$bramatologia','$observacion','$destino', )";
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