<?php 

	require_once '../../modelo/modelo_plan.php';

	    $mu= new modelo_plan();
        
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        $consulta= $mu->listar_plan($id);
        if($consulta){
            echo json_encode($consulta);
        }else {
    
            echo '{
                "sEcho": 1,
                "iTotalRecords": "0",
                "iTotalDisplayRecords": "0",
                "aaData": []
            }';
            
            
        }
  
    

 ?>
