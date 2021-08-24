<?php 

require_once '../modelo/modelo_empleados.php';

$mp=new modelo_empleados();


$consulta=$mp->indexPlan();
echo $consulta;

?>