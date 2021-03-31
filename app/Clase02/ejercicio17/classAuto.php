<?php

class Auto
{
    private $_color;
    private $_marca;
    private $_precio;
    private $_fecha = new DateTime("now");

    public function __construct($color,$marca,$precio = null,$fecha)
    //public function __construct($color,$marca,$precio,$fecha)

    /// ESTO ESTARIA BIEN? NO PUDE PASAR NEW EN PARAMETRO.
   // public function __construct($color,$marca,$precio = 0,$fecha = "Hoy")
    {
        if ($color != null && $marca != null)
        {
            $this->_color = $color;
            $this->_marca = $marca;
            $this->_precio = $precio;
            if ($fecha == "Hoy")
            {
                $this->_fecha = new DateTime("now");

            }
            else
            {
                $this->_fecha = $fecha;
            }
        }
    }

    public function AgregarImpuestos ($impuesto)
    {
        if ($impuesto != null && $impuesto > 0)
        {
            $this->_precio += $impuesto;
        }
    }

    public function Equals($auto2)
    {
        $retorno = false;
        if (is_a($auto2, "Auto"))
        {
            if($this->_marca == $auto2->_marca)
            {
                $retorno = true;
            }
        }
        return $retorno;

    }

    static function MostrarAuto ($auto)
    {
        if (is_a($auto, "Auto"))
        {
            $informacion = "AUTO: ".$auto->_marca."<br>";
            $informacion .= "COLOR ".$auto->_color."<br>";
            $informacion .= "PRECIO: $".$auto->_precio."<br>";
            $informacion .= "FECHA: ".$auto->_fecha->format('Y-m-d H:i');

        }
        else
        {
            $informacion = "El objeto recibido no era un auto NABO";
        }

        return $informacion;
    }

    static function Add($auto1,$auto2)
    {
        $retorno = 0;
        if (is_a($auto1, "Auto") && is_a($auto2, "Auto") && $auto1->Equals($auto2) && $auto1->_color == $auto2->_color)
        {
            
            $retorno = $auto1->_precio + $auto2->_precio;
        }
        return $retorno;
    }


}


?>