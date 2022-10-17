<?php
class ControladorBase
{
    /**
     * __call método mágico.
     */
    public function __call($nombre, $argumentos)
    {
        $this->enviarSalida('', array('HTTP/1.1 404 Not Found'));
    }
 
    /**
     * Obtener los elementos de la URI.
     * 
     * @return array
     */
    protected function getSegmentosURI()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );
 
        return $uri;
    }
 
    /**
     * Obtener los parámetros de la petición.
     * 
     * @return array
     */
    protected function getParametros()
    {
        parse_str($_SERVER['QUERY_STRING'], $consulta);
        return $consulta;
    }
    
       /**
     * Obtener los datos del JSON enviado en la petición
     * 
     * @return array
     */
    protected function getJson()
    {
        	$data = file_get_contents("php://input");
			$datos = json_decode($data, true);
            return $datos;
    }
 
    /**
     * Enviar la salida de la API.
     *
     * @param mixed  $datos
     * @param string $httpHeader
     */
    protected function enviarSalida($datos, $httpHeaders=array())
    {
        header_remove('Set-Cookie');
 
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
 
        echo $datos;
        exit;
    }
}