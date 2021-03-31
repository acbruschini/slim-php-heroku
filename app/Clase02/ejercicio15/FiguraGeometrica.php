<?php
abstract class FiguraGeometrica
{
    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    public function __construct()
    {
    }

    protected abstract function CalcularDatos();
    public abstract function Dibujar();

    public function ToString()
    {
        $retorno = "El color es: " . $this->_color . "<br>" . "El perimetro es: " . $this->_perimetro . "<br>" . "La superficie es: " . $this->_superficie . "<br>";
        return $retorno;
    }

    public function GetColor()
    {
        return $this->_color;
    }
    public function SetColor($color)
    {
        $this->_color = $color;
    }
}
?>