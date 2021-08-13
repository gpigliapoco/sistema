<?php 

	require_once '../modelo/modelo_empleados.php';

	    $mu= new modelo_empleados();
        
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
        $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
        $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
        $ciudad = (isset($_POST['ciudad'])) ? $_POST['ciudad'] : '';
        $dni = (isset($_POST['dni'])) ? $_POST['dni'] : '';
        $movil = (isset($_POST['movil'])) ? $_POST['movil'] : '';
        $sexo = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
        $nacimiento = (isset($_POST['nacimiento'])) ? $_POST['nacimiento'] : '';
        $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
        $ingreso = (isset($_POST['ingreso'])) ? $_POST['ingreso'] : '';
        $cargo = (isset($_POST['cargo'])) ? $_POST['cargo'] : '';
        $nombreBenef = (isset($_POST['nombreBenef'])) ? $_POST['nombreBenef'] : '';
        $direccionBenef = (isset($_POST['direccionBenef'])) ? $_POST['direccionBenef'] : '';
        $dniBenef = (isset($_POST['dniBenef'])) ? $_POST['dniBenef'] : '';
        $movilBenef = (isset($_POST['movilBenef'])) ? $_POST['movilBenef'] : '';
        $nombreEsposa = (isset($_POST['nombreEsposa'])) ? $_POST['nombreEsposa'] : '';
        $dniEsposa = (isset($_POST['dniEsposa'])) ? $_POST['dniEsposa'] : '';
        $movilEsposa = (isset($_POST['movilEsposa'])) ? $_POST['movilEsposa'] : '';
        $hijos = (isset($_POST['hijos'])) ? $_POST['hijos'] : '';
        $registroCombo = (isset($_POST['registroCombo'])) ? $_POST['registroCombo'] : '';
        $registro = (isset($_POST['registro'])) ? $_POST['registro'] : '';
        $vencimiento = (isset($_POST['vencimiento'])) ? $_POST['vencimiento'] : '';
        $observacion = (isset($_POST['observacion'])) ? $_POST['observacion'] : '';
        $nombreFoto = (isset($_POST['nombreFoto'])) ? $_POST['nombreFoto'] : '';

    
        

        
            if(empty($nombreFoto)){

                
                 $ruta='vista/imagenes/usuario.png';
    
                $consulta=$mu->Registrar_empleado($nombre,$apellido,$direccion,$ciudad,$dni,$movil,$sexo,$nacimiento,$estado,
                                                       $ingreso,$cargo,$nombreBenef,$direccionBenef,$dniBenef,$movilBenef,
                                                       $nombreEsposa,$dniEsposa,$movilEsposa,$hijos,$registroCombo,$registro,
                                                   $vencimiento,$observacion,$ruta); 
                                                   echo "vacio"; 
                
            }else {
                
               
                 if(move_uploaded_file($_FILES["fo"]["tmp_name"],"../vista/imagenes".$nombreFoto)){

                    $ruta='vista/imagenes/'.$nombreFoto;
    
                    $consulta=$mu->Registrar_empleado($nombre,$apellido,$direccion,$ciudad,$dni,$movil,$sexo,$nacimiento,$estado,
                                                       $ingreso,$cargo,$nombreBenef,$direccionBenef,$dniBenef,$movilBenef,
                                                       $nombreEsposa,$dniEsposa,$movilEsposa,$hijos,$registroCombo,$registro,
                                                   $vencimiento,$observacion,$ruta); 
                                                   echo "movio foto";
               } 
            }
            
           
       

        

       
  
    

  
    

 ?>

              