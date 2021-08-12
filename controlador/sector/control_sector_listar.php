<?php
require_once '../../modelo/modelo_sector.php';

$mu= new modelo_sector();
$consulta=$mu->listar_sector();
if($consulta){
    echo json_encode($consulta);
}else{
    echo '{
        "sEcho": 1,
        "iTotalRecords": "0",
        "iTotalDisplayRecords": "0",
        "aaData": []
    }';
    
}

?>