<?php 
class conexionBD{
    public function conexionPDO(){

        $host = 'localhost';
        $usuario= 'root';
        $contrasena= '';
        $bdName= 'felisan';

        try {
            $pdo =new PDO("mysql:host=$host;dbname=$bdName",$usuario,$contrasena);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo 'la conexion fallo';
        }

    }

    public function cerrar_conexion(){
        $this->$pdo->close();
    }
}

?>