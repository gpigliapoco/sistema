<?php 

require_once '../modelo/modelo_empleados.php';

$mp=new modelo_empleados();

$idemple= (isset($_POST['idemple'])) ? $_POST['idemple']:'';
$status= (isset($_POST['status'])) ? $_POST['status']:'';
$consulta=$mp->modificarStatus($idemple,$status);
echo $consulta;

?>