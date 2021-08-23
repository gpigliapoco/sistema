<?php 

	require_once '../../modelo/modelo_plan.php';

	    $mu= new modelo_plan();
        
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        $arregloCuotas = (isset($_POST['arregloCuotas'])) ? $_POST['arregloCuotas'] : '';
        $arregloFecha = (isset($_POST['arregloFecha'])) ? $_POST['arregloFecha'] : '';
        $arregloMonto = (isset($_POST['arregloMonto'])) ? $_POST['arregloMonto'] : '';
        
        $arregloPRO= explode(",",$arregloCuotas);/// separo mis datos
        $arregloFe= explode(",",$arregloFecha);/// separo mis datos
        $arregloMo= explode(",",$arregloMonto);/// separo mis datos

          for ($i=0; $i < count($arregloPRO); $i++) { 

             $consulta=$mu->registrar_cuotas($id,$arregloPRO[$i],$arregloMo[$i],$arregloFe[$i]);
         }
    
    
	        echo $consulta;
                       
                       

  
    

 ?>

             