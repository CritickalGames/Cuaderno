<?php
require_once RUTA_RAIZ_PROJECTO . "/Modelo/BaseDeDatos.php";
 
class ModeloUsuario extends BaseDeDatos
{
    public function getUsuarios($limite)
    {
        return $this->ejecutar("SELECT * FROM usuario ORDER BY login ASC LIMIT ?", ["i", $limite]);
    }
    
	public function getUsuario($login)
    {
        return $this->ejecutar("SELECT * FROM usuario WHERE login = ?", ["s", $login]);
    }

  public function postUsuario($datos)
    {
    		//login, pass, nombre, email
			return $this->ejecutar("INSERT INTO usuario (login, pass, nombre, email) VALUES (?, ?, ?, ?)", ["ssss", $datos['login'], $datos['pass'], $datos['nombre'], $datos['email']]);
    }
	public function putUsuario($datos)
   {
    	//login, pass, nombre, email
      return $this->ejecutar("UPDATE usuario SET pass = ?, nombre = ?, email = ? WHERE login = ?", ["ssss", $datos['pass'], $datos['nombre'], $datos['email'], $datos['login']]);
   }
   
   public function deleteUsuario($datos)
   {
    	//login, pass, nombre, email
      return $this->ejecutar("DELETE FROM usuario WHERE login = ?", ["s", $datos['login']]);
   }

   public function loginUsuario($login,$pass)
    {
        return $this->ejecutar("SELECT * FROM usuario WHERE login = ? AND pass = ?", ["ss", $login, $pass]);
    }

}