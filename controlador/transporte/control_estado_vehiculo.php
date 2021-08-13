<?php 

require_once '../../modelo/modelo_transporte.php';

$mp=new modelo_transporte();

$idtrans= (isset($_POST['idtrans'])) ? $_POST['idtrans']:'';
$status= (isset($_POST['status'])) ? $_POST['status']:'';
$consulta=$mp->modificarStatus($idtrans,$status);
echo $consulta;

?>