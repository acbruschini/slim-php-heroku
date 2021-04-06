<?php
include("classUsuario.php");


if (isset($_GET["tipoListado"]))
{
    $tipoListado = $_GET["tipoListado"];

    switch ($tipoListado)
    {
        case "usuarios":
            echo "PASO";
            $arrayTest = Usuario::ExportarLista("usuario.csv");
            var_dump($arrayTest);
            echo Usuario::DibujarLista($arrayTest);
            break;
    }

}
?>