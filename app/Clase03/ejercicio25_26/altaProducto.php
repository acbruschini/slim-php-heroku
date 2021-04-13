<?php
require_once("classProducto.php");
$nombreArchivoJson = "productos.json";
if(isset($_POST["codigoDeBarras"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"]))
{
    $codigoDeBarras = $_POST["codigoDeBarras"];
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];

    $productoTemp = new Producto($codigoDeBarras,$nombre,$tipo,$stock,$precio);
    if (Producto::ExisteProducto($productoTemp,$nombreArchivoJson))
    {
        Producto::AgregarStock($productoTemp,$nombreArchivoJson);
        echo "SE SUMO STOCK";
    }
    else
    {
        Producto::AgregarProducto($productoTemp,$nombreArchivoJson);
        echo "SE AGREGO PRODUCTO";
    }
}
else
{
    echo "NO SE PUDO AGREGAR FALTAN DATOS EN EL REQUEST";
}
?>