<?php
require __DIR__ . "/inc/bootstrap.php";
 

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

/*
if ((!isset($uri[3]) && $uri[3] != 'usuario') || !isset($uri[4])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}*/


require RUTA_RAIZ_PROJECTO . "/Controlador/ControladorUsuario.php";
 
$objUsuarioControlador = new ControladorUsuario();

$objUsuarioControlador->peticion();

?>