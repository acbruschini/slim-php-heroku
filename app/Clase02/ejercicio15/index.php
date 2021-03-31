<?php
include "FiguraGeometrica.php";
include "Rectangulo.php";
include "Triangulo.php";

$rectanguloUno = new Rectangulo(3,4,"NEGRO");
$trianguloUno = new Triangulo(3,4);

echo $rectanguloUno->ToString();
echo $trianguloUno->ToString();

//var_dump($rectanguloUno);

?>