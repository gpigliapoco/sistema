<?php 

	require_once '../../modelo/modelo_plan.php';

	    $mu= new modelo_plan();
        
        $iddetalle = (isset($_POST['iddetalle'])) ? $_POST['iddetalle'] : '';
        $status= (isset($_POST['status'])) ? $_POST['status']:'';
        $consulta=$mu->modificarStatus($iddetalle,$status);
        echo $consulta;
  
    

 ?>