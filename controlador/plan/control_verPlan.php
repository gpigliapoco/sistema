<?php 

	require_once '../../modelo/modelo_plan.php';

	    $mu= new modelo_plan();
        
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        $consulta= $mu->listar_planVer($id);
        
            echo json_encode($consulta);
       
  
    

 ?>