<?php
/******************************************************************************
Ariel Bruschini

Aplicaci�n No 1 (Sumar n�meros)
Confeccionar un programa que sume todos los n�meros enteros desde 1 mientras la suma no
supere a 1000. Mostrar los n�meros sumados y al finalizar el proceso indicar cuantos n�meros
se sumaron.

*******************************************************************************/

$acumulador = 1;
$i = 0;

do
{
	$acumulador = $acumulador + $i;
	if($acumulador <= 1000)
	{
		echo "Acumulador:", $acumulador;
		echo "<br>";
		$i++;
	}

}while($acumulador <= 1000);

echo "Se sumaron: ".($i-1)." numeros";

?>