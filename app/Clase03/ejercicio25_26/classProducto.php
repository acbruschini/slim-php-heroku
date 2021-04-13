<?php
class Producto implements \JsonSerializable
{
    private $_id;
    private $_codigoDeBarras;
    private $_nombre;
    private $_tipo;
    private $_stock;
    private $_precio;

    public function __construct($codigoDeBarras,$nombre,$tipo,$stock,$precio)
    {
        $this->_id = Rand(1,1000000000);
        $this->_codigoDeBarras = $codigoDeBarras;
        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_stock = $stock;
        $this->_precio = $precio;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    static function AgregarProducto($producto,$nombreArchivoJson)
    {
        $retorno = false;
        if ($producto != null && $nombreArchivoJson != null && strlen($nombreArchivoJson) > 5)
        {
            $atributo = "w";
            $saltoDeLinea ="";
            if (file_exists($nombreArchivoJson))
            {
                $atributo = "a";
                $saltoDeLinea ="\n";
            }
            $miArchivo = fopen($nombreArchivoJson, $atributo);
            fwrite($miArchivo,$saltoDeLinea.json_encode($producto));
            fclose($miArchivo);
            $retorno = true;
        }
        return $retorno;
    }

    static function Equals($producto1,$producto2)
    {
        $retorno = false;
        if ($producto1->_codigoDeBarras == $producto2->_codigoDeBarras )
        //if (is_a($producto1,"Producto") && is_a($producto2,"Producto") && $producto1->_codigoDeBarras == $producto2->_codigoDeBarras )
        {
            $retorno = true;
        }
        return $retorno;
    }

    static function ExportarJsonArray ($nombreArchivo)
    {
        $retorno = "No se pudo crear la lista";
        $arrayProductos = array();
        if ($nombreArchivo != null && file_exists($nombreArchivo))
        {
            $retorno = "";
            $miArchivo = fopen($nombreArchivo, "r");
            while(!feof($miArchivo))
            {
                $objectTemp = json_decode(fgets($miArchivo));
                $productoTemp = new Producto($objectTemp->_codigoDeBarras,$objectTemp->_nombre,$objectTemp->_tipo,intval($objectTemp->_stock),intval($objectTemp->_precio));
                array_push($arrayProductos,$productoTemp);
            }
            fclose($miArchivo);
        }
        if(count($arrayProductos) > 0)
        {
            $retorno = $arrayProductos;

            //var_dump($arrayProductos);
        }
        return $retorno;
    }

    static function ExisteProducto($producto,$nombreArchivo)
    {
        $retorno = false;
        if($producto != null && $nombreArchivo != null && strlen($nombreArchivo) > 5)
        {
            $arrayProductos = array();
            $arrayProductos = Producto::ExportarJsonArray($nombreArchivo);
            foreach ($arrayProductos as $productoJson)
            {
            	if (Producto::Equals($productoJson,$producto))
                {
                    $retorno = true;
                    break;
                }
            }

        }
        return $retorno;
    }

    static function AgregarStock($producto,$nombreArchivo)
    {
        $retorno = false;
        if(is_a($producto, "Producto"))
        {
            $arrayProductos = Producto::ExportarJsonArray($nombreArchivo);
            unlink($nombreArchivo);
            foreach ($arrayProductos as $productoJson)
            {
                if($productoJson->_codigoDeBarras == $producto->_codigoDeBarras)
                {
                    $productoJson->_stock += intval($producto->_stock);
                    $retorno = true;
                }
                Producto::AgregarProducto($productoJson,$nombreArchivo);
            }
        }
        return $retorno;
    }

}
?>