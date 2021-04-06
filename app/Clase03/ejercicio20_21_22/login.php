<?php
include("classUsuario.php");

if (isset($_POST["usuario"]) && isset($_POST["clave"]) && isset($_POST["mail"]))
{
    $tempUsuario = $_POST["usuario"];
    $tempClave = $_POST["clave"];
    $tempMail = $_POST["mail"];

    try
    {

        $tempUsuario = new Usuario($tempUsuario,$tempClave,$tempMail);
    }
    catch (Exception $ex)
    {
        die($ex->getMessage());
    }

    $arrayTest = Usuario::ExportarLista("usuario.csv");
    echo Usuario::VerificarLogin($tempUsuario,$arrayTest);
}
?>