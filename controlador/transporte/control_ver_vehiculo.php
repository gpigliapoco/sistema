<?php 

	require_once '../../modelo/modelo_transporte.php';

	    $mu= new modelo_transporte();
        
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
            

        $consulta=$mu->ver_vehiculo($id); 
                                                   echo $consulta; 
        

            
           
       

        

       
  
    

  
    

 ?>
