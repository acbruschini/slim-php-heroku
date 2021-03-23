<?php
/******************************************************************************
Ariel Bruschini

Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.

*******************************************************************************/

function InvertirOrden($array)
{
    $cantidadLetras = count($array);
    $newArray = array();
    if ($cantidadLetras>0)
    {
        $newArray = array_reverse($array);
        return $newArray;
    }
    else
    {
        return "No es un array o no tiene mas de una letra";
    }
}

$arrayTest = array("H","O","L","A");
$arrayNuevo = InvertirOrden($arrayTest);

var_dump($arrayTest);
var_dump($arrayNuevo);

?>