<?php 

	require_once '../../modelo/modelo_transporte.php';

	    $mu= new modelo_transporte();
        
        $tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
        $marca = (isset($_POST['marca'])) ? $_POST['marca'] : '';
        $patente = (isset($_POST['patente'])) ? $_POST['patente'] : '';
        $vtv = (isset($_POST['vtv'])) ? $_POST['vtv'] : '';
        $ruta = (isset($_POST['ruta'])) ? $_POST['ruta'] : '';
        $poliza = (isset($_POST['poliza'])) ? $_POST['poliza'] : '';
        $bramatologia = (isset($_POST['bramatologia'])) ? $_POST['bramatologia'] : '';
        $observacion = (isset($_POST['observacion'])) ? $_POST['observacion'] : '';
        $nombreFoto = (isset($_POST['nombreFoto'])) ? $_POST['nombreFoto'] : '';

    
        

        
            if(empty($nombreFoto)){

                
                 $destino='vista/imagenes/usuario.png';
    
                $consulta=$mu->registrar_vehiculo($tipo,$marca,$patente,$vtv,$ruta,$poliza,$bramatologia,$observacion,$destino); 
                                                   echo "vacio"; 
                
            }else {
                
               
                 if(move_uploaded_file($_FILES["fo"]["tmp_name"],"../vista/imagenes/".$nombreFoto)){

                    $destino='vista/imagenes/'.$nombreFoto;
    
                    $consulta=$mu->registrar_vehiculo($tipo,$marca,$patente,$vtv,$ruta,$poliza,$bramatologia,$observacion,$destino);
                                                   echo "movio foto";
               } 
            }
            
           
       

        

       
  
    

  
    

 ?>

             