<?php
    Class modelo_plan{

        private $conexion;


        function __construct(){
            require_once 'conexion.php';
            $this->conexion =new Conexion();
        $this->conexion->conectar();
        }

        function listar_plan($id){
            $consulta = "CALL listarPlan('$id')";
            $arreglo = array();
            if ($resultado = $this->conexion->conexion->query($consulta)) {
                while ($consulta_VU = mysqli_fetch_assoc($resultado)) {
                    $arreglo["data"][]=$consulta_VU;
    
                }
                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        function listar_planVer($id){
          $consulta = "CALL listaplanVer('$id')";
          $arreglo = array();
          if ($resultado = $this->conexion->conexion->query($consulta)) {
              while ($consulta_VU = mysqli_fetch_array($resultado)) {
                  $arreglo[]=$consulta_VU;
  
              }
              return $arreglo;
              $this->conexion->cerrar();
          }
      }

        function registrar_plan($cuit,$plan,$detalle,$total,$fecha){
            $consulta="CALL addPlan ('$cuit','$plan','$detalle','$total','$fecha' )";
            if ($resultado = $this->conexion->conexion->query($consulta)) {
                if ($row = mysqli_fetch_array($resultado)) {
                                return $id= trim($row[0]); ////  devuelve la posicion 1 variable cuenta
                }
                $this->conexion->cerrar();
              }
        }

        function registrar_cuotas($id,$arregloPRO,$arregloMo,$arregloFe){
          //   $consulta = "CALL addDetallePlan('$id','$arregloPRO','$arregloMo','$arregloFe') ";	    
            $consulta = "INSERT INTO detallePlan(idplan_detalle,cuota,total_cuota,fechaDet,estado) values('$id','$arregloPRO','$arregloMo','$arregloFe','debe') ";
  
              $resultado=$this->conexion->conexion->prepare($consulta);
              if ($resultado->execute()) {                 
                return 1;                 
                   }
                   $this->conexion->cerrar();
  
          }

    

            function listar_combo(){
                $consulta = "CALL listarComboPlan";
              //  $consulta="SELECT planespago.idplanesPago,planespago.plan,CONCAT(planespago.plan,' - ',planespago.cuit) as planes FROM planespago";
                $arreglo = array();
              if ($resultado = $this->conexion->conexion->query($consulta)) {
              while ($consulta_VU = mysqli_fetch_array($resultado)) {
                $arreglo[]=$consulta_VU;

              }
              return $arreglo;
              $this->conexion->cerrar();
            }
          }

          function modificarStatus($iddetalle,$status){
            $consulta = "CALL updateStatusPlan('$iddetalle','$status')";	
            
            $resultado=$this->conexion->conexion->prepare($consulta);
            if ($resultado->execute()) {                 
              return 1;                 
                 }
                 $this->conexion->cerrar();
          }	
       
          function saldoPlan($id){
            $consulta = "call saldoPlan('$id') ";	
            if ($resultado = $this->conexion->conexion->query($consulta)) {
              if ($row = mysqli_fetch_array($resultado)) {
                              return $id= trim($row[0]); ////  devuelve la posicion 1 variable cuenta
              }
              $this->conexion->cerrar();
            }
           }
       

    }



?>