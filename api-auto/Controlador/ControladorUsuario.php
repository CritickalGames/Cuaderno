<?php
// include the base controller file
require_once RUTA_RAIZ_PROJECTO . "/Controlador/ControladorBase.php";

class ControladorUsuario extends ControladorBase
{
    /**
     * "/usuario" - determinar la acción a realizar según el método
     */
    public function peticion()
    {
        $strErrorDesc = '';
        $metodoSolicitud = $_SERVER["REQUEST_METHOD"];        
        switch(strtoupper($metodoSolicitud)) {
				case 'GET':
					$uri = $this->getSegmentosUri();
					if(isset($uri[3])) {
						if($uri[4] == 'login'){
							$this->loginUsuario();			
						}else {
							$this->listarUsuario($uri[3]);						
						}
					}else{
						 $this->listarUsuarios();
					}
					break;
				case 'POST':
					$datos = $this->getJson();
					$this->ingresarUsuario($datos);
		
					break;
				case 'PUT':
          		$datos = $this->getJson();
					$this->modificarUsuario($datos);
					break;
	
				case 'DELETE':
					$datos = $this->getJson();
					$this->eliminarUsuario($datos);
					break;
				default:
					$strErrorDesc = 'Metodo no permitido';
            	$strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            	$this->
            	enviarSalida(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader));
					        
        }
	}
	
	private function listarUsuarios() {
		try {
			$usuarioModelo = new ModeloUsuario();
			$arrParametros = $this->getParametros();
			$strErrorDesc="";
         $intLimite = 10;
         if (isset($arrParametros["limite"]) && $arrParametros["limite"]) {
         	$intLimite = $arrParametros["limite"];
         }
			$arrUsuarios = $usuarioModelo->getUsuarios($intLimite);
			$datosRespuesta = json_encode($arrUsuarios);
		} catch (Error $e) {
			$strErrorDesc = $e->getMessage().'. Algo salió mal! Por favor contacte a mantenimiento.';
			$strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
		}
      // send output
      if (!$strErrorDesc) {
      	$this->enviarSalida($datosRespuesta, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
      } else {
         $this->enviarSalida(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader));
      }
    }
    
    
    private function listarUsuario($nombreUsuario) {
		try {
			$usuarioModelo = new ModeloUsuario();
         	$strErrorDesc="";
			$arrUsuarios = $usuarioModelo->getUsuario($nombreUsuario);
			$datosRespuesta = json_encode($arrUsuarios);
		} catch (Error $e) {
			$strErrorDesc = $e->getMessage().'Algo salió mal! Por favor contacte a mantenimiento.';
			$strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
		}
      // send output
      if (!$strErrorDesc) {
      	$this->enviarSalida($datosRespuesta, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
      } else {
         $this->enviarSalida(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader));
      }
    }
    
    private function ingresarUsuario($datos) {
    //private function ingresarUsuario($login) {
		try {
			$usuarioModelo = new ModeloUsuario();
         	$strErrorDesc="";
			$usuarioModelo->postUsuario($datos);
			$datosRespuesta = json_encode($datos);
		} catch (Error $e) {
			$strErrorDesc = $e->getMessage(). $datosRespuesta .'. Algo salio mal! Por favor contacte a mantenimiento.';
			$strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
		}
      // send output
      if (!$strErrorDesc) {
      	$this->enviarSalida($datosRespuesta, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
      } else {
         $this->enviarSalida(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader));
      }
    }
    
    private function modificarUsuario($datos) {
    	try {
      $usuarioModelo = new ModeloUsuario();
      $strErrorDesc="";
      $usuarioModelo->putUsuario($datos);
      $datosRespuesta = json_encode($datos);
    } catch (Error $e) {
      $strErrorDesc = $e->getMessage().'Algo salió mal! Por favor contacte a mantenimiento.';
      $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
    }
      // send output
      if (!$strErrorDesc) {
        $this->enviarSalida($datosRespuesta, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
      } else {
         $this->enviarSalida(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader));
      }
    }
    
    private function eliminarUsuario($datos) {
    	try {
			$usuarioModelo = new ModeloUsuario();
         	$strErrorDesc="";
			$usuarioModelo->deleteUsuario($datos);
			$datosRespuesta = json_encode($datos);
		} catch (Error $e) {
			$strErrorDesc = $e->getMessage().'Algo salió mal! Por favor contacte a mantenimiento.';
			$strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
		}
      // send output
      if (!$strErrorDesc) {
      	$this->enviarSalida($datosRespuesta, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
      } else {
         $this->enviarSalida(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader));
      }
    }

    private function loginUsuario()
    {
        $strErrorDesc = '';
        $metodoSolicitud = $_SERVER["REQUEST_METHOD"];
        $arrParametros = $this->getParametros();
        
        
            try {
                $usuarioModelo = new ModeloUsuario();
                
                if (isset($arrParametros["u"]) && isset($arrParametros["p"])) {
                		$u = $arrParametros["u"];
                		$p = $arrParametros["p"];
                    	$arrUsuarios = $usuarioModelo->loginUsuario($u,$p);
                		$datosRespuesta = json_encode($arrUsuarios);
                }
                
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Algo salió mal! Por favor contacte a mantenimiento.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
 
        // send output
        if (!$strErrorDesc) {
            $this->enviarSalida($datosRespuesta, array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
        } else {
            $this->enviarSalida(json_encode(array('error' => $strErrorDesc)), array('Content-Type: application/json', $strErrorHeader));
		  }    

	}
}
