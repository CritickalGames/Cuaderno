<?php
class BaseDeDatos
{
    protected $conexion = null;
 
    public function __construct()
    {
        try {
            $this->conexion = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_CONTRA, BD_NOMBREBD);
            if ( mysqli_connect_errno()) {
                throw new Exception("Error al intentar conectar con la base de datos.");   
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }
   }
   public function ejecutar($consulta = "" , $parametros = [])
   {        	
        try {
            $sentencia = $this->ejecutarSentencia( $consulta , $parametros );
            if (substr($consulta, 0, 6) == "SELECT")
            	$resultado = $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);
            else 
            	$resultado = 0;
            
            $sentencia->close();
            return $resultado;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }
 
    private function ejecutarSentencia($consulta = "" , $parametros = [])
    {
        try {
            $sentencia = $this->conexion->prepare( $consulta );
 
            if($sentencia === false) {
                throw New Exception("Imposible de preparar la sentecia: " . $sentencia);
            }
 
            if ( $parametros ) {
                switch (count($parametros)){
                    case 2:
                        $sentencia->bind_param($parametros[0], $parametros[1]);
                        break;
                    case 3:
                        $sentencia->bind_param($parametros[0], $parametros[1], $parametros[2]);
                        break;
                    case 4:
                        $sentencia->bind_param($parametros[0], $parametros[1], $parametros[2], $parametros[3]);
                        break;
                    case 5:
                        $sentencia->bind_param($parametros[0], $parametros[1], $parametros[2], $parametros[3], $parametros[4]);
                        break;
                }
            }
 
            $sentencia->execute();
 
            return $sentencia;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }   
    }
}