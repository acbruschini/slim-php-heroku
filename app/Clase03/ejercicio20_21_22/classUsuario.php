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
        else
        {
            throw new Exception("No se pudo crear el usuario | No se pudo construir el objeto");
        }
    }

    static function AgregarUsuario($usuario,$nombreArchivo)
    {
        $retorno = false;

        if (is_a($usuario,"Usuario") && $nombreArchivo != null && strlen($nombreArchivo) > 5)
        {
            $miArchivo = fopen($nombreArchivo, "a");
            $cadena = "";

            if (0 != filesize($nombreArchivo))
            {
                $cadena .= "\n";
            }

            $cadena .= $usuario->_usuario .",". $usuario->_clave .",". $usuario->_mail;
            fwrite($miArchivo,$cadena);
            fclose($miArchivo);
            $retorno = true;
        }

        return $retorno;
    }

    static function ExportarLista ($nombreArchivo)
    {
        $retorno = "No se pudo crear la lista";
        $arrayUsuarios = array();
        if ($nombreArchivo != null && file_exists($nombreArchivo))
        {
            $retorno = "";
            $miArchivo = fopen($nombreArchivo, "r");
            while(!feof($miArchivo))
            {
                $tempArray = explode(",",fgets($miArchivo));
                $tempArrayKeyValue = array("usuario"=>$tempArray[0],"clave"=>$tempArray[1],"mail"=>$tempArray[2]);
                $objTemp = new Usuario($tempArrayKeyValue["usuario"],$tempArrayKeyValue["clave"],$tempArrayKeyValue["mail"]);
                array_push($arrayUsuarios,$objTemp);
            }
            fclose($miArchivo);
        }
        if(count($arrayUsuarios) > 0)
        {
            $retorno = $arrayUsuarios;
        }
        return $retorno;
    }

    static function DibujarLista ($arrayUsuarios)
    {
        $retorno = "";
        if ($arrayUsuarios != null)
        {
            foreach ($arrayUsuarios as $value)
            {
                $retorno .= "<ul>";
                foreach ($value as $dato)
                {
                	$retorno .= "<li>". $dato . "</li>";
                }
                $retorno .= "</ul>";
            }
        }
        return $retorno;
    }

    static function VerificarLogin($usuario,$arrayDeUsuarios)
    {
        $retorno = "Error en los datos | No existe usuario";

        foreach($arrayDeUsuarios as $objUsuario)
        {
            if($usuario->_usuario == $objUsuario->_usuario )
            {
                $retorno = "Error en los datos | No coincide la clave";
                if($usuario->_clave == $objUsuario->_clave)
                {
                    $retorno = "Verificado";
                    break;
                }
            }
        }
        return $retorno;
    }

}

?>