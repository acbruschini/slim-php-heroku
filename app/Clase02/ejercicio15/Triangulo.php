<?php
class Triangulo extends FiguraGeometrica
{

    private $_altura;
    private $_base;

    public function __construct($base,$altura,$color = "Black")
    {
        $this->_altura = $altura;
        $this->_base = $base;
        $this->_color = $color;
    }

    public function Dibujar()
    {
        // Agregar lo del color despues.
        $this->CalcularDatos();
        $retorno = "  *  <br> *** <br>*****";
        return $retorno;
    }

    protected function CalcularDatos()
    {
        $this->_perimetro = ($this->_base/2);// Sacar el perimetro despues
        $this->_superficie = ($this->_base * $this->_altura)/2;
    }

    public function ToString()
    {
        $retorno = $this->Dibujar() . "<br>" . parent::ToString();
        return $retorno;
    }
}
?>