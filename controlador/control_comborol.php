<?php
require_once '../modelo/modelo_empleados.php';

$mu= new modelo_empleados();
$consulta=$mu->listar_combo();
echo json_encode($consulta);


?>