<?php
include("classUsuario.php");

if (isset($_POST["usuario"]) && isset($_POST["clave"]) && isset($_POST["mail"]))
{
    $tempUsuario = $_POST["usuario"];
    $tempClave = $_POST["clave"];
    $tempMail = $_POST["mail"];
    $tempObjUsuario = new Usuario($tempUsuario,$tempClave,$tempMail);
    if($tempObjUsuario != null && Usuario::AgregarUsuario($tempObjUsuario,"usuario.csv"))
    {
        echo "Se agrego un usuario";
    }
    else
    {
        echo "No se pudo agregar el usuario";       
    }
}
else
{
    echo "No existen los datos necesarios";    
}

?>