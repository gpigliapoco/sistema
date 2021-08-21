<?php
    Class modelo_plan{

        private $conexion;


        function __construct(){
            require_once 'conexion.php';
            $this->conexion =new Conexion();
        $this->conexion->conectar();
        }

        function listar_plan(){
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

        function registrar_plan($tipo,$marca,$patente,$vtv,$ruta,$poliza,$bramatologia,$observacion,$destino){
            $consulta="CALL add1Vehiculo('$tipo','$marca','$patente','$vtv','$ruta','$poliza','$bramatologia','$observacion','$destino' )";
            if ($resultado = $this->conexion->conexion->query($consulta)) {
                if ($row = mysqli_fetch_array($resultado)) {
                                return $id= trim($row[0]); ////  devuelve la posicion 1 variable cuenta
                }
                $this->conexion->cerrar();
              }
        }

      


        function modificarStatus($idtrans,$status){
            $consulta = "CALL updateStatusTransp('$idtrans','$status')";	
            
            $resultado=$this->conexion->conexion->prepare($consulta);
            if ($resultado->execute()) {                 
              return 1;                 
                 }
                 $this->conexion->cerrar();
          }	

  
       

       

    }



?>