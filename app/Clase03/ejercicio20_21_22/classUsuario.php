<?php

class Usuario
{
    private $_usuario;
    private $_clave;
    private $_mail;

    public function __construct($usuario,$clave,$mail)
    {
        if ($usuario != null && $clave != null && $mail != null)
        {
            $this->_usuario = $usuario;
            $this->_clave = $clave;
            $this->_mail = $mail;
        }
    }

    static function AgregarUsuario($usuario,$nombreArchivo)
    {
        $retorno = false;

        if (is_a($usuario,"Usuario") && $nombreArchivo != null && strlen($nombreArchivo) > 5)
        {
            $miArchivo = fopen($nombreArchivo, "a");
            $cadena = $usuario->_usuario .",". $usuario->_clave .",". $usuario->_mail ."\n";
            fwrite($miArchivo,$cadena);
            fclose($miArchivo);
            $retorno = true;
        }

        return $retorno;
    }
}

?>