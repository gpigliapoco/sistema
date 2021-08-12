<?php 

	require_once '../modelo/modelo_empleados.php';

	    $mu= new modelo_empleados();
        
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        $nombreFoto = (isset($_POST['nombreFoto'])) ? $_POST['nombreFoto'] : '';

    
        

        
            if(empty($nombreFoto)){

                
                 $ruta='vista/imagenes/usuario.png';
    
                $consulta=$mu->updateFoto_empleado($id,$ruta); 
                                                   echo "vacio"; 
                
            }else {
                
               
                 if(move_uploaded_file($_FILES["fo"]["tmp_name"],"../vista/imagenes/".$nombreFoto)){

                    $ruta='vista/imagenes/'.$nombreFoto;
    
                    $consulta=$mu->updateFoto_empleado($id,$ruta); 
                                                   echo $consulta;
               } 
            }
            
           
       

        

       
  
    

  
    

 ?>

              