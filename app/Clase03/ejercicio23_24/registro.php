<?php
require_once("classUsuario.php");

if(isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"]) && isset($_FILES["archivo_foto"]))
{
    $usuarioTemp = new Usuario($_POST["nombre"],$_POST["clave"],$_POST["mail"]);
    Usuario::AgregarUsuario($usuarioTemp,"usuarios.json");
    Usuario::SubirFoto($usuarioTemp,$_FILES["archivo_foto"],"usuario/fotos/");
}
?>