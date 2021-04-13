<?php
include("classUsuario.php");

echo "test";
var_dump ($_GET["tipoListado"]);
if (isset($_GET["tipoListado"]))
{
    $tipoListado = $_GET["tipoListado"];

    switch ($tipoListado)
    {
        case "usuarios":
            echo "PASO";
            $arrayTest = Usuario::ExportarJsonArray("usuarios.json");
            var_dump($arrayTest);
            echo Usuario::DibujarLista($arrayTest);
            break;
    }

}
?>