<?php
class Rectangulo extends FiguraGeometrica
{

    private $_ladoDos;
    private $_ladoUno;

    public function __construct($l1,$l2,$color = "Black")
    {
        $this->_ladoDos = $l2;
        $this->_ladoUno = $l1;
        $this->_color = $color;
    }

    public function Dibujar()
    {
        // Agregar lo del color despues.
        $this->CalcularDatos();
        $retorno = "****<br>****<br>****<br>****";
        return $retorno;
    }

    protected function CalcularDatos()
    {
        $this->_perimetro = ($this->_ladoDos * 2) + ($this->_ladoUno * 2);
        $this->_superficie = $this->_ladoUno * $this->_ladoDos;
    }

    public function ToString()
    {
        $retorno = $this->Dibujar() . "<br>" . parent::ToString();
        return $retorno;
    }
}
?>