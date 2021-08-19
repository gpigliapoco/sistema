<?php 

	require_once '../../modelo/modelo_transporte.php';

	    $mu= new modelo_transporte();
        
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        $nombreFoto = (isset($_POST['nombreFoto'])) ? $_POST['nombreFoto'] : '';

    
        

        
            if(empty($nombreFoto)){

                
                 $destino='vista/imagenes/camion.png';
    
                $consulta=$mu->updateFoto_vehiculo($id,$destino); 
                                                   echo $consulta; 
                
            }else {
                
               
                 if(move_uploaded_file($_FILES["fo"]["tmp_name"],"../../vista/imagenes/".$nombreFoto)){

                    $destino='vista/imagenes/'.$nombreFoto;
    
                    $consulta=$mu->updateFoto_vehiculo($id,$destino);
                                                   echo $consulta;
               } 
            }
            
            ?>           