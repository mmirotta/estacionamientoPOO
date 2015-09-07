<?php
	/**
	* 
	*/
	class estacionamiento 
	{
		public static function Guardar($patente)
		{
			$archivo=fopen("autos.txt", "a"); //escribe pero mantiene lo que estaba
			$ahora = date("Y-m-d h:i:s");
			$renglon = $patente . "=>" . $ahora . "\n";
			fwrite($archivo, $renglon);
			fclose($archivo);
		}

		public static function Sacar()
		{

		}
	}
?>