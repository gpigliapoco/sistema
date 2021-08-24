<?php 
    require '../modelo/modelo_empleados.php';

    $mp= new modelo_empleados();
    $consulta= $mp->listar_index();

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