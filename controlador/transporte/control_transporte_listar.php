<?php
require_once '../../modelo/modelo_transporte.php';

$mu= new modelo_transporte();
$consulta=$mu->listar_transporte();
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