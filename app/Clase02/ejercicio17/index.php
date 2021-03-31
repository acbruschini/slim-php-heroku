<?php

include("classAuto.php");

$autoTest = new Auto("Azul","Mercedez");
$autoTest2 = new Auto("Rojo","Mercedez");
$autoTest3 = new Auto("Blanco","Fiat",80000);
$autoTest4 = new Auto("Blanco","Fiat",50000);
$autoTest5 = new Auto("Blanco","Fiat",50000,new DateTime("now"));

$autoTest3->AgregarImpuestos(1500);
$autoTest4->AgregarImpuestos(1500);
$autoTest5->AgregarImpuestos(1500);

echo "AUTO 1 + AUTO 2: ".Auto::Add($autoTest5,$autoTest2);


echo "<br>";
if ($autoTest->Equals($autoTest2))
{
    echo "SON IGUALES";
}
else
{
    echo "NO SON IGUALES";
}

echo "<br>";

echo Auto::MostrarAuto($autoTest);

?>