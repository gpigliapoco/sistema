<?php
    Class modelo_sector{

        private $conexion;


        function __construct(){
            require_once 'conexion.php';
            $this->conexion =new Conexion();
        $this->conexion->conectar();
        }

        function listar_sector(){
            $consulta = "CALL listarSector";
            $arreglo = array();
            if ($resultado = $this->conexion->conexion->query($consulta)) {
                while ($consulta_VU = mysqli_fetch_assoc($resultado)) {
                    $arreglo["data"][]=$consulta_VU;
    
                }
                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        function registrar_sector($nombre){
            $consulta="CALL addSector('$nombre')";
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