<?php
	/**
	* 
	*/
	class estacionamiento 
	{
		public static function Guardar($patente)
		{
			$archivo=fopen("autos.txt", "a"); //escribe pero mantiene lo que estaba
			$ahora = date("Y-m-d H:i:s");
			$renglon = $patente . "=>" . $ahora . "\n";
			fwrite($archivo, $renglon);
			fclose($archivo);
		}

		public static function Leer()
		{
			$archivo=fopen("autos.txt", "r"); 
			$listaDeAutos = array();
			while (!feof($archivo))
			{
				$renglon = fgets($archivo);
				$auto = explode("=>", $renglon);
				$listaDeAutos[] = $auto;

			}
			fclose($archivo);
			return $listaDeAutos;
		}

		public static function Sacar()
		{
			
		}
	}
?>