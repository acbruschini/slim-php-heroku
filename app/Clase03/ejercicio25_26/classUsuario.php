<?php
class Usuario
{
    public $_id;
    public $_nombre;
    public $_clave;
    public $_mail;
    public $_fechaDeRegistro;

    public function __construct($nombre,$clave,$mail)
    {

        if($this->SetNombre($nombre) && $this->SetClave($clave) && $this->SetMail($mail) && $this->SetId() && $this->SetFechaDeRegistro())
        {
            //echo "SE CREO EL OBJETO";
        }
        else
        {
            throw new Exception("No se pudo crear el objeto USUARIO");
        }
    }

    #region GETTERS_SETTERS
    public function GetId()
    {
        return $this->_id;
    }

    public function SetId()
    {
        $this->_id = rand(1,1000000000);
        return true;
    }

    public function GetNombre()
    {
        return $this->_nombre;
    }

    public function SetNombre($nombre)
    {
        $this->_nombre = $nombre;
        return true;
    }

    public function GetClave()
    {
        return $this->_clave;
    }

    public function SetClave($clave)
    {
        $this->_clave = $clave;
        return true;
    }

    public function GetMail()
    {
        return $this->_mail;
    }

    public function SetMail($mail)
    {
        $this->_mail = $mail;
        return true;
    }

    public function GetFechaDeRegistro()
    {
        return $this->_fechaDeRegistro;
    }

    public function SetFechaDeRegistro()
    {
        $this->_fechaDeRegistro = new DateTime("now");
        return true;
    }
	#endregion

    static function AgregarUsuario($usuario,$nombreArchivoJson)
    {
        $retorno = false;
        if (is_a($usuario,"Usuario") && $nombreArchivoJson != null && strlen($nombreArchivoJson) > 5)
        {
            $atributo = "w";
            $saltoDeLinea ="";
            if (file_exists($nombreArchivoJson))
            {
                $atributo = "a";
                $saltoDeLinea ="\n";
            }
            $miArchivo = fopen($nombreArchivoJson, $atributo);
            fwrite($miArchivo,$saltoDeLinea.json_encode($usuario));
            fclose($miArchivo);
            $retorno = true;
        }
        return $retorno;
    }

    static function SubirFoto($usuario,$file,$path)
    {
        $retorno = false;
        if (is_a($usuario,"Usuario") && $file != null && strlen($path) > 2 && strpos($path,"/") != null)
        {
            switch ($file["type"])
            {
                case "image/jpeg":
                    $extension = ".jpg";
                    break;
                case "image/gif":
                    $extension = ".gif";
                    break;
                case "image/png":
                    $extension = ".png";
                    break;
                default:
                    return "NO ES UN ARCHIVO PERMITIDO";
            }
            $destino = $path.$usuario->_nombre."_".$usuario->_id.$extension;
            var_dump ($usuario);
            var_dump ($destino);
            move_uploaded_file($file["tmp_name"],$destino);
            $retorno = "SE SUBIO";
        }
        return $retorno;
    }

    static function ExportarJsonArray ($nombreArchivo)
    {
        $retorno = "No se pudo crear la lista";
        $arrayUsuarios = array();
        if ($nombreArchivo != null && file_exists($nombreArchivo))
        {
            $retorno = "";
            $miArchivo = fopen($nombreArchivo, "r");
            while(!feof($miArchivo))
            {
                array_push($arrayUsuarios,json_decode(fgets($miArchivo))); // CREO UN OBJETO USUARIO?...
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
                $retorno .= "<li>". $value->_nombre . "," . $value->_nombre."_".$value->_id.".jpg" . "</li>";
                $retorno .= "</ul>";
            }
        }
        return $retorno;
    }

    static function ExisteUsuario($id,$nombreArchivo)
    {
        $retorno = false;
        if(is_numeric ($id) && $nombreArchivo != null && strlen($nombreArchivo) > 5)
        {
            $arrayUsuarios = array();
            $arrayUsuarios = Usuario::ExportarJsonArray($nombreArchivo);
            foreach ($arrayUsuarios as $UsuarioJson)
            {
            	if ($UsuarioJson->_id == $id)
                {
                    $retorno = true;
                    break;
                }
            }

        }
        return $retorno;
    }
}
?>