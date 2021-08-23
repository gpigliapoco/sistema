
<?php 

    require_once '../../modelo/modelo_plan.php';

    $mu= new modelo_plan();
    
    $consulta=$mu->listar_combo();
    echo json_encode($consulta);




?>