<?php 

	require_once '../../modelo/modelo_plan.php';

	    $mu= new modelo_plan();
        
        $plan = (isset($_POST['plan'])) ? $_POST['plan'] : '';
        $cuit = (isset($_POST['cuit'])) ? $_POST['cuit'] : '';
        $total = (isset($_POST['total'])) ? $_POST['total'] : '';
        $detalle = (isset($_POST['detalle'])) ? $_POST['detalle'] : '';
        $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
        
         $consulta=$mu->registrar_plan($cuit,$plan,$detalle,$total,$fecha); 
                          echo $consulta; 
                       
                       

  
    

 ?>

             