<?php
define("RUTA_RAIZ_PROJECTO", __DIR__ . "/../");
 
// include main configuration file
require_once RUTA_RAIZ_PROJECTO . "/inc/config.php";
 
// include the base controller file
require_once RUTA_RAIZ_PROJECTO . "/Controlador/ControladorBase.php";
 
// include the use model file
require_once RUTA_RAIZ_PROJECTO . "/Modelo/ModeloUsuario.php";
?>