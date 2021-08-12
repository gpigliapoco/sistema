<?php 

require_once '../modelo/modelo_empleados.php';

$mp=new modelo_empleados();

$id= (isset($_POST['id'])) ? $_POST['id']:'';

$consulta=$mp->listarEditar($id);
echo json_encode($consulta);

?>