<?php
	require "estacionamiento.php";
	$patente = $_POST["patente"];
	$estacionar = $_POST["estacionar"];

	if ($estacionar== 'ingreso')
	{
		estacionamiento::Guardar($patente);
	}
	else
	{
		$datos = estacionamiento::Sacar($patente);
	}
?>