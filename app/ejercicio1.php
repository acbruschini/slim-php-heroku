<?php
/******************************************************************************
Ariel Bruschini

Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
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