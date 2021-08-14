<?php 

	require_once '../../modelo/modelo_transporte.php';

	    $mu= new modelo_transporte();
        
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        $tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
        $marca = (isset($_POST['marca'])) ? $_POST['marca'] : '';
        $patente = (isset($_POST['patente'])) ? $_POST['patente'] : '';
        $vtv = (isset($_POST['vtv'])) ? $_POST['vtv'] : '';
        $ruta = (isset($_POST['ruta'])) ? $_POST['ruta'] : '';
        $poliza = (isset($_POST['poliza'])) ? $_POST['poliza'] : '';
        $bramatologia = (isset($_POST['bramatologia'])) ? $_POST['bramatologia'] : '';
        $observacion = (isset($_POST['observacion'])) ? $_POST['observacion'] : '';
        $nombreFoto = (isset($_POST['nombreFoto'])) ? $_POST['nombreFoto'] : '';

        $consulta=$mu->editar_vehiculo($id,$tipo,$marca,$patente,$vtv,$ruta,$poliza,$bramatologia,$observacion); 
                                                   echo $consulta; 
        

            
           
       

        

       
  
    

  
    

 ?>

             