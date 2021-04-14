<?php
require_once("classProducto.php");
require_once("classUsuario.php");
$nombreArchivoJson = "productos.json";
$nombreArchivoJsonUsuarios = "usuarios.json";
if(isset($_POST["codigoDeBarras"]) && isset($_POST["idUsuario"]) && isset($_POST["cantidad"]))
{
    $productoTemp = new Producto($_POST["codigoDeBarras"],"dummy","dummy",1,1);

    if(Producto::ExisteProducto($productoTemp,$nombreArchivoJson) && Usuario::ExisteUsuario($_POST["idUsuario"],$nombreArchivoJsonUsuarios) && Producto::ExisteStock($productoTemp,$nombreArchivoJson,intval($_POST["cantidad"])))
    {
        $miArchivo = fopen("ventas.csv", "a");
        $cadena = "";

        if (0 != filesize("ventas.csv"))
        {
            $cadena .= "\n";
        }

        $cadena .= rand(2,100000) .",". $_POST["codigoDeBarras"] .",". $_POST["idUsuario"] .",". $_POST["cantidad"] ;
        fwrite($miArchivo,$cadena);
        fclose($miArchivo);
        echo "VENTA REALIZADA";
    }
    else
    {
        echo "NO SE REALIZO LA VENTA";
    }
}
?>