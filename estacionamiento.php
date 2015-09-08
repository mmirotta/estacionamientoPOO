<?php
	/**
	* 
	*/
	class estacionamiento 
	{
		public static function Guardar($patente)
		{
			$archivo=fopen("autos.txt", "a"); 
			$hora = date("Y-m-d H:i:s");
			$renglon = $patente . "=>" . $hora . "\n";
			fwrite($archivo, $renglon);
			fclose($archivo);
		}

		public static function GuardarListado($listado)
		{
			$archivo=fopen("autos.txt", "w"); 
			foreach ($listado as $auto) 
			{
				if($auto[0]!="")
				{
					$dato = $auto[0] . "=>" . $auto[1];
					fwrite($archivo, $dato);
				}
			}

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

		public static function CargarTablaEstacionados()
		{
			$listaDeAutos = estacionamiento::Leer();
			$archivo=fopen("tablaestacionados.php", "w"); 
			fwrite($archivo, "<table> <h2>Autos</h2><th>Patente</th> <th>Fecha</th>");
			foreach ($listaDeAutos as $auto) 
			{
				if($auto[0]!="")
				{
					$dato = "<tr><td>".$auto[0] . "</td> <td>" . $auto[1] . "</td></tr>";
					fwrite($archivo, $dato);
				}
			}
			fwrite($archivo, "</table>");
			fclose($archivo);
		}

		public static function Sacar($patente)
		{
			$listaDeAutos = estacionamiento::Leer();
			$listado = array();
			$esta = false;
			foreach ($listaDeAutos as $auto) 
			{
				if($auto[0]==$patente)
				{
					$esta = true;
					$ahora = date("Y-m-d H:i:s");
					$inicio = $auto[1];
					$diferencia = strtotime($ahora) - strtotime($inicio);
					$costo = ($diferencia/3600) * 30;
					$mensaje = "El tiempo transcurrido es " . $diferencia . "segundos <br> Costo: " . $costo . "$";
				}
				else
				{
					$listado[]=$auto;
				}
			}
			if (!$esta)
			{
				$mensaje = "No esta esa patente";
			}

			$primera = true;

			estacionamiento::GuardarListado($listado);

			echo $mensaje;
		}
	}
?>